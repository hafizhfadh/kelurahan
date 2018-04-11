
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

// Vue.component('pickup-orders', require('./components/PickupOrders.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

require('./bulma-extensions');

require('./dashboard');

require('select2/dist/js/select2');

require('@fortawesome/fontawesome');

require('@fortawesome/fontawesome-free-solid');

require('@fortawesome/fontawesome-free-regular');

require('@fortawesome/fontawesome-free-brands');
