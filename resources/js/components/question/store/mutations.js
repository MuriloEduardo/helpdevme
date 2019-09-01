/**
 * PRIVATE
 */
const updateOrCreateComment = (state, comment) => {
	['list', 'news'].forEach(type => {
		state[type] = state[type].map(question => {
			if (question.id == comment.talk.question_id) {
				if (
					question.comments.find(
						_comment => _comment.id == comment.id
					)
				) {
					question.comments = question.comments.filter(
						_comment => comment.id != _comment.id
					);
				}
				question.comments = [...question.comments, comment];
			}
			return question;
		});
	});
};

/**
 * Questions
 */
const ADD_QUESTION = ({ news }, response) =>
	news.unshift(response.data.question);

const SET_QUESTIONS = (state, questions) => (state.list = questions);

const SET_QUESTION = ({ news }, question) => news.unshift(question);

const START_TYPING_QUESTION = (state, user) =>
	(state.typings = [...state.typings, user.id]);

const STOP_TYPING_QUESTION = (state, user) =>
	(state.typings = state.typings.filter(user_id => user_id != user.id));

/**
 * Comments
 */
const ADD_COMMENT = (state, comment) => updateOrCreateComment(state, comment);

const SET_COMMENT = (state, comment) => updateOrCreateComment(state, comment);

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
	START_TYPING_QUESTION,
	STOP_TYPING_QUESTION,
	ADD_COMMENT,
	SET_COMMENT,
	SET_TYPING_COMMENT
};
