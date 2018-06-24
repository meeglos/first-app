
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('comments-manager', require('./components/CommentsManager.vue'));

const app = new Vue({
    el: '#app',
    data: {
        open: false,
    },
    methods: {
        toggle() {
            this.open = !this.open
        }
    }
});
