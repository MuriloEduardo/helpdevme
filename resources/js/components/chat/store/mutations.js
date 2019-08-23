/**
 * PRIVATE
 */
const createTalk = (state, talk) =>
	state.talks = [talk, ...state.talks];

const updateOrCreateTalk = (state, post) => {
	const talkIndex = state.talks.findIndex(talk => talk.id == post.talk.id);

	if (talkIndex != -1) {
		state.talks.splice(talkIndex, 1);
	}

	createTalk(state, post.talk);
};

const SET_TALKS = (state, talks) => (state.talks = talks);

const SET_TALK = (state, talk) => {
	return (state.talks = [...state.talks, talk]);
};

const SET_POST = (state, post) => updateOrCreateTalk(state, post);

export default {
	SET_TALKS,
	SET_TALK,
	SET_POST
};
