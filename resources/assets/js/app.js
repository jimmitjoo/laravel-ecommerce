/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../../../node_modules/bootstrap-select/js/bootstrap-select')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('cart', require('./components/Cart.vue'));
Vue.component('minicart', require('./components/MiniCart.vue'));
/*Vue.component('addtocart', require('./components/AddToCart.vue'));*/

window.order_id = localStorage.order_id;
window.added_to_tart = false;

window.Event = new Vue();

import Store from './Store.vue';
import { routes } from './routes';
import VueRouter from 'vue-router';
window.Vue.use(VueRouter);

const router = new VueRouter({
    routes,
    // This does only work if the server response with the index file on every request
    // mode: 'history'
});

const app = new Vue({
    el: '#app',
    render: h => h(Store),
    router
});