<template>
	<div>
		<a
			class="list-group-item list-group-item-action flex-column align-items-start"
			:href="'/talks/' + talk.id"
		>
			<output-posts :talk="talk" @receivedPost="onReceivedPost"></output-posts>
			<div class="d-flex">
				<img
					class="img-fluid avatar"
					width="25"
					style="height: 25px;"
					v-if="opposite.avatar_url"
					:src="opposite.avatar_url"
					:alt="opposite.name"
					:title="opposite.name"
				/>
				<i v-else class="fas fa-user-circle fa-2x"></i>
				<div class="ml-3 text-truncate flex-grow-1">
					<h6 class="mb-1">Conversa com {{ opposite.name }}</h6>
					<small>
						Em:
						<b>{{ talk.question.title }}</b>
					</small>
					<div
						class="d-flex justify-content-between"
						v-if="talk.posts"
						:set="post = talk.posts[talk.posts.length - 1]"
					>
						<small class="text-muted">{{ post.body }}</small>
						<small class="text-muted pl-3">{{ post.published }}</small>
					</div>
				</div>
				<b-button
					size="sm"
					variant="link"
					@click.prevent="markAsRead(talk.id)"
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
import OutputPosts from './output-posts';

export default {
	components: {
		OutputPosts
	},
	props: ['talk'],
	methods: {
		...mapActions('talks', ['markAsRead']),
		onReceivedPost(post) {
			this.$emit('itemReceivedPost', post);
		}
	},
	computed: {
		opposite() {
			return this.$userId == this.talk.user.id
				? this.talk.receiver
				: this.talk.user;
		}
	}
};
</script>
