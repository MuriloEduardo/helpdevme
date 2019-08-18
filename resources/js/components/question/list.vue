<template>
	<section>
		<p v-if="typings.length" class="text-muted ellipsis">Alguém está digitando uma pergunta</p>
		<Item v-for="(question, index) in news" :question="question" :key="index" />
	</section>
</template>
<script>
import { mapActions, mapState } from 'vuex';

import Item from './item';

export default {
	components: {
		Item
	},
	methods: {
		...mapActions('questions', ['setQuestions'])
	},
	mounted() {
		this.setQuestions();
	},
	computed: {
		...mapState('questions', ['news', 'typings'])
	}
};
</script>
