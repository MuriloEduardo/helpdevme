<template>
	<li class="nav-item dropdown">
		<a
			id="navbarDropdownNotifications"
			role="button"
			data-toggle="dropdown"
			v-b-tooltip.hover
			aria-haspopup="true"
			aria-expanded="false"
			class="nav-link dropdown-toggle d-flex justify-content-center"
			href="#"
			title="Notificações"
		>
			<span
				v-if="notifications.length"
				class="badge badge-pill badge-danger position-absolute"
			>{{ notifications.length }}</span>
			<i class="fas fa-bell fa-2x"></i>
			<span class="pl-3 d-md-none d-block">Notificações</span>
		</a>
		<div
			class="dropdown-menu dropdown-menu-right my-0 py-0"
			aria-labelledby="navbarDropdownNotifications"
		>
			<div v-if="notifications.length">
				<div class="d-flex justify-content-between align-items-center py-1">
					<a href="/talks" class="btn btn-sm btn-link">Ver Todas</a>
					<button class="btn btn-sm btn-link" @click="markAllAsRead()">Limpar Notificações</button>
				</div>
				<Item :notifications="notifications"></Item>
			</div>
			<div v-else class="text-muted text-center p-3">Sem Notificações</div>
		</div>
	</li>
</template>

<script>
import { mapActions, mapState } from 'vuex';
import Item from './item';

export default {
	components: {
		Item
	},
	computed: {
		...mapState('notifications', ['items']),
		notifications() {
			return this.items;
		}
	},
	created() {
		this.loadNotifications();
	},
	methods: {
		...mapActions('notifications', ['loadNotifications', 'markAllAsRead'])
	}
};
</script>
