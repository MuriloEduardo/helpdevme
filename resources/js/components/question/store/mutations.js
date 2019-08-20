/**
 * PRIVATE
 */
const getQuestion = ({ list, news }, question_id) =>
	[...list, ...news].find(question => question.id == question_id);

/**
 * Questions
 */
const ADD_QUESTION = ({ news }, response) =>
	news.unshift(response.data.question);

const SET_QUESTIONS = (state, questions) => (state.list = questions);

const SET_QUESTION = ({ news }, question) => news.unshift(question);

const SET_TYPING_QUESTION = (state, user) =>
	(state.typings = [...state.typings, user.id]);

/**
 * Comments
 */
const ADD_COMMENT = (state, { data }) =>
	getQuestion(state, data.post.talk.question_id).comments.push(data.post);

const SET_COMMENT = (state, comment) =>
	getQuestion(state, comment.talk.question_id).comments.push(comment);

const SET_TYPING_COMMENT = (state, { question, user_id }) => {
	['list', 'news'].forEach(type => {
		state[type] = state[type].map(_question => {
			if (_question.id == question.id) {
				if (
					!_question.typings ||
					!_question.typings.find(_user_id => _user_id == user_id)
				) {
					_question = {
						..._question,
						typings: [...(_question.typings || []), user_id]
					};
				}
			}
			return _question;
		});
	});
};

export default {
	ADD_QUESTION,
	SET_QUESTIONS,
	SET_QUESTION,
	SET_TYPING_QUESTION,
	ADD_COMMENT,
	SET_COMMENT,
	SET_TYPING_COMMENT
};
