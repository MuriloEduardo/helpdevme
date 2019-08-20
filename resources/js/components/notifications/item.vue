<template>
	<div>
		<a
			v-for="(notification, index) in notifications"
			:key="index"
			class="dropdown-item text-center"
			href="#"
			:set="post = notification.data.post"
		>
			<div>
				Novo comentário
				<b>{{ post.body }}</b> em
				<b>{{ post.talk.question.title }}</b>
				<div v-if="post.budget" class="text-success">{{ post.budget | currency }}</div>
			</div>
		</a>
	</div>
</template>

<script>
export default {
	props: ['notifications']
};
</script>
