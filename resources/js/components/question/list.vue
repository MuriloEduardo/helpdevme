<template>
	<section>
		<h6 class="pb-3 text-muted">{{ total_questions }} pergunta(s)</h6>
		<Item v-for="(question, index) in news" :question="question" :key="index" />
	</section>
</template>
<script>
import { mapState } from 'vuex';

import Item from './item';

export default {
	components: {
		Item
	},
	computed: {
		...mapState('questions', ['list', 'news']),
		total_questions: function() {
			return this.list.length + this.news.length;
		}
	}
};
</script>
