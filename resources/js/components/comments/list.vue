<template>
	<section v-if="question">
		<p
			v-if="question.typings && question.typings.length"
			class="text-muted ellipsis"
		>Alguém está digitando um comentário</p>
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
