<template>
	<div>
		<div v-if="talks.length">
			<div class="list-group">
				<a
					class="list-group-item list-group-item-action flex-column align-items-start"
					v-for="talk in talks"
					:key="talk.id"
					:href="'/talks/' + talk.id"
					:set="opposite = this.$userId == talk.user.id ? talk.receiver : talk.user"
				>
					<div class="d-flex align-items-center">
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
							<h5 class="mb-1">Conversa com {{ opposite.name }}</h5>
							<div class="d-flex justify-content-between">
								<small>
									Em:
									<b>{{ talk.question.title }}</b>
								</small>
								<small class="text-muted pl-3">{{ talk.created_at }}</small>
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
</template>

<script>
import { mapActions, mapState } from 'vuex';

export default {
	mounted() {
		this.setTalks();
	},
	computed: {
		...mapState({
			talks: state => state.talks.talks
		})
	},
	methods: {
		...mapActions('talks', ['setTalks'])
	}
};
</script>
