<template>
	<div class="list-group list-group-flush">
		<a
			v-for="(notification, index) in notifications"
			:key="index"
			class="list-group-item list-group-item-action flex-column align-items-start list-group-item-unread"
			:class="notification.read_at ? 'list-group-item-unread': ''"
		>
			<div class="d-flex justify-content-between align-items-center">
				<a :href="'/' + notification.data.post.talk.question.slug" v-if="notification.type === 'App\\Notifications\\QuestionCommented'">
					<span>
						Novo comentário em
						<b>{{ notification.data.post.talk.question.title }}</b>
						por {{ notification.data.post.talk.user.name }}
					</span>
					<div v-if="notification.data.post.budget" class="badge badge-success">{{ notification.data.post.budget | currency }}</div>
				</a>
				<div v-if="notification.type === 'App\\Notifications\\CreditsAdded'">
					{{ notification.data.message }}
				</div>
				<b-button
					size="sm"
					variant="link"
					@click="markAsRead(notification.id)"
					v-b-tooltip.hover
					title="Marcar como lido"
				>
					<i class="fas fa-check text-muted"></i>
				</b-button>
			</div>
		</a>
	</div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
	props: ['notifications'],
	methods: {
		...mapActions('notifications', ['markAsRead'])
	}
};
</script>
