const setTalk = ({ commit }, talk) => commit('SET_TALK', talk);

const setTalks = async ({ commit }) => {
	const talks = (await axios.get('/api/talks')).data.talks;

	commit('SET_TALKS', talks);
};

const sendPost = async ({ commit }, post) => {
	return new Promise((resolve, reject) => {
		axios.post('/api/posts', post).then(
			response => {
				commit('SET_POST', response.data.post);

				resolve(response);
			},
			error => reject(error)
		);
	});
};

const setPost = ({ commit }, post) => commit('SET_POST', post);

const markAsRead = async ({ commit }, talk_id) => {
	const response = (await axios.get(`/api/talks/${talk_id}`)).data;

	commit('MARK_AS_READ', response.talk);
};

const markAllAsRead = async ({ commit }) => {
	const response = (await axios.get('/api/talks/all-read')).data;

	commit('MARK_ALL_AS_READ', response.talks);
};

const uploadImages = ({ commit }, form) => {
	return new Promise((resolve, reject) => {
		axios
			.post('/api/talks/upload-images', form, {
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

export default {
	setTalks,
	setPost,
	sendPost,
	setTalk,
	markAsRead,
	markAllAsRead,
	uploadImages
};
