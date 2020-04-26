import Vue from 'vue';
import VueRouter from 'vue-router';

import urlBase from '@/js/url';
import Dashboard from '@/js/components/dashboard';
import headline from '@/js/components/utama/headline';


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    base: urlBase.urlBase,
    hash: false,
    routes: [
        {
            path: '/',
            name: '/',
            component: headline,
        },
    ]
});

export default router;