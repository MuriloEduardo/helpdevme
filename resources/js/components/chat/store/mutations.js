/**
 * PRIVATE
 */
const updateOrCreateTalk = (state, post) => {
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
};

const SET_TALKS = (state, talks) => (state.talks = talks);

const SET_TALK = (state, talk) => (state.talks = [...state.talks, talk]);

const ADD_POST = (state, post) => updateOrCreateTalk(state, post);

const SET_POST = (state, post) => updateOrCreateTalk(state, post);

export default {
	SET_TALKS,
	SET_TALK,
	ADD_POST,
	SET_POST
};
