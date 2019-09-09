<template>
	<div class="d-flex flex-column align-items-center justify-content-center" v-if="votes">
		<button class="btn btn-link" @click="vote">
			<i class="fa-heart" :class="user_vote.length ? 'fas' : 'far'"></i>
		</button>
		<input
			type="number"
			readonly
			class="form-control-plaintext py-0 text-center"
			v-model="votes.length"
		/>
	</div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
	props: ['question_id'],

	methods: {
		vote() {
			this.setVote({
				question_id: this.question_id,
				vote: this.user_vote.length ? 0 : 1
			});
		},
		...mapActions('questions', ['setVote'])
	},
	computed: {
		...mapGetters('questions', ['getVotes', 'getUserVote']),
		votes: function() {
			return this.getVotes(this.question_id);
		},
		user_vote: function() {
			return this.getUserVote(this.question_id);
		}
	}
};
</script>
