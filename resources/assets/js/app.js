require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
Vue.component('jobs-component', require('./components/JobsComponent.vue').default);

const app = new Vue({
    el: '#app'
});

export default app;