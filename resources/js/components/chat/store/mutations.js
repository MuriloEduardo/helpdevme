/**
 * PRIVATE
 */
const updateOrCreateTalk = (state, post) => {
	console.log('updateOrCreateTalk', post);
	if (state.talks.length) {
		console.log('if');
		state.talks = state.talks.map(talk => {
			let _talk = talk;

			if (talk.id == post.talk.id) {
				if (talk.posts) {
					_talk = { ...talk, posts: [...talk.posts, post] };
				} else {
					_talk = { ...talk, posts: [post] };
				}
			}

			return _talk;
		});
	} else {
		console.log('else');
	}
};

const SET_TALKS = (state, talks) => (state.talks = talks);

const SET_TALK = (state, talk) => {
	console.log('SET_TALK', talk);
	return (state.talks = [...state.talks, talk]);
};

const SET_POST = (state, post) => updateOrCreateTalk(state, post);

export default {
	SET_TALKS,
	SET_TALK,
	SET_POST
};
