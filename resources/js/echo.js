import store from './store';

Echo.join('online')
	.here(users => {
		store.dispatch('SET_PRESENCE', users);
	})
	.joining(user => {
		store.dispatch('JOINING_PRESENCE', user);
	})
	.leaving(user => {
		store.dispatch('LEAVING_PRESENCE', user);
	});

Echo.private('comments')
	.listen('PrivateCommentSent', response =>
		store.dispatch('questions/setComment', response.post)
	)
	.listenForWhisper('typing', payload => {
		store.dispatch('questions/setTypingComment', payload);
	});

Echo.private('newquestions')
	.listen('NewQuestionsEvent', response => {
		store.dispatch('questions/setQuestion', response.question);
	})
	.listenForWhisper('typing', user => {
		store.dispatch('questions/setTypingQuestion', user);
	});

Echo.private(`App.User.${window.$userId}`).notification(notification => {
	if (notification.type == 'App\\Notifications\\QuestionCommented') {
		store.dispatch('notifications/addNotification', notification);
	}
});
