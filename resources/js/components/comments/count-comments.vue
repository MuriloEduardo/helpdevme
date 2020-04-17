<template>
	<div>
		<strong>{{ comments.length }}</strong>
		<small>proposta{{ comments.length != 1 ? 's' : '' }}</small>
	</div>
</template>
<script>
import { mapGetters } from 'vuex';

export default {
	props: ['question_id'],
	computed: {
		...mapGetters('questions', ['getComments']),
		comments: function() {
			return this.getComments(this.question_id) || [];
		}
	}
};
</script>
