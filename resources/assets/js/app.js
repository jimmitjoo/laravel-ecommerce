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

Vue.component('example', require('./components/Example.vue'));
Vue.component('addtocart', require('./components/AddToCart.vue'));
Vue.component('minicart', require('./components/MiniCart.vue'));

window.order_id = localStorage.order_id;
window.added_to_tart = false;

window.Event = new Vue();

const app = new Vue({
    el: '#app'
});