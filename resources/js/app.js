/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import store from './store';
import BootstrapVue from 'bootstrap-vue';
import VueCurrencyFilter from 'vue-currency-filter';
import VueChatScroll from 'vue-chat-scroll';
import VueQuillEditor from 'vue-quill-editor';

// require styles
import 'quill/dist/quill.core.css';
import 'quill/dist/quill.snow.css';
import 'quill/dist/quill.bubble.css';

Vue.use(VueQuillEditor);

Vue.use(BootstrapVue);

Vue.use(VueCurrencyFilter, {
	symbol: 'R$',
	thousandsSeparator: '.',
	fractionCount: 2,
	fractionSeparator: ',',
	symbolPosition: 'front',
	symbolSpacing: true
});

Vue.use(VueChatScroll);

Vue.prototype.$userId = window.$userId;

Vue.component('PrivateChat', require('./components/chat'));
Vue.component('ListChat', require('./components/chat/list'));

Vue.component('CreateQuestion', require('./components/question/create'));
Vue.component('EditQuestion', require('./components/question/edit'));
Vue.component('VotesQuestion', require('./components/question/votes'));
Vue.component('ActionsQuestion', require('./components/question/actions'));

Vue.component('ListNewQuestions', require('./components/question/list'));

Vue.component('CComments', require('./components/comments'));
Vue.component('CountComments', require('./components/comments/count-comments'));

Vue.component('OnlineUsers', require('./components/online-users'));

Vue.component('Notifications', require('./components/notifications'));
Vue.component('ListItem', require('./components/chat/list-item'));

Vue.component(
	'ProfilePreviewAvatar',
	require('./components/profile-preview-avatar')
);

const app = new Vue({
	store,
	el: '#app',
	mounted() {
		store.dispatch('questions/setQuestions');
	}
});
