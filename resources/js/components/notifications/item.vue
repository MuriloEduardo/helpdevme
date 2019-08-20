<template>
	<div class="list-group">
		<a
			v-for="(notification, index) in notifications"
			:key="index"
			class="list-group-item list-group-item-action flex-column align-items-start"
			:href="'/' + post.talk.question.slug"
			:set="post = notification.data.post"
		>
			Novo comentário
			<b>{{ post.body }}</b> em
			<b>{{ post.talk.question.title }}</b>
			<div v-if="post.budget" class="badge badge-success">{{ post.budget | currency }}</div>
		</a>
	</div>
</template>

<script>
export default {
	props: ['notifications']
};
</script>
