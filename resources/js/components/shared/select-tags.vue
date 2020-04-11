<template>
	<div>
		<select multiple="multiple" name="tags[]" hidden>
			<option v-for="tag in tags" :value="tag.id" :key="tag.id" selected>
				{{
				tag.title
				}}
			</option>
		</select>
		<multiselect
			v-model="tags"
			placeholder="Selecione uma linguagem de programação"
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
			<template slot="noResult">
				Nenhum resultado encontrado. Considere alterar o termo de
				pesquisa.
			</template>
		</multiselect>
	</div>
</template>

<script>
import Multiselect from 'vue-multiselect';

export default {
	props: ['list'],
	components: {
		Multiselect
	},
	data: () => ({
		options: [],
		tags: [],
	}),
	methods: {
		listTags() {
			axios.get('/api/tags').then(response => {
				this.options = response.data.tags;
			});
		}
	},
	mounted() {
		this.listTags();

		this.tags = this.list;
	}
};
</script>

<style></style>
