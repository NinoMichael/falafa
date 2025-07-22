import { createRouter, createWebHistory } from 'vue-router'

import Default from '../layouts/Default.vue'
import Home from '../pages/Home.vue'

const routes = [
    {
        path: '/',
        component: Default,
        children: [
            { path: '', name: 'Home', component: Home },
        ]
    },
    // { path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFound },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
