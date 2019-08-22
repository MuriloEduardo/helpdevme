const getUnreadsPosts = state =>
	state.talks.map(talk =>
		talk.posts.filter(post => !post.read_at)
	);

export default {
	getUnreadsPosts
};
