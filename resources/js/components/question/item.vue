<template>
	<div class="card mb-4 question">
		<div class="card-body">
			<c-options></c-options>
			<div class="row">
				<div class="col flex-grow-0">
					<votes-question :initi-votes="0" :question="question"></votes-question>
				</div>
				<div class="col">
					<h3 class="h5">
						<a :href="'/questions/' + question.slug">{{ question.title }}</a>
					</h3>
					<div v-html="question.body"></div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<a
						v-for="(tag, index) in question.tags"
						:key="index"
						:href="'/tags/' + tag.slug"
						class="badge badge-primary"
					>{{ tag.title }}</a>
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
