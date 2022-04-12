require('./bootstrap');
// require('braintree');
window.Vue = require('vue');
import App from './views/App';
import Vue from 'vue';
import Home from './pages/Home';
import Search from './pages/Search';
import Checkout from './pages/Checkout';
import Restaurant from './pages/Restaurant.vue';
import Success from './pages/Success.vue';
import VueRouter from 'vue-router';
import VueBraintree from 'vue-braintree';
import VueTilt from 'vue-tilt.js';

Vue.use(VueTilt)
Vue.use(VueBraintree)
Vue.use(VueRouter);

require('velocity-animate');

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/search',
            name: 'search',
            component: Search
        },
        {
            path: '/restaurant/:slug',
            name: 'restaurant',
            props: true,
            component: Restaurant
        },
        {
            path: '/checkout',
            name: 'checkout',
            props: true,
            component: Checkout
        },
        {
            path: '/success',
            name: 'success',
            props: true,
            component: Success
        },
    ]
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});