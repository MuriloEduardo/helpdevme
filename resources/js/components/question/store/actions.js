/**
 * Question
 */
const addQuestion = async ({ commit }, obj) => {
	const question = await axios.post('/api/questions', obj);

	commit('ADD_QUESTION', question);

	return question;
};

const setQuestions = async ({ commit }) => {
	const list = (await axios.get('/api/questions')).data.questions;

	commit('SET_QUESTIONS', list);
};

const setQuestion = ({ commit }, question) => {
	commit('SET_QUESTION', question);
};

const setTypingQuestion = ({ commit }, user) => {
	commit('SET_TYPING_QUESTION', user);
};

/**
 * Comments
 */
const addComment = async ({ commit }, obj) => {
	const comment = await axios.post('/api/comments', obj);

	commit('ADD_COMMENT', comment);

	return comment;
};

const setComment = ({ commit }, obj) => {
	commit('SET_COMMENT', obj);
};

const setTypingComment = ({ commit }, payload) => {
	commit('SET_TYPING_COMMENT', payload);
};

export default {
	addQuestion,
	setQuestions,
	setQuestion,
	setTypingQuestion,
	addComment,
	setComment,
	setTypingComment
};
