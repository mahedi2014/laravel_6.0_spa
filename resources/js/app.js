require('./bootstrap');
window.Vue = require('vue');

import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
import Vuex from 'vuex';
import local from './lib/local';
import axioClient from './lib/axioClient';

Vue.use(VueRouter);

Vue.use(VueAxios, axios);
Vue.prototype.axioClient = axioClient;

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
/*Vue.prototype.$axios = axios;
const token = local.getStorage('_token');
if (token) {
    Vue.prototype.$axios.defaults.headers.common['Authorization'] = "Bearer "+token;
}
Vue.use(Vuex);*/

