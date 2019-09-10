<template>
	<div class="card mb-4 question">
		<div class="card-body">
			<div class="float-right">
				<div class="text-success d-flex align-items-center flex-column">
					<h5>{{ question.budget | currency }}</h5>
					<small>Orçamento Médio</small>
				</div>
			</div>
			<!-- Title, body, tags, user -->
			<h3 class="h5">
				<a :href="'/' + question.slug">{{ question.title }}</a>
			</h3>
			<h4 class="badge" :class="question.status_transform.class">{{ question.status_transform.text }}</h4>
			<article class="pt-3" v-html="question.body"></article>
			<div class="d-flex justify-content-between py-3">
				<!-- Tags -->
				<div>
					<a
						v-for="(tag, index) in question.tags"
						:key="index"
						:href="'/tags/' + tag.slug"
						class="badge badge-primary badge-pill mr-1"
					>
						<div class="d-flex align-items-center p-1">
							<i :class="tag.image" class="colored fa-lg mr-1"></i>
							<span>{{ tag.title }}</span>
						</div>
					</a>
				</div>
				<!-- User -->
				<div class="text-right small mb-3">
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
			<!-- Views, Likes, Comments -->
			<div class="d-flex align-items-center justify-content-between py-3">
				<!-- Votos -->
				<votes-question :question_id="question.id"></votes-question>
				<!-- Visualizações -->
				<small>
					{{ question.views.length }}
					visualizaç{{ question.views.length == 1 ? 'ão' : 'ões' }}
				</small>

				<count-comments :question="question"></count-comments>
			</div>
			<actions-question class="py-3 border-top" :question_id="question.id"></actions-question>
			<!-- Create Comment -->
			<c-comments :question_id="question.id"></c-comments>
		</div>
	</div>
</template>
<script>
export default {
	props: ['question']
};
</script>
