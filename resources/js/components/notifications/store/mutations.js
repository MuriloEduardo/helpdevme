const MARK_ALL_AS_READ = state => (state.items = []);

const MARK_AS_READ = (state, notification_id) => {
	const index = state.items.filter(
		notification => notification.id == notification_id
	);

	state.items.splice(index, 1);
};

const LOAD_NOTIFICATIONS = (state, notifications) =>
	(state.items = notifications);

const ADD_NOTIFICATION = (state, notification) =>
	state.items.unshift(notification);

export default {
	LOAD_NOTIFICATIONS,
	MARK_AS_READ,
	MARK_ALL_AS_READ,
	ADD_NOTIFICATION
};
