<template>
	<div>
		<input type="hidden" name="_token" :value="csrf" />
		<input type="hidden" name="body" :value="body" />
		<input type="file" id="getFile" @change="uploadFunction($event)" hidden />
		<select multiple="multiple" name="tags[]" hidden>
			<option v-for="tag in tags" :value="tag.id" :key="tag.id" selected>{{ tag.title }}</option>
		</select>
		<div class="form-group pb-3">
			<input
				type="text"
				class="form-control"
				name="title"
				v-model="title"
				placeholder="Qual sua dúvida sobre programação?"
				required
			/>
		</div>
		<div class="form-group">
			<div class="card card-body">
				<quill-editor ref="bodyEditor" v-model="body" :options="editorOption"></quill-editor>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<h5 class="pt-4 pb-3">Tamanho da recompensa</h5>
					<select name="budget" v-model="budget" id class="form-control">
						<option value="3.75" selected>R$ 2,50 - 5,00</option>
						<option value="10">R$ 5,00 - 15,00</option>
						<option value="32.5">R$ 15,00 - 50,00</option>
					</select>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<h5 class="pt-4 pb-3">Linguagens de programação envolvidas</h5>
					<multiselect
						v-model="tags"
						placeholder="Sobre qual linguagem de programação é seu pedido de ajuda?"
						label="title"
						track-by="id"
						:options="options"
						:multiple="true"
						selectLabel="Pressione enter para selecionar"
						selectedLabel="Selecionado"
						deselectLabel="Pressione enter para remover"
					>
						<template slot="option" slot-scope="props">
							<div class="d-flex align-items-center">
								<i :class="props.option.image" class="option__image"></i>
								<div class="option__desc">
									<span class="option__title">{{ props.option.title }}</span>
								</div>
							</div>
						</template>
						<template slot="noResult">Nenhum resultado encontrado. Considere alterar o termo de pesquisa.</template>
					</multiselect>
				</div>
			</div>
		</div>
		<div class="form-row justify-content-end mt-5">
			<div class="col-lg-2">
				<button
					type="submit"
					class="btn btn-lg btn-block"
					:class="!update ? 'btn-success' : 'btn-primary'"
				>
					<div class="d-flex justify-content-center">
						<span v-if="!update">Publicar</span>
						<span v-else>Editar</span>
					</div>
				</button>
			</div>
		</div>
	</div>
</template>

<script>
import { mapActions } from 'vuex';
import Multiselect from 'vue-multiselect';

import hljs from 'highlight.js';
import 'highlight.js/styles/monokai-sublime.css';

export default {
	props: ['question'],
	components: {
		Multiselect
	},
	data: () => ({
		csrf: document
			.querySelector('meta[name="csrf-token"]')
			.getAttribute('content'),
		title: '',
		body: '',
		update: false,
		budget: 3.75,
		tags: [],
		options: [],
		editorOption: {
			placeholder: 'De mais informações sobre sua perguntas',
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
		},
		channel: undefined
	}),
	computed: {
		editor() {
			return this.$refs.bodyEditor.quill;
		},
		contentCode() {
			return hljs.highlightAuto(this.body).value;
		}
	},
	methods: {
		...mapActions('questions', ['uploadImages']),
		listTags() {
			axios.get('/api/tags').then(response => {
				this.options = response.data.tags;
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
		},
		setFormEdit() {
			this.update = true;

			const question = this.question;

			this.title = question.title;
			this.body = question.body;
			this.budget = question.budget;
			this.tags = question.tags;
		}
	},
	mounted() {
		this.listTags();

		this.channel = Echo.channel('newquestions');

		if (this.question) {
			this.setFormEdit();
		}
	}
};
</script>
