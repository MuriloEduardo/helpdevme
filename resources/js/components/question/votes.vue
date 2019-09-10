<template>
	<small v-if="votes">{{ votes.length }} curtida{{ votes.length != 1 ? 's' : '' }}</small>
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
