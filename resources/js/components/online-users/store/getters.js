const getOnlineUsers = state =>
	state.onlineUsers.filter(user => user.id != window.$userId);

const getOnlineUser = state => opposite_id =>
	state.onlineUsers.find(user => user.id == opposite_id);

export default {
	getOnlineUser,
	getOnlineUsers
};
