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

const getUnreadsTalk = state => talk_id => {
	let total = 0;

	state.talks.forEach(talk => {
		if (talk.posts && talk.id == talk_id) {
			talk.posts.forEach(post => {
				if (!post.read_at && post.user_id != window.$userId) {
					total++;
				}
			});
		}
	});

	return total;
};

const getTalk = state => talk_id =>
	state.talks.find(talk => talk.id == talk_id);

export default {
	getUnreadsPosts,
	getTalk,
	getUnreadsTalk
};
