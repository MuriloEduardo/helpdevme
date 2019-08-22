const setTalk = ({ commit }, talk) => commit('SET_TALK', talk);

const setTalks = async ({ commit }) => {
	const talks = (await axios.get('/api/talks')).data.talks;

	commit('SET_TALKS', talks);
};

const addPost = async ({ commit }, post) => {
	return new Promise((resolve, reject) => {
		axios.post('/api/posts', post).then(
			response => {
				commit('ADD_POST', response.data.post);

				resolve(response);
			},
			error => reject(error)
		);
	});
};

const setPost = ({ commit }, post) => commit('SET_POST', post);

export default {
	setTalks,
	addPost,
	setPost,
	setTalk
};
