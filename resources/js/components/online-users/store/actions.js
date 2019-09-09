const setPresence = ({ commit }, users) => commit('SET_PRESENCE', users);

const LEAVING_PRESENCE = ({ commit }, user) => commit('LEAVING_PRESENCE', user);

const JOINING_PRESENCE = ({ commit }, user) => commit('JOINING_PRESENCE', user);

const openChat = ({ commit }, receiver_id) => {
	return new Promise((resolve, reject) => {
		axios
			.post('/api/talks', {
				receiver_id
			})
			.then(
				response => {
					console.log('openChat', response);
					resolve(response);
				},
				error => reject(error)
			);
	});
};

export default {
	setPresence,
	LEAVING_PRESENCE,
	JOINING_PRESENCE,
	openChat
};
