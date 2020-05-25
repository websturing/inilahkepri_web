import Vue from 'vue';
import VueRouter from 'vue-router';

import urlBase from '@/js/url';
import Dashboard from '@/js/components/dashboard';
import headline from '@/js/components/utama/headline';
import news from '@/js/components/utama/news';
import detail from '@/js/components/detail';
import album from '@/js/components/utama/album';


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    base: urlBase.urlBase,
    hash: false,
    routes: [
        {
            path: '/',
            name: '/',
            component: Dashboard,
        },
    ]
});

export default router;
