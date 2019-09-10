import store from './store';

Echo.join('online')
	.here(users => store.dispatch('users/setPresence', users))
	.joining(user => store.dispatch('users/JOINING_PRESENCE', user))
	.leaving(user => store.dispatch('users/LEAVING_PRESENCE', user));

Echo.channel('comments').listen('CommentSent', response =>
	store.dispatch('questions/setComment', response.post)
);

Echo.channel('newquestions').listen('NewQuestionsEvent', response =>
	store.dispatch('questions/setQuestion', response.question)
);

Echo.private(`App.User.${window.$userId}`).notification(notification => {
	if (notification.type == 'App\\Notifications\\QuestionCommented') {
		store.dispatch('notifications/addNotification', notification, {
			root: true
		});
	}
});

Echo.private(`talks.user.${window.$userId}`).listen(
	'PrivateCreatedTalks',
	response => store.dispatch('talks/setPost', response.post)
);
