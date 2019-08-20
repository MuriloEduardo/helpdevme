<template>
	<div class="list-group">
		<a
			v-for="(notification, index) in notifications"
			:key="index"
			class="list-group-item list-group-item-action flex-column align-items-start"
			:set="post = notification.data.post"
		>
			<div class="d-flex justify-content-between align-items-center">
				<a :href="'/' + post.talk.question.slug">
					Novo comentário
					<b>{{ post.body }}</b> em
					<b>{{ post.talk.question.title }}</b>
					<div v-if="post.budget" class="badge badge-success">{{ post.budget | currency }}</div>
				</a>
				<b-button
					size="sm"
					variant="link"
					@click="markAsRead(notification.id)"
					v-b-tooltip.hover
					title="Marcar como lido"
				>
					<i class="fas fa-check-double text-muted"></i>
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
