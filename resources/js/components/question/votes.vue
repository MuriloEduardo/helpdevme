<template>
	<div class="d-flex flex-column align-items-center justify-content-center">
		<button class="btn btn-link" @click="vote">
			<i class="far fa-heart"></i>
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
export default {
	props: ['question', 'initi-votes'],
	data() {
		return {
			votes: this.initiVotes
		};
	},
	methods: {
		vote() {
			this.request(1); // or 0
		},
		request(vote) {
			axios
				.patch('/api/questions/vote/' + this.question.id, {
					vote: vote
				})
				.then(response => {
					this.votes = response.data.votes;
				});
		}
	}
};
</script>
