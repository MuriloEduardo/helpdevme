<template>
	<form action="/questions" method="POST">
		<input type="hidden" name="_token" :value="csrf" />
		<input type="hidden" name="body" :value="body" />
		<select multiple="multiple" name="tags[]" class="d-none">
			<option v-for="tag in tags" :value="tag.id" :key="tag.id" selected>{{ tag.title }}</option>
		</select>
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
			<div class="card card-body">
				<quill-editor ref="myTextEditor" v-model="body" :options="editorOption"></quill-editor>
			</div>
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
		title: undefined,
		body: '',
		loading: false,
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
		channel: Echo.private('newquestions')
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
		onTyping: _.debounce(function() {
			this.channel.whisper('typing', this.user);
		}, 1000),
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
		}
	},
	mounted() {
		this.listTags();

		this.$root.$on('bv::modal::hidden', () =>
			this.channel.whisper('stop-typing', this.user)
		);
	}
};
</script>
