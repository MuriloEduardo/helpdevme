<template>
	<section>
		<div v-if="typings.length" class="text-muted d-flex">
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
		...mapState('questions', ['news', 'typings'])
	}
};
</script>
