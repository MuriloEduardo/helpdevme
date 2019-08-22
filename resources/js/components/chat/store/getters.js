const getUnreadsPosts = state =>
	state.talks.map(talk =>
		talk.posts.filter(post => {
			if (!post.read_at && post.user_id != window.$userId) {
				return post;
			}
		})
	);

export default {
	getUnreadsPosts
};
