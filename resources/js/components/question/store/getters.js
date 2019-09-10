/**
 * PRIVATE
 */
const question = ({ list, news }, question_id) =>
	[...list, ...news].find(question => question.id == question_id);

/**
 * Question
 */
const getQuestion = state => question_id => question(state, question_id);

/**
 * Comments
 */
const getComments = state => question_id => {
	const returnQuestion = question(state, question_id);

	if (returnQuestion) return returnQuestion.comments;
};

const getFormComments = state => question_id => {
	const returnQuestion = question(state, question_id);

	if (returnQuestion) return returnQuestion.openFormComment;
};

/**
 * Votes
 */
const getVotes = state => question_id => {
	const returnQuestion = question(state, question_id);

	if (returnQuestion) return returnQuestion.votes;
};

const getUserVote = state => question_id => {
	const returnQuestion = question(state, question_id);

	if (returnQuestion && returnQuestion.votes) {
		return returnQuestion.votes.filter(
			vote => vote.user_id == window.$userId
		);
	}
};

export default {
	getQuestion,
	getComments,
	getFormComments,
	getVotes,
	getUserVote
};
