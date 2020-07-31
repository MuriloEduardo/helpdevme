<template>
	<a
		class="list-group-item list-group-item-action flex-column align-items-start"
		:class="getUnreadsTalk(talk.id) ? 'list-group-item-unread' : ''"
		:href="'/talks/' + talk.id"
	>
		<output-posts
			:talk_id="talk.id"
			@receivedPost="onReceivedPost"
		></output-posts>
		<div class="d-flex align-items-start">
			<Avatar :person="opposite" :online="opposite_online" size="35" />
			<div class="ml-3 text-truncate flex-grow-1">
				<h6 class="m-0">{{ opposite.name }}</h6>
				<small>
					<b>{{ talk.question.title }}</b>
				</small>
				<div
					class="d-flex justify-content-between"
					v-if="talk.posts"
					:set="(post = talk.posts[talk.posts.length - 1])"
				>
					<small class="text-muted post-body" v-html="post.body"></small>
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
</template>
<script>
import { mapActions, mapGetters } from 'vuex';
import OutputPosts from './output-posts';
import Avatar from './avatar';

export default {
	components: {
		OutputPosts,
		Avatar,
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
