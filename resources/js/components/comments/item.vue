<template>
	<div class="py-3 border-top comment" :set="question = comment.talk.question">
		<div class="d-flex align-items-center">
			<a :href="`/users/${comment.user.id}`">
				<span class="mr-2">
					<img
						v-if="comment.user.avatar_url"
						width="25"
						class="img-fluid avatar"
						:src="comment.user.avatar_url"
						v-bind:alt="comment.user.name"
						v-bind:title="comment.user.name"
					/>
					<i v-else class="fas fa-user-circle fa-2x"></i>
				</span>
			</a>
			<div class="d-flex align-items-center small" v-if="!formEditComment">
				<a :href="`/users/${comment.user.id}`" class="mr-1">{{ comment.user.name }}</a>
				<span>{{ comment.body }}</span>
				<span v-if="comment.budget" class="ml-1 badge badge-success">{{ comment.budget | currency }}</span>
			</div>
			<edit-comment v-else :comment="comment" :question="comment.talk.question" />
		</div>
		<!-- Só pode aceitar se for dono da pergunta -->
		<div class="d-flex pt-2" v-if="comment.talk.status != 1">
			<div v-if="$userId == question.user_id">
				<div v-if="comment.budget && $userId == question.user_id">
					<div v-if="question.status == 0">
						<b-button
							@click="$bvModal.show(`modal-scoped${comment.id}`)"
							variant="success"
							size="sm"
						>Aceitar</b-button>

						<!-- Modal -->
						<b-modal :id="`modal-scoped${comment.id}`">
							<template slot="modal-header" slot-scope="{ close }">
								<h5 class="modal-title mr-3">Você está prestes a aceitar uma proposta para sua pergunta!</h5>
								<!-- Emulate built in modal header close button action -->
								<b-button @click="close()" class="close" variant="link">
									<span aria-hidden="true">&times;</span>
								</b-button>
							</template>

							<template slot="default">
								<div class="font-weight-bold">{{ comment.user.name }}</div>
								<div>{{ comment.body }}</div>
								<div class="text-success">{{ comment.budget | currency }}</div>
							</template>

							<template slot="modal-footer" slot-scope="{ cancel }">
								<b-button variant="light" @click="cancel()">Cancelar</b-button>
								<a :href="`/posts/accept/${comment.id}`" class="btn btn-success">Aceitar</a>
							</template>
						</b-modal>
					</div>
				</div>
			</div>
			<a
				v-if="comment.talk.receiver_id == $userId || comment.talk.user_id == $userId"
				:href="`/talks/${comment.talk_id}`"
				class="btn btn-sm text-secondary"
			>Conversar</a>
		</div>
	</div>
</template>
<script>
import { mapGetters } from 'vuex';
import EditComment from './edit';

export default {
	components: {
		EditComment
	},
	props: ['comment'],
	computed: {
		...mapGetters('questions', ['getFormEditComments']),
		formEditComment() {
			return this.getFormEditComments(this.comment.talk.question_id);
		}
	}
};
</script>
