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
			<Item :notifications="notifications"></Item>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item text-center" href="#">Limpar Notificações</a>
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

<style scoped>
#navbarDropdownNotifications .badge-danger {
	top: 0;
	right: 0;
}
</style>
