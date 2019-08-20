/**
 * PRIVATE
 */
const question = ({ list, news }, question_id) =>
	[...list, ...news].find(question => question.id == question_id);

const getQuestion = state => question_id => question(state, question_id);

const getComments = state => question_id => {
	const returnQuestion = question(state, question_id);

	if (returnQuestion) return returnQuestion.comments;
};

export default {
	getQuestion,
	getComments
};
