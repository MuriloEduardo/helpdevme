<template>
	<section v-if="question">
		<div v-if="question.typings && question.typings.length" class="text-muted d-flex">
			Alguém está digitando um comentário
			<span class="ellipsis"></span>
		</div>
		<Item v-for="(comment, index) in comments" :comment="comment" :key="index" />
	</section>
</template>
<script>
import { mapGetters } from 'vuex';

import Item from './item';

export default {
	props: ['question', 'comments'],
	components: {
		Item
	}
};
</script>
