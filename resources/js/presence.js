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
		store.dispatch('questions/setComment', response.post, { root: true })
	)
	.listenForWhisper('typing', e => {
		store.dispatch('questions/setTypingComment', e, { root: true });
	});
