import { createRouter, createWebHistory } from 'vue-router'

// web routes 
import Home from '../components/web/Home.vue';
import Offres from '../components/web/Offres.vue';

// etp routes 
import Authenticate from '../components/etps/Authenticate.vue';
import Dashboard from '../components/etps/Dashboard.vue';
import HomeAdmin from '../components/etps/HomeAdmin.vue';
const routes =[
    // web routes 
    { 
        path: '/',
        name:'home',
        component: Home,
        children: [
            {path: '/offres', component: Offres, name: 'offres'},
        ],
    },
    // etp routes 
    {path: '/etp/auth', component: Authenticate, name: 'etp-auth'},
    {
        path: '/etp/dashboard',
        name:'dashboard',
        component: Dashboard,
        children: [
            {path: '/home-admin', component: HomeAdmin, name: 'home-admin'},
        ],
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})