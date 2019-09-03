<template>
	<div>
		<a
			class="list-group-item list-group-item-action flex-column align-items-start"
			:class="getUnreadsTalk(talk.id) ? 'list-group-item-dark': ''"
			:href="'/talks/' + talk.id"
		>
			<output-posts :talk_id="talk.id" @receivedPost="onReceivedPost"></output-posts>
			<div class="d-flex align-items-start">
				<picture class="position-relative">
					<img
						class="img-fluid avatar avatar-list-item"
						width="50px"
						v-if="opposite.avatar_url"
						:src="opposite.avatar_url"
						:alt="opposite.name"
						:title="opposite.name"
					/>
					<i v-else class="fas fa-user-circle fa-2x"></i>
					<i
						:class="opposite_online ? 'text-success' : ''"
						class="fas fa-circle fa-xs position-absolute online-list-item"
					></i>
				</picture>
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
import { mapActions, mapGetters } from 'vuex';
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
		...mapGetters({
			getUnreadsTalk: 'talks/getUnreadsTalk',
			getOnlineUser: 'users/getOnlineUser'
		}),
		opposite() {
			return this.$userId == this.talk.user.id
				? this.talk.receiver
				: this.talk.user;
		},
		opposite_online: function() {
			return this.getOnlineUser(this.opposite.id);
		}
	}
};
</script>
