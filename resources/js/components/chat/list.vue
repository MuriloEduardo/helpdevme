<template>
	<div>
		<div class="list-group list-group-flush">
			<a
				class="list-group-item list-group-item-action flex-column align-items-start"
				v-for="talk in talks"
				:key="talk.id"
				:href="'/talks/' + talk.id"
				:set="opposite = this.$userId == talk.user.id ? talk.receiver : talk.user"
			>
				<output-posts :talk="talk" @receivedPost="onReceivedPost"></output-posts>
				<div class="d-flex">
					<img
						class="img-fluid avatar"
						width="25"
						style="height: 25px;"
						v-if="opposite.avatar"
						:src="'/storage/img/avatars/' + opposite.avatar"
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
				</div>
			</a>
		</div>
		<a class="btn btn-link btn-block" href="/talks" v-if="talks.length">Ver Tudo</a>
		<div class="card card-body" v-else>
			<h6 class="text-muted text-center m-0">Você não possui conversas.</h6>
		</div>
	</div>
</template>

<script>
import OutputPosts from './output-posts';
import { mapActions, mapState } from 'vuex';

export default {
	components: {
		OutputPosts
	},
	mounted() {
		this.setTalks();
	},
	computed: {
		...mapState({
			talks: state => state.talks.talks
		})
	},
	methods: {
		onReceivedPost(post) {
			this.setPost(post);
		},
		...mapActions('talks', ['setTalks', 'setPost'])
	}
};
</script>
