<template>
	<div>
		<button class="btn btn-link" @click="vote" v-if="user_vote">
			<div class="d-flex align-items-center">
				<i class="fa-heart" :class="user_vote.length ? 'fas' : 'far'"></i>
				<small class="ml-2">Curtir</small>
			</div>
		</button>
		<button class="btn btn-outline-success" @click="openFormComment(question_id)">
			<div class="d-flex align-items-center">
				<i class="fas fa-comments-dollar"></i>
				<small class="ml-2">Fazer Proposta</small>
			</div>
		</button>
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
		...mapActions('questions', ['setVote', 'openFormComment'])
	},
	computed: {
		...mapGetters('questions', ['getUserVote']),
		user_vote: function() {
			return this.getUserVote(this.question_id);
		}
	}
};
</script>
