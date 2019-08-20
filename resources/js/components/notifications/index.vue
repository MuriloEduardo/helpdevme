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
			<span class="badge badge-pill badge-danger position-absolute">{{ notifications.length }}</span>
			<i class="fas fa-bell fa-2x"></i>
			<span class="pl-3 d-md-none d-block">Notificações</span>
		</a>
		<div
			class="dropdown-menu dropdown-menu-right my-0 py-0"
			aria-labelledby="navbarDropdownNotifications"
		>
			<div v-if="notifications.length">
				<div class="d-flex justify-content-between align-items-center py-2">
					<a href="/talks" class="btn btn-sm btn-link">Ver Todas</a>
					<a href="#" class="btn btn-sm btn-link">Limpar Notificações</a>
				</div>
				<Item :notifications="notifications"></Item>
			</div>
			<div v-else class="text-muted text-center p-3">Minhas Atividades</div>
		</div>
	</li>
</template>

<script>
import Item from './item';

export default {
	components: {
		Item
	},
	data() {
		return {
			notificationsItems: []
		};
	},
	computed: {
		notifications() {
			return this.notificationsItems;
		}
	},
	methods: {
		loadNotifications() {
			axios
				.get('/api/notifications')
				.then(
					response =>
						(this.notificationsItems = response.data.notifications)
				);
		}
	},
	created() {
		this.loadNotifications();
	}
};
</script>
