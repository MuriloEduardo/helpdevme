<template>
	<div class="row justify-content-center h-100 py-3">
		<div class="col-2">
			<div class="h-100">
				<list></list>
			</div>
		</div>
		<div class="col" v-if="talk">
			<!-- Fim da Finalização da Questão -->
			<div class="card h-100">
				<div class="card-header">
					<a :href="'/users/' + opposite.id">
						<Avatar
							:person="opposite"
							:online="opposite_online"
							size="50"
						/>
						<span class="ml-3">{{ opposite.name }}</span>
					</a>
					<span> - {{ talk.question.title }}</span>
				</div>
				<div class="card-body">
					<div class="row">
						<output-posts :talk_id="talk.id"></output-posts>
						<div class="d-flex align-items-center">
							<!-- Finalização da Questão -->
							<div
								class="form-group px-4"
								v-if="!finished && talk.question.status == 2"
							>
								<b-button
									@click="
										$bvModal.show(`modal-scoped${talk.id}`)
									"
									variant="success"
									>Finalizar Questão</b-button
								>

								<!-- Modal -->
								<b-modal :id="`modal-scoped${talk.id}`">
									<template
										slot="modal-header"
										slot-scope="{ close }"
									>
										<h5 class="modal-title mr-3">
											Tem certeza disso?
										</h5>
										<b-button
											@click="close()"
											class="close"
											variant="link"
										>
											<span aria-hidden="true"
												>&times;</span
											>
										</b-button>
									</template>

									<template slot="default">
										<p class="font-weight-bold">
											Você está prestes a finalizar uma
											questão!
										</p>
										<span
											>Após finalizada, ela não pode ser
											reaberta até que ambas as partes à
											finalizem. Ainda pode ser solicitado
											à arbitragem como medida de
											segurança.</span
										>
									</template>

									<template
										slot="modal-footer"
										slot-scope="{ cancel }"
									>
										<b-button
											variant="light"
											@click="cancel()"
											>Cancelar</b-button
										>
										<a
											:href="
												`/${talk.question.slug}/finalize`
											"
											class="btn btn-success"
											>Aceitar</a
										>
									</template>
								</b-modal>
							</div>
						</div>
						<div v-if="alertFinished && !conclusion">
							<div class="card text-white bg-warning mb-3">
								<div class="card-body">
									<h5 class="card-title">
										Alguém finalizou essa questão!
									</h5>
									<p class="card-text">
										Esperamos que tudo esteja bem e
										{{ opposite.name }} também finalize.
										Caso contrário ambos poderão solicitiar
										o processo de arbitragem.
									</p>
								</div>
								<div class="card-footer">
									<button
										type="button"
										class="btn btn-sm btn-outline-light"
									>
										Solicitar Arbitragem
									</button>
									<!-- <button type="button" class="btn btn-sm btn-success">Continuar Trabalhando</button> -->
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div id="privateMessageBox">
								<div class="d-flex flex-column">
									<div
										v-for="(post, index) in talk.posts"
										:key="index"
										class="mb-2"
									>
										<div v-if="post.body">
											<!-- Proposta Recusada -->
											<div
												v-if="
													post.type == 2 &&
														post.status == 1
												"
												class="text-center"
											>
												<span
													class="badge badge-pill py-2 px-5 badge-danger"
													>{{ post.body }}</span
												>
											</div>
											<!-- Proposta Aceita -->
											<div
												v-if="
													post.type == 2 &&
														post.status == 2
												"
												class="text-center"
											>
												<span
													class="badge badge-pill py-2 px-5 badge-info"
													>{{ post.body }}</span
												>
											</div>
											<!-- Pagamento Efetuado -->
											<div
												v-if="
													post.type == 2 &&
														post.status == 3
												"
												class="text-center"
											>
												<span
													class="badge badge-pill py-2 px-5 badge-success"
													>{{ post.body }}</span
												>
											</div>
											<!-- Questão Finalizada -->
											<div
												v-if="
													post.type == 2 &&
														post.status == 4
												"
												class="text-center"
											>
												<span
													class="badge badge-pill py-2 px-5 badge-warning"
													>{{ post.body }}</span
												>
											</div>
											<!-- Proposta -->
											<div
												v-if="
													post.type != 2 &&
														post.budget
												"
												class="card bg-light mb-5"
											>
												<div class="card-body">
													<p class="card-text">
														{{ post.body }}
														<span
															class="text-success"
															>{{
																post.budget
																	| currency
															}}</span
														>
													</p>
												</div>
												<!-- Não exibir se for quem enviou a proposta -->
												<!-- Só mostrar se o usuario for quem recebeu a proposta, quem efetuou essa proposta não verá -->
												<!-- Se for post de recusado esconde footer com ações do alerta de proposta -->
												<div
													class="card-footer"
													v-if="
														user.id ==
															talk.receiver_id &&
															post.status < 3 &&
															post.status != 1
													"
												>
													<!-- Proposta NÃO aceita ainda -->
													<a
														v-if="post.status == 0"
														:href="
															'/posts/accept/' +
																post.id
														"
														class="btn btn-success"
														>Aceitar</a
													>
													<!-- Proposta aceita -->
													<a
														v-if="post.status == 2"
														:href="
															'/payments/' +
																post.id
														"
														class="btn btn-success"
														>Pagar</a
													>
													<!-- Proposta aceita OU proposta em analise -->
													<a
														v-if="post.status != 1"
														:href="
															'/posts/refused/' +
																post.id
														"
														class="btn btn-link btn-sm text-secondary"
														>Recusar</a
													>
												</div>
											</div>
											<!-- Post -->
											<div
												v-if="
													post.type != 2 &&
														!post.budget
												"
												:class="
													user.id == post.user_id
														? 'justify-content-end'
														: ''
												"
												class="d-flex align-items-center"
											>
												<span
													v-if="
														user.id != post.user_id
													"
												>
													<Avatar
														:person="opposite"
														:online="false"
														size="25"
													/>
												</span>
												<div
													class="d-flex flex-column ml-1"
												>
													<span
														v-html="post.body"
														class="py-2 px-3 rounded-pill default font-weight-normal"
														:class="
															user.id !==
															post.user_id
																? 'bg-light'
																: 'bg-primary text-white'
														"
													></span>
													<small
														class="text-muted ml-3"
														>{{
															post.created_at
																| moment
														}}</small
													>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div v-if="talk.status != 1" class="card-footer bg-white">
					<form
						@keydown.enter.exact.prevent
						@keydown.enter.shift.exact="sendMessage"
					>
						<input
							type="file"
							id="getFile"
							@change="uploadFunction($event)"
							hidden
						/>
						<div class="bg-light mb-3 rounded p-5">
							<quill-editor
								ref="bodyEditor"
								v-model="body"
								:options="editorOption"
							></quill-editor>
						</div>
						<div class="d-flex align-items-center float-right">
							<small class="text-muted mr-2"
								>Shift + Enter ou
							</small>
							<button
								type="submit"
								class="btn btn-primary"
								:disabled="loading"
							>
								Enviar
								<i
									v-if="!loading"
									class="fas fa-paper-plane"
								></i>
								<b-spinner v-else small type="grow"></b-spinner>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import OutputPosts from './output-posts';
