/**
 * PRIVATE
 */
const updateOrCreateTalk = (state, post) => {
	console.log('updateOrCreateTalk');
	state.talks = state.talks.map(talk => {
		console.log('possivelmente aqui vem a NOVA talk quando é criada', talk);
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

const ADD_POST = (state, post) => updateOrCreateTalk(state, post);

const SET_POST = (state, post) => updateOrCreateTalk(state, post);

export default {
	SET_TALKS,
	ADD_POST,
	SET_POST
};
