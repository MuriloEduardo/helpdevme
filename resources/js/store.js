import Vue from 'vue';
import Vuex from 'vuex';

import questions from './components/question/store';
import talks from './components/chat/store';
import notifications from './components/notifications/store';
import users from './components/online-users/store';

Vue.use(Vuex);

const modules = {
	users,
	notifications,
	questions,
	talks
};

export default new Vuex.Store({
	strict: process.env.NODE_ENV !== 'production',
	modules
});
