<template>
	<div>
		<div class="preview-image" @click="openUploadIMage">
			<img
				v-if="user.avatar_url"
				class="img-fluid avatar"
				:src="avatar_url ? avatar_url : user.avatar_url"
				v-bind:alt="user.name"
				v-bind:title="user.name"
			/>
			<i v-else class="fas fa-user-circle fa-4x"></i>
		</div>
		<input type="file" @change="onFileChange" name="avatar" ref="avatarFile" hidden />
	</div>
</template>
<script>
export default {
	props: ['user'],
	data() {
		return {
			avatar_url: undefined
		};
	},
	methods: {
		onFileChange(e) {
			const file = e.target.files[0];
			this.avatar_url = URL.createObjectURL(file);
		},
		openUploadIMage() {
			this.$refs.avatarFile.click();
		}
	}
};
</script>
