<template>
	<li class="nav-item dropdown">
		<a
			id="navbarDropdownTalks"
			role="button"
			data-toggle="dropdown"
			v-b-tooltip.hover
			aria-haspopup="true"
			aria-expanded="false"
			class="nav-link dropdown-toggle d-flex justify-content-center"
			href="#"
			title="Conversas"
		>
			<span
				v-if="getUnreadsPosts.length"
				class="badge badge-count badge-pill badge-danger position-absolute text-white"
			>{{ getUnreadsPosts.length }}</span>
			<i class="fas fa-comments fa-2x"></i>
			<span class="pl-3 d-md-none d-block">Conversas</span>
		</a>
		<div class="dropdown-menu dropdown-menu-right my-0 py-0" aria-labelledby="navbarDropdownTalks">
			<div v-if="talks.length">
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
				<a class="btn btn-link btn-block" href="/talks">Ver Tudo</a>
			</div>
			<div class="card card-body" v-else>
				<h6 class="text-muted text-center m-0">Você não possui conversas.</h6>
			</div>
		</div>
	</li>
</template>

<script>
import OutputPosts from './output-posts';
import { mapActions, mapState, mapGetters } from 'vuex';

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
		}),
		...mapGetters('talks', ['getUnreadsPosts'])
	},
	methods: {
		onReceivedPost(post) {
			this.setPost(post);
		},
		...mapActions('talks', ['setTalks', 'setPost'])
	}
};
</script>
