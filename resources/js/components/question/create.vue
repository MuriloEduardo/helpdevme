<template>
	<div>
		<form @submit.prevent="onSubmit">
			<div class="form-group">
				<input
					type="text"
					class="form-control form-control-lg"
					name="title"
					v-model="title"
					placeholder="Qual sua dúvida sobre programação?"
					@keydown="onTyping"
					required
				/>
			</div>
			<div class="form-group">
				<b-card no-body>
					<b-tabs card>
						<b-tab title="Escrever" active>
							<b-card-text>
								<vue-editor v-model="body" :editor-toolbar="customToolbar" />
							</b-card-text>
						</b-tab>
						<b-tab title="Visualizar">
							<b-card-text>
								<div v-html="body"></div>
							</b-card-text>
						</b-tab>
					</b-tabs>
				</b-card>
			</div>
			<div class="form-group">
				<multiselect
					v-model="tags"
					tag-placeholder="Adicione isto como nova tag"
					placeholder="Pesquise ou adicione uma tag"
					label="title"
					track-by="id"
					:options="options"
					:multiple="true"
					:taggable="true"
					@tag="addTag"
				>
					<template slot="option" slot-scope="props">
						<div class="d-flex align-items-center">
							<i :class="props.option.image" class="option__image"></i>
							<div class="option__desc">
								<span class="option__title">{{ props.option.title }}</span>
							</div>
						</div>
					</template>
				</multiselect>
			</div>
			<div class="form-row justify-content-end mt-5">
				<div class="col-lg-3">
					<button type="submit" class="btn btn-success btn-lg btn-block">
						<div class="d-flex justify-content-center">
							<span v-if="!loading">Enviar</span>
							<span v-else class="ellipsis"></span>
						</div>
					</button>
				</div>
			</div>
		</form>
	</div>
</template>

<script>
import { mapActions } from 'vuex';
import Multiselect from 'vue-multiselect';

export default {
	props: ['user'],
	components: {
		Multiselect
	},
	data: () => ({
		title: undefined,
		body: undefined,
		loading: false,
		tags: [],
		options: [],
		customToolbar: [
			['bold', 'italic', 'underline', 'strike'],
			[{ list: 'ordered' }, { list: 'bullet' }, { list: 'check' }],
			['image', 'code-block', 'blockquote']
		],
		toastErrorTexts: {
			title: 'Ops!',
			body: 'Tente novamente de uma forma diferente!'
		},
		channel: Echo.private('newquestions')
	}),
	methods: {
		...mapActions('questions', ['addQuestion']),
		onTyping: _.debounce(function() {
			this.channel.whisper('typing', this.user);
		}, 1000),
		resetForm() {
			this.$bvModal.hide('modal-create-question');

			this.title = undefined;
			this.body = undefined;
			this.tags = [];
		},
		addTag(newTag) {
			axios
				.post('/api/tags', {
					title: newTag
				})
				.then(response => {
					let tag = response.data.tag;

					this.options.push(tag);
					this.tags.push(tag);
				});
		},
		listTags() {
			axios.get('/api/tags').then(response => {
				this.options = response.data.tags;
			});
		},
		onSubmit() {
			this.loading = true;

			this.addQuestion({
				title: this.title,
				body: this.body,
				tags: this.tags.map(tag => tag.id)
			})
				.then(response => {
					this.loading = false;
					this.resetForm();

					this.$bvToast.toast('Sua pergunta foi criada!', {
						title: 'Sucesso!',
						variant: 'success',
						solid: true
					});
				})
				.catch(error => {
					const { response } = error;

					this.loading = false;

					if (response.status === 500) {
						if (response.data.message.includes('SQLSTATE[23000]')) {
							this.toastErrorTexts.body =
								'Já existe uma pergunta com esta título!';
						}
					}

					this.$bvToast.toast(this.toastErrorTexts.body, {
						title: this.toastErrorTexts.title,
						variant: 'danger',
						solid: true
					});
				});
		},
		stopTyping() {}
	},
	mounted() {
		this.listTags();

		this.$root.$on('bv::modal::hidden', () =>
			this.channel.whisper('stop-typing', this.user)
		);
	}
};
</script>
