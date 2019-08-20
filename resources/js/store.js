import Vue from 'vue';
import Vuex from 'vuex';

import questions from './components/question/store';
import talks from './components/chat/store';
import notifications from './components/notifications/store';

Vue.use(Vuex);

const modules = {
	notifications,
	questions,
	talks
};

export default new Vuex.Store({
	strict: process.env.NODE_ENV !== 'production',
	modules,
	state: {
		users: []
	},
	mutations: {
		SET_PRESENCE(state, users) {
			state.users = users;
		},
		LEAVING_PRESENCE(state, user) {
			state.users = state.users.filter(_user => _user.id != user.id);
		},
		JOINING_PRESENCE(state, user) {
			state.users = [...state.users, user];
		}
	},
	actions: {
		SET_PRESENCE({ commit }, users) {
			commit('SET_PRESENCE', users);
		},
		LEAVING_PRESENCE({ commit }, user) {
			commit('LEAVING_PRESENCE', user);
		},
		JOINING_PRESENCE({ commit }, user) {
			commit('JOINING_PRESENCE', user);
		}
	}
});
