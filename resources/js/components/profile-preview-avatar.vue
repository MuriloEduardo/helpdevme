<template>
	<div>
		<div class="preview-image text-center" @click="openUploadIMage">
			<img
				v-if="user.avatar || avatar"
				class="img-fluid avatar"
				:src="avatar ? avatar : user.avatar"
				v-bind:alt="user.name"
				v-bind:title="user.name"
			/>
			<i v-else class="fas fa-user-circle fa-6x"></i>
		</div>
		<input type="file" @change="onFileChange" name="avatar" ref="avatarFile" hidden />
	</div>
</template>
<script>
export default {
	props: ['user'],
	data() {
		return {
			avatar: undefined
		};
	},
	methods: {
		onFileChange(e) {
			const file = e.target.files[0];
			this.avatar = URL.createObjectURL(file);
		},
		openUploadIMage() {
			this.$refs.avatarFile.click();
		}
	}
};
</script>
