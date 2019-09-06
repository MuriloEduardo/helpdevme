<template>
	<div class="card mb-4 question">
		<div class="card-body">
			<div class="row mb-4">
				<div class="col flex-grow-0">
					<!-- Votos -->
					<votes-question :question="question"></votes-question>
					<!-- Visualizações -->
					<div class="p-1 mt-2 d-flex flex-column align-items-center">
						<span>{{ question.views.length }}</span>
						<small>Visualizaç{{ question.views.length == 1 ? 'ão' : 'ões' }}</small>
					</div>
				</div>
				<div class="col">
					<h3 class="h5">
						<a :href="'/' + question.slug">{{ question.title }}</a>
					</h3>
					<h4 class="badge" :class="question.status_transform.class">{{ question.status_transform.text }}</h4>
					<div v-html="question.body"></div>
					<div class="row">
						<!-- Tags -->
						<div class="col">
							<a
								v-for="(tag, index) in question.tags"
								:key="index"
								:href="'/tags/' + tag.slug"
								class="badge badge-primary badge-pill"
							>
								<div class="d-flex align-items-center p-1">
									<i :class="tag.image" class="colored fa-lg mr-1"></i>
									<span>{{ tag.title }}</span>
								</div>
							</a>
						</div>
						<!-- User & Timestamps -->
						<div class="col text-right">
							<div class="small mb-3">
								<span>{{ question.published }} por</span>
								<a :href="'/users/' + question.user.slug" class="d-inline-block">
									<div class="d-flex align-items-center justify-content-end py-2">
										<span class="mr-2">{{ question.user_id == $userId ? 'Eu' : question.user.name }}</span>
										<img
											v-if="question.user.avatar_url"
											class="img-fluid avatar"
											:src="question.user.avatar_url"
											v-bind:alt="question.user.name"
											v-bind:title="question.user.name"
										/>
										<i v-else class="fas fa-user-circle fa-2x"></i>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<c-comments :question_id="question.id" />
		</div>
	</div>
</template>
<script>
export default {
	props: ['question']
};
</script>
