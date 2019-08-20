<template>
	<section v-if="talk">
		<div class="d-flex align-items-center py-3">
			<p class="lead">
				<span>Conversa com</span>
				<a :href="'/users/' + opposite.slug" class="badge badge-secondary">
					<span :class="(onlineFriends.find(user=>user.id===opposite.id))?'text-success':''">&bull;</span>
					<span>{{ opposite.name }}</span>
				</a>
			</p>
			<!-- Finalização da Questão -->
			<div class="form-group px-4" v-if="!finished && talk.question.status == 2">
				<b-button @click="$bvModal.show(`modal-scoped${talk.id}`)" variant="success">Finalizar Questão</b-button>

				<!-- Modal -->
				<b-modal :id="`modal-scoped${talk.id}`">
					<template slot="modal-header" slot-scope="{ close }">
						<h5 class="modal-title mr-3">Tem certeza disso?</h5>
						<b-button @click="close()" class="close" variant="link">
							<span aria-hidden="true">&times;</span>
						</b-button>
					</template>

					<template slot="default">
						<p class="font-weight-bold">Você está prestes a finalizar uma questão!</p>
						<span>Após finalizada, ela não pode ser reaberta até que ambas as partes à finalizem. Ainda pode ser solicitado à arbitragem como medida de segurança.</span>
					</template>

					<template slot="modal-footer" slot-scope="{ cancel }">
						<b-button variant="light" @click="cancel()">Cancelar</b-button>
						<a :href="`/${talk.question.slug}/finalize`" class="btn btn-success">Aceitar</a>
					</template>
				</b-modal>
			</div>
		</div>
		<div v-if="alertFinished && !conclusion">
			<div class="card text-white bg-warning mb-3">
				<div class="card-body">
					<h5 class="card-title">Alguém finalizou essa questão!</h5>
					<p
						class="card-text"
					>Esperamos que tudo esteja bem e {{ opposite.name }} também finalize. Caso contrário ambos poderão solicitiar o processo de arbitragem.</p>
				</div>
				<div class="card-footer">
					<button type="button" class="btn btn-sm btn-outline-light">Solicitar Arbitragem</button>
					<!-- <button type="button" class="btn btn-sm btn-success">Continuar Trabalhando</button> -->
				</div>
			</div>
		</div>
		<!-- Fim da Finalização da Questão -->
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col">
						<div id="privateMessageBox">
							<div class="d-flex flex-column p-3">
								<div v-for="(post, index) in allPosts" :key="index" class="h5">
									<div v-if="post.body">
										<!-- Proposta Recusada -->
										<div v-if="post.type==2 && post.status==1" class="text-center">
											<span class="badge badge-pill py-2 px-5 badge-danger">{{ post.body }}</span>
										</div>
										<!-- Proposta Aceita -->
										<div v-if="post.type==2 && post.status==2" class="text-center">
											<span class="badge badge-pill py-2 px-5 badge-info">{{ post.body }}</span>
										</div>
										<!-- Pagamento Efetuado -->
										<div v-if="post.type==2 && post.status==3" class="text-center">
											<span class="badge badge-pill py-2 px-5 badge-success">{{ post.body }}</span>
										</div>
										<!-- Questão Finalizada -->
										<div v-if="post.type==2 && post.status==4" class="text-center">
											<span class="badge badge-pill py-2 px-5 badge-warning">{{ post.body }}</span>
										</div>
										<!-- Proposta -->
										<div v-if="post.type!=2 && post.budget" class="card bg-light mb-5">
											<div class="card-body">
												<p class="card-text">
													{{ post.body }}
													<span class="text-success">{{ post.budget | currency }}</span>
												</p>
											</div>
											<!-- Não exibir se for quem enviou a proposta -->
											<!-- Só mostrar se o usuario for quem recebeu a proposta, quem efetuou essa proposta não verá -->
											<!-- Se for post de recusado esconde footer com ações do alerta de proposta -->
											<div
												class="card-footer"
												v-if="user.id == talk.receiver_id && (post.status < 3 && post.status != 1)"
											>
												<!-- Proposta NÃO aceita ainda -->
												<a
													v-if="post.status==0"
													:href="'/posts/accept/' + post.id"
													class="btn btn-success"
												>Aceitar</a>
												<!-- Proposta aceita -->
												<a v-if="post.status==2" :href="'/payments/' + post.id" class="btn btn-success">Pagar</a>
												<!-- Proposta aceita OU proposta em analise -->
												<a
													v-if="post.status!=1"
													:href="'/posts/refused/' + post.id"
													class="btn btn-link btn-sm text-secondary"
												>Recusar</a>
											</div>
										</div>
										<!-- Post -->
										<div
											v-if="post.type!=2 && !post.budget"
											:class="user.id==post.user_id ? 'justify-content-end' : ''"
											class="d-flex align-items-center"
										>
											<span v-if="user.id!=post.user_id">
												<img
													v-if="opposite.avatar"
													width="25"
													class="img-fluid"
													:src="'/storage/img/avatars/' + opposite.avatar"
													v-bind:alt="opposite.name"
													v-bind:title="opposite.name"
												/>
												<i v-else class="fas fa-user-circle fa-lg"></i>
											</span>
											<span
												class="badge badge-pill py-2 px-3 default ml-1 font-weight-normal"
												:class="(user.id!==post.user_id)?'badge-secondary':'badge-primary'"
											>{{ post.body }}</span>
										</div>
									</div>
								</div>
							</div>
							<small v-if="typing" class="text-muted ellipsis">{{ opposite.name }} está digitando</small>
						</div>
					</div>
				</div>
			</div>
			<div v-if="formActive" class="card-footer">
				<form @submit.prevent="sendMessage">
					<div class="input-group">
						<textarea
							class="form-control"
							placeholder="Digite uma mensagem..."
							v-model="body"
							@keydown="onTyping"
							@keydown.enter="sendMessage"
							required
						></textarea>
						<div class="input-group-append">
							<button type="submit" class="btn btn-primary">
								<i class="fas fa-paper-plane"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</template>

