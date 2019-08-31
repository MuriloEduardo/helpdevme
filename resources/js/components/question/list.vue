<template>
	<section>
		<h6 class="pb-3 text-muted">{{ total_questions }} pergunta(s)</h6>
		<div v-if="typings.length" class="text-muted d-flex my-3">
			Alguém está digitando uma pergunta
			<span class="ellipsis"></span>
		</div>
		<Item v-for="(question, index) in news" :question="question" :key="index" />
	</section>
</template>
<script>
import { mapState, mapActions } from 'vuex';

import Item from './item';

export default {
	props: ['questions'],
	components: {
		Item
	},
	methods: {
		...mapActions('questions', ['setQuestions'])
	},
	computed: {
		...mapState('questions', ['list', 'news', 'typings']),
		total_questions: function() {
			return this.list.length + this.news.length;
		}
	},
	mounted() {
		this.setQuestions(this.questions);
	}
};
</script>
