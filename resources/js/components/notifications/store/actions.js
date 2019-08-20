const loadNotifications = async ({ commit }) => {
	const notifications = (await axios.get('/api/notifications')).data
		.notifications;

	commit('LOAD_NOTIFICATIONS', notifications);
};

const markAsRead = async ({ commit }, notification_id) => {
	const response = (await axios.get(`/api/notifications/${notification_id}`))
		.data;

	commit('MARK_AS_READ', response.notification.id);
};

const markAllAsRead = async ({ commit }) => {
	const response = (await axios.get('/api/notifications-all-read')).data;

	console.log('markAllAsRead', response);

	// commit('MARK_AS_READ', response.notification.id);
};

export default {
	loadNotifications,
	markAsRead,
	markAllAsRead
};