<script>
import { mapState } from 'vuex';

export default {
	props: ['user', 'talkprop', 'opposite', 'posts'],

	data() {
		return {
			talk: undefined,
			channel: Echo.private(`posts.${this.talkprop.id}.private`),
			body: null,
			timeOut: undefined,
			formActive: true,
			typing: false,
			allPosts: []
		};
	},

	computed: {
		alertFinished: function() {
			const { question } = this.talk;

			return question.user_ended == 1 || question.freelancer_ended == 1;
		},
		finished: function() {
			const { question } = this.talk;

			return (
				(question.user_id == this.user.id &&
					question.user_ended == 1) ||
				(question.user_id != this.user.id &&
					question.freelancer_ended == 1)
			);
		},
		conclusion: function() {
			const { question } = this.talk;

			return question.user_ended == 1 && question.freelancer_ended == 1;
		},
		...mapState({
			onlineFriends: state => state.users
		})
	},

	methods: {
		onTyping() {
			const privateChannel = Echo.private(this.channel + '.private');

			setTimeout(() => {
				privateChannel.whisper('typing', {
					typing: true
				});
			}, 300);
		},
		sendMessage() {
			axios
				.post('/api/posts', {
					type: 0, // message
					body: this.body,
					talk_id: this.talk.id,
					question_id: this.talk.question.id,
					receiver_id: this.talk.question.user_id
				})
				.then(response => {
					this.body = null;
					this.allPosts.push(response.data.post);
				});
		},
		fetchMessages() {
			this.allPosts = this.posts;
			this.talkStatus(this.talk);
		},
		talkStatus(talk) {
			this.formActive = talk.status == 1 ? false : true;
		}
	},

	created() {
		this.talk = this.talkprop;

		this.fetchMessages();

		this.channel
			.listen('PrivatePostSent', response => {
				const { post } = response;

				console.log('PrivatePostSent', post);

				this.talk = post.talk;

				this.talkStatus(post.talk);
				this.allPosts.push(post);
			})
			.listenForWhisper('typing', e => {
				this.typing = e.typing;

				clearTimeout(this.timeOut);

				this.timeOut = setTimeout(() => {
					this.typing = false;
				}, 900);
			});
	}
};
</script>
