import './bootstrap';
import Vue from 'vue';
import Routes from '@/js/routes.js';


const app = new Vue({
    el: '#app',
    router: Routes
});