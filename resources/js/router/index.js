import { createRouter, createWebHistory } from 'vue-router'

// web routes 
import Home from '../components/web/Home.vue';
import Offres from '../components/web/Offres.vue';

const routes =[
    { 
        path: '/',
        name:'home',
        component: Home,
        children: [
            {path: '/offres', component: Offres, name: 'offres'},
        ],
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})