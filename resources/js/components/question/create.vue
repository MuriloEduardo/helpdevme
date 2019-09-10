<template>
	<form action="/questions" method="POST">
		<input type="hidden" name="_token" :value="csrf" />
		<input type="hidden" name="body" :value="body" />
		<select multiple="multiple" name="tags[]" class="d-none">
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
				<quill-editor ref="myTextEditor" v-model="body" :options="editorOption"></quill-editor>
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
			</div>
		</div>
		<div class="form-row justify-content-end mt-5">
			<div class="col-lg-2">
				<button type="submit" class="btn btn-lg btn-success btn-block">
					<div class="d-flex justify-content-center">
						<span>Enviar</span>
					</div>
				</button>
			</div>
		</div>
	</form>
</template>

<script>
import Multiselect from 'vue-multiselect';

import hljs from 'highlight.js';
import 'highlight.js/styles/monokai-sublime.css';

export default {
	props: ['user'],
	components: {
		Multiselect
	},
	data: () => ({
		csrf: document
			.querySelector('meta[name="csrf-token"]')
			.getAttribute('content'),
		title: '',
		body: '',
		budget: 3.75,
		tags: [],
		options: [],
		editorOption: {
			placeholder: 'De mais informações sobre sua perguntas',
			modules: {
				toolbar: [
					['bold', 'italic', 'underline', 'strike'],
					['blockquote', 'code-block'],
					[{ list: 'ordered' }, { list: 'bullet' }],
					['link', 'image']
				],
				syntax: {
					highlight: text => hljs.highlightAuto(text).value
				}
			}
		},
		channel: undefined
	}),
	computed: {
		editor() {
			return this.$refs.myTextEditor.quill;
		},
		contentCode() {
			return hljs.highlightAuto(this.body).value;
		}
	},
	methods: {
		listTags() {
			axios.get('/api/tags').then(response => {
				this.options = response.data.tags;
			});
		}
	},
	mounted() {
		this.listTags();

		this.channel = Echo.channel('newquestions');
	}
};
</script>
