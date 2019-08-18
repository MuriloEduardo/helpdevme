const setTalks = async ({ commit }) => {
	const talks = (await axios.get('/api/talks')).data.talks;

	commit('SET_TALKS', talks);
};

export default {
	setTalks
};
