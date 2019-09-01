<template>
	<div class="sticky-top top-navbar-height py-3 online-users">
		<h6 class="mb-3 text-muted">{{ getOnlineUsers.length }} dev's Online</h6>
		<ul class="list-group list-group-flush">
			<a
				href="javascript:void(0)"
				class="list-group-item list-group-item-action"
				v-for="(user, index) in getOnlineUsers"
				:key="index"
				@click="openChat(user.id)"
			>
				<div class="d-flex flex-1 justify-content-between align-items-center">
					<div class="d-flex align-items-center text-truncate mr-2">
						<picture>
							<img
								v-if="user.avatar_url"
								class="img-fluid avatar"
								:src="user.avatar_url"
								v-bind:alt="user.name"
								v-bind:title="user.name"
							/>
							<i v-else class="fas fa-user-circle fa-2x"></i>
						</picture>
						<span class="ml-2">{{ $userId == user.id ? 'Eu' : user.name }}</span>
					</div>
					<span class="text-success">
						<i class="fas fa-circle fa-xs"></i>
					</span>
				</div>
			</a>
		</ul>
	</div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
	computed: {
		...mapGetters('users', ['getOnlineUsers'])
	},
	methods: {
		...mapActions('users', ['openChat'])
	}
};
</script>
