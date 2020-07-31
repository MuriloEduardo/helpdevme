<template>
	<picture class="position-relative">
		<img
			class="rounded-circle"
			:width="size + 'px'"
			:style="'height:' + size + 'px!important'"
			v-if="person.avatar"
			:src="person.avatar"
			:alt="person.name"
			:title="person.name"
		/>
		<i v-else class="fas fa-user-circle fa-2x"></i>
		<i
			:class="online ? 'text-success' : ''"
			class="fas fa-circle fa-xs position-absolute online-list-item"
		></i>
	</picture>
</template>
<script>
export default {
	props: ['person', 'online', 'size']
};
</script>
