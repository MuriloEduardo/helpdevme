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

/**
 * Comments
 */
const ADD_COMMENT = (state, comment) => updateOrCreateComment(state, comment);

const SET_COMMENT = (state, comment) => updateOrCreateComment(state, comment);

const OPEN_FORM_COMMENT = (state, question_id) => {
	['list', 'news'].forEach(type => {
		state[type] = state[type].map(question => {
			if (question.id == question_id) {
				question.openFormComment = true;
			}
			return question;
		});
	});
};

/**
 * Votes
 */
const SET_VOTE = (state, { votes, question_id }) => {
	['list', 'news'].forEach(type => {
		state[type] = state[type].map(question => {
			if (question.id == question_id) {
				question.votes = votes;
			}
			return question;
		});
	});
};

export default {
	ADD_QUESTION,
	SET_QUESTIONS,
	SET_QUESTION,
	OPEN_FORM_COMMENT,
	ADD_COMMENT,
	SET_COMMENT,
	SET_VOTE
};
