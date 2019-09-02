/**
 * Question
 */

const getQuestion = async ({ commit }, obj) => {
	console.log('getQuestion');
};

const addQuestion = async ({ commit }, obj) => {
	const question = await axios.post('/api/questions', obj);

	commit('ADD_QUESTION', question);

	return question;
};

const setQuestions = async ({ commit }) => {
	const list = (await axios.get('/api/questions')).data.questions;

	commit('SET_QUESTIONS', list);
};

const setQuestion = ({ commit }, question) => commit('SET_QUESTION', question);

const startTypingQuestion = ({ commit }, user) =>
	commit('START_TYPING_QUESTION', user);

const stopTypingQuestion = ({ commit }, user) =>
	commit('STOP_TYPING_QUESTION', user);

/**
 * Comments
 */
const addComment = ({ commit }, obj) => {
	return new Promise((resolve, reject) => {
		axios.post('/api/comments', obj).then(
			response => {
				commit('ADD_COMMENT', response.data.post);

				commit('talks/SET_POST', response.data.post, {
					root: true
				});

				resolve(response);
			},
			error => reject(error)
		);
	});
};

const setComment = ({ commit }, obj) => commit('SET_COMMENT', obj);

const setTypingComment = ({ commit }, payload) =>
	commit('SET_TYPING_COMMENT', payload);

export default {
	getQuestion,
	addQuestion,
	setQuestions,
	setQuestion,
	startTypingQuestion,
	stopTypingQuestion,
	addComment,
	setComment,
	setTypingComment
};
