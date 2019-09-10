<template></template>
<script>
export default {
	props: ['talk_id'],

	data() {
		return {
			channel: undefined
		};
	},

	created() {
		this.channel = Echo.private(`posts.${this.talk_id}.private`);

		this.channel.listen('PrivatePostSent', response => {
			this.$emit('receivedPost', response.post);
		});
	}
};
</script>
