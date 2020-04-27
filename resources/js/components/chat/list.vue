<template>
	<div class="h-100">
		<div class="h-100 d-flex flex-column justify-content-between" v-if="talks.length">
			<div class="list-group list-group-flush h-100" :class="insideChat ? 'card' : ''">
				<div v-for="talk in talks" :key="talk.id">
					<item :talk="talk" @itemReceivedPost="onItemReceivedPost"></item>
				</div>
			</div>
			<div class="d-flex justify-content-between align-items-center">
				<a class="btn btn-link" v-if="!insideChat" href="/talks">Ver Tudo</a>
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
	data() {
		return {
			insideChat: window.location.pathname.match(/(\/talks)/i),
		};
	},
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
