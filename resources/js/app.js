import './bootstrap';
import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import Routes from '@/js/routes.js';
import beritaDetail from '@/js/components/detail'
import albumDetail from '@/js/components/album/detail'
import inilahnews from '@/js/components/inilahnews/inilahnews'

import Sticky from 'vue-sticky-directive'
Vue.use(Sticky)
Vue.use(ElementUI);

const app = new Vue({
    el: '#app',
    router: Routes,
    components: {
        beritaDetail,
        albumDetail,
        inilahnews
    }
});
