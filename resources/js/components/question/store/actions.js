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

const setQuestion = ({ commit }, question) => commit('SET_QUESTION', question);

const uploadImages = ({ commit }, form) => {
	return new Promise((resolve, reject) => {
		axios
			.post('/api/questions/upload-images', form, {
				headers: {
					'Content-Type': 'multipart/form-data'
				}
			})
			.then(
				response => resolve(response.data.path),
				error => reject(error)
			);
	});
};

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

const openFormComment = ({ commit }, question_id) =>
	commit('OPEN_FORM_COMMENT', question_id);

const openFormEditComment = ({ commit }, question_id) =>
	commit('OPEN_FORM_EDIT_COMMENT', question_id);

const closetFormEditComment = ({ commit }, question_id) =>
	commit('CLOSE_FORM_EDIT_COMMENT', question_id);

/**
 * Votes
 */
const setVote = async ({ commit }, { question_id, vote }) => {
	const votes = (await axios.patch(`/api/questions/vote/${question_id}`, {
		vote
	})).data.votes;

	commit('SET_VOTE', { votes, question_id });
};

export default {
	addQuestion,
	setQuestions,
	setQuestion,
	uploadImages,
	openFormComment,
	openFormEditComment,
	closetFormEditComment,
	addComment,
	setComment,
	setVote
};
