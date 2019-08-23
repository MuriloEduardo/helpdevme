<template>
	<section>
		<h6 class="pb-3 text-muted">{{ list.length + news.length }} pergunta(s)</h6>
		<div v-if="typings.length" class="text-muted d-flex my-3">
			Alguém está digitando uma pergunta
			<span class="ellipsis"></span>
		</div>
		<Item v-for="(question, index) in news" :question="question" :key="index" />
	</section>
</template>
<script>
import { mapState } from 'vuex';

import Item from './item';

export default {
	components: {
		Item
	},
	computed: {
		...mapState('questions', ['list', 'news', 'typings'])
	}
};
</script>
