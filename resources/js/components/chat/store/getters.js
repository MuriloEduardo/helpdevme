const getUnreadsPosts = state => {
	let total = 0;

	state.talks.forEach(talk => {
		if (talk.posts) {
			talk.posts.forEach(post => {
				if (!post.read_at && post.user_id != window.$userId) {
					total++;
				}
			});
		}
	});

	return total;
};

export default {
	getUnreadsPosts
};
