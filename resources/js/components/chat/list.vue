<template>
	<li class="nav-item dropdown">
		<a
			id="navbarDropdownTalks"
			role="button"
			data-toggle="dropdown"
			v-b-tooltip.hover
			aria-haspopup="true"
			aria-expanded="false"
			class="nav-link dropdown-toggle d-flex justify-content-center"
			href="#"
			title="Conversas"
		>
			<span
				v-if="getUnreadsPosts"
				class="badge badge-count badge-pill badge-danger position-absolute text-white"
			>{{ getUnreadsPosts }}</span>
			<i class="fas fa-comments fa-2x"></i>
			<span class="pl-3 d-md-none d-block">Conversas</span>
		</a>
		<div class="dropdown-menu dropdown-menu-right my-0 py-0" aria-labelledby="navbarDropdownTalks">
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
	</li>
</template>

<script>
import Item from './item';
import { mapActions, mapState, mapGetters } from 'vuex';

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
		}),
		...mapGetters('talks', ['getUnreadsPosts'])
	},
	methods: {
		onItemReceivedPost(post) {
			this.setPost(post);
		},
		...mapActions('talks', ['setTalks', 'setPost', 'markAllAsRead'])
	}
};
</script>
