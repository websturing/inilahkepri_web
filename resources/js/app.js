import './bootstrap';
import Vue from 'vue';
import Routes from '@/js/routes.js';
import beritaDetail from '@/js/components/detail'
import albumDetail from '@/js/components/album/detail'

import Sticky from 'vue-sticky-directive'
Vue.use(Sticky)

const app = new Vue({
    el: '#app',
    router: Routes,
    components: {
        beritaDetail,
        albumDetail
    }
});
