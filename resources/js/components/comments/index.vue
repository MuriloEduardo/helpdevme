<template>
	<div v-if="question">
		<p class="small">{{ comments.length }} {{ comments.length == 1 ? 'proposta' : 'propostas' }}</p>
		<List :question="question" :comments="comments" />
		<Create v-if="$userId != question.user_id && question.status == 0" :question="question" />
	</div>
</template>
<script>
import { mapGetters } from 'vuex';

import List from './list';
import Create from './create';

export default {
	props: ['question_id'],
	components: {
		List,
		Create
	},
	computed: {
		...mapGetters('questions', ['getComments', 'getQuestion']),
		comments: function() {
			return this.getComments(this.question_id) || [];
		},
		question() {
			return this.getQuestion(this.question_id);
		}
	}
};
</script>

