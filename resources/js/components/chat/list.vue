<template>
	<div>
		<div v-if="talks.length">
			<div class="list-group list-group-flush">
				<div v-for="talk in talks" :key="talk.id">
					<item :talk="talk" @itemReceivedPost="onItemReceivedPost"></item>
				</div>
			</div>
			<div class="d-flex justify-content-between align-items-center py-1">
				<a class="btn btn-link" href="/talks">Ver Tudo</a>
				<button class="btn btn-link" @click="markAllAsRead()">Marcar tudo como lido</button>
			</div>
		</div>
		<div class="card card-body" v-else>
			<h6 class="text-muted text-center m-0">Você não possui conversas.</h6>
		</div>
	</div>
</template>

<script>
import Item from './item';
import { mapActions, mapState } from 'vuex';

export default {
	components: {
		Item
	},
	mounted() {
		this.setTalks();
	},
	computed: {
		...mapState({
			talks: state => state.talks.talks
		})
	},
	methods: {
		onItemReceivedPost(post) {
			this.setPost(post);
		},
		...mapActions('talks', ['setTalks', 'setPost', 'markAllAsRead'])
	}
};
</script>
