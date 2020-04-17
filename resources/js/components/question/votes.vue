<template>
	<div>
		<strong>{{ votes.length }}</strong>
		<br>
		<small v-if="votes">curtida{{ votes.length != 1 ? 's' : '' }}</small>
	</div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
	props: ['question_id'],
	computed: {
		...mapGetters('questions', ['getVotes']),
		votes: function() {
			return this.getVotes(this.question_id);
		}
	}
};
</script>
