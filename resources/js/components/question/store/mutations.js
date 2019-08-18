import Vue from 'vue';

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

/**
 * Comments
 */
const ADD_COMMENT = (state, { data }) =>
	getQuestion(state, data.post.talk.question_id).comments.push(data.post);

const SET_COMMENT = (state, comment) =>
	getQuestion(state, comment.talk.question_id).comments.push(comment);

const SET_TYPING_COMMENT = (state, question) => {
	state.list = [
		...state.list
			.filter(_question => question.id === _question.id)
			.map(_question => (_question = { ..._question, typing: true }))
	];
};

export default {
	ADD_QUESTION,
	SET_QUESTIONS,
	SET_QUESTION,
	ADD_COMMENT,
	SET_COMMENT,
	SET_TYPING_COMMENT
};
