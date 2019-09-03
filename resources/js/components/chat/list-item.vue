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
			<list-chat></list-chat>
		</div>
	</li>
</template>
<script>
import ListChat from './list';
import { mapGetters } from 'vuex';

export default {
	components: {
		ListChat
	},
	computed: {
		...mapGetters('talks', ['getUnreadsPosts'])
	}
};
</script>
