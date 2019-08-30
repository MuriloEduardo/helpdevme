<template>
	<div class="sticky-top top-navbar-height py-3">
		<h6 class="mb-3 text-muted">{{ users.length }} dev's Online</h6>
		<ul class="list-group list-group-flush">
			<a
				href="#"
				class="list-group-item list-group-item-action"
				v-for="(user, index) in users"
				:key="index"
			>
				<div class="d-flex flex-1 justify-content-between align-items-center">
					<div class="d-flex align-items-center text-truncate mr-2">
						<picture>
							<img
								v-if="user.avatar"
								class="img-fluid avatar"
								:src="'/storage/img/avatars/' + user.avatar"
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
import { mapState } from 'vuex';

export default {
	computed: {
		...mapState({
			users: state => state.users
		})
	}
};
</script>
