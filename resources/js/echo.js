import store from './store';

window.Echo.join('online')
	.here(users => {
		store.dispatch('SET_PRESENCE', users);
	})
	.joining(user => {
		store.dispatch('JOINING_PRESENCE', user);
	})
	.leaving(user => {
		store.dispatch('LEAVING_PRESENCE', user);
	});

window.Echo.private('comments')
	.listen('PrivateCommentSent', response =>
		store.dispatch('questions/setComment', response.post)
	)
	.listenForWhisper('typing', payload => {
		store.dispatch('questions/setTypingComment', payload);
	});

window.Echo.private('newquestions')
	.listen('NewQuestionsEvent', response => {
		store.dispatch('questions/setQuestion', response.question);
	})
	.listenForWhisper('typing', user => {
		store.dispatch('questions/setTypingQuestion', user);
	});
