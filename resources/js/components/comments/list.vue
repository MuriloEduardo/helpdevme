<template>
	<div>
		<Item v-for="(comment, index) in comments" :comment="comment" :key="index" />
	</div>
</template>
<script>
import Item from './item';

export default {
	props: ['question', 'comments'],
	components: {
		Item
	}
};
</script>