import List from './list';
import Avatar from './avatar';
import { mapActions, mapGetters } from 'vuex';
import moment from 'moment';

import hljs from 'highlight.js';
import 'highlight.js/styles/monokai-sublime.css';

export default {
	components: {
		OutputPosts,
		List,
		Avatar
	},

	props: ['user', 'talk_id', 'opposite'],

	data() {
		return {
			body: '',
			loading: false,
			editorOption: {
				placeholder:
					'Escreva respostas claras e com o objetivo de concluir a questão deste usuário.',
				modules: {
					toolbar: {
						container: [
							['bold', 'italic', 'underline', 'strike'],
							['blockquote', 'code-block'],
							[{ list: 'ordered' }, { list: 'bullet' }],
							['link', 'image'],
							['clean']
						],
						handlers: {
							image: function() {
								document.getElementById('getFile').click();
							}
						}
					},
					syntax: {
						highlight: text => hljs.highlightAuto(text).value
					}
				}
			}
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
		...mapGetters({
			getTalk: 'talks/getTalk',
			getOnlineUser: 'users/getOnlineUser'
		}),
		talk: function() {
			return this.getTalk(this.talk_id);
		},
		opposite_online: function() {
			return this.getOnlineUser(this.opposite.id);
		}
	},

	methods: {
		...mapActions('talks', ['sendPost', 'uploadImages']),
		sendMessage() {
			if (!this.body) return;

			this.loading = true;

			this.sendPost({
				type: 0, // message
				body: this.body,
				talk_id: this.talk.id,
				question_id: this.talk.question.id,
				receiver_id: this.talk.question.user_id
			})
				.then(response => {
					this.body = null;

					this.loading = false;
				})
				.catch(() => {
					this.loading = false;
				});
		},
		uploadFunction(e) {
			const quill = this.$refs.bodyEditor.quill;
			const image = e.target.files[0];

			let form = new FormData();
			form.append('image', image);

			// Save current cursor state
			const range = quill.getSelection(true);

			// Insert temporary loading placeholder image
			quill.insertEmbed(range.index, 'image', '/images/preloader.svg');

			// Move cursor to right side of image (easier to continue typing)
			quill.setSelection(range.index + 1);

			// Upload image to server
			this.uploadImages(form)
				.then(path => {
					// Remove placeholder image
					quill.deleteText(range.index, 1);

					// Insert uploaded image
					quill.insertEmbed(range.index, 'image', path);
				})
				.catch(e => {
					this.$bvToast.toast(
						'Tente novamente de uma forma diferente!',
						{
							title: 'Algo deu errado!',
							variant: 'danger',
							solid: true
						}
					);
				});
		}
	},

	filters: {
		moment: function(date) {
			return moment(date).format('DD/MM/YYYY HH:mm');
		}
	}
};
</script>
