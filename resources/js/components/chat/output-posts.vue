<template></template>
<script>
export default {
	props: ['talk'],

	data() {
		return {
			channel: Echo.private(`posts.${this.talk.id}.private`)
		};
	},

	created() {
		this.$parent.$on('typing', this.typing);

		this.channel
			.listen('PrivatePostSent', response => {
				this.$emit('receivedPost', response.post);
			})
			.listenForWhisper('typing', e => {
				this.$emit('whisper', e.typing);
			});
	},

	methods: {
		typing() {
			setTimeout(() => {
				this.channel.whisper('typing', {
					typing: true
				});
			}, 300);
		}
	}
};
</script>
