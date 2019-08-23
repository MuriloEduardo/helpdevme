const getUnreadsPosts = state =>
	state.talks.filter(talk => {
		if (talk.posts) {
			talk.posts.filter(post => {
				return !post.read_at && post.user_id != window.$userId;
			});
		}
	}
);

export default {
	getUnreadsPosts
};
