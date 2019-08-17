<template>
	<div class="card mb-4 question">
		<div class="card-body">
			<div class="row">
				<div class="col flex-grow-0">
					<votes-question :initi-votes="0" :question="question"></votes-question>
				</div>
				<div class="col">
					<h3 class="h5">
						<a :href="'/' + question.slug">{{ question.title }}</a>
					</h3>
					<h4 class="badge" :class="question.statused.class">{{ question.statused.text }}</h4>
					<div v-html="question.body"></div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-right">
					<div class="small mb-3">
						<span>{{ question.published }}</span>
						<a :href="'/users/' + question.user.slug">
							<div class="d-flex align-items-center justify-content-end py-2">
								<span class="mr-2">{{ question.user.name }}</span>
								<img
									v-if="question.user.avatar"
									class="img-fluid avatar"
									:src="'/storage/img/avatars/' + question.user.avatar"
									v-bind:alt="question.user.name"
									v-bind:title="question.user.name"
								/>
								<i v-else class="fas fa-user-circle fa-2x"></i>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="tags">
						<a
							v-for="(tag, index) in question.tags"
							:key="index"
							:href="'/tags/' + tag.slug"
							class="badge badge-primary"
						>{{ tag.title }}</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<c-comments :question="question" />
				</div>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	props: ['question']
};
</script>
