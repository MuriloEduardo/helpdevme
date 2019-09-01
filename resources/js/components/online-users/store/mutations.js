const SET_PRESENCE = (state, users) => (state.onlineUsers = users);

const LEAVING_PRESENCE = (state, user) =>
	(state.onlineUsers = state.onlineUsers.filter(
		_user => _user.id != user.id
	));

const JOINING_PRESENCE = (state, user) =>
	(state.onlineUsers = [...state.onlineUsers, user]);

export default {
	SET_PRESENCE,
	LEAVING_PRESENCE,
	JOINING_PRESENCE
};
