import { createRouter, createWebHistory, type RouteRecordRaw } from 'vue-router'

import Default from '../layouts/Default.vue'
import Auth from '../layouts/Auth.vue'

import Home from '../pages/Home.vue'
import Login from '../pages/auth/Login.vue'
import RegisterEmail from '../pages/auth/RegisterEmail.vue'
import RegisterInfo from '../pages/auth/RegisterInfo.vue'
import VerifyEmail from '../pages/auth/VerifyEmail.vue'

const routes: RouteRecordRaw[] = [
    {
        path: '/',
        component: Default,
        children: [
            { path: '', name: 'Home', component: Home },
        ]
    },
    {
        path: '/auth/',
        component: Auth,
        children: [
            { path: 'login', name: 'Login', component: Login },
            { path: 'register-email', name: 'RegisterEmail', component: RegisterEmail },
            { path: 'register-info', name: 'RegisterInfo', component: RegisterInfo },
            { path: 'verify-email', name: 'VerifiyEmail', component: VerifyEmail },
        ]
    },
    // { path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFound },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
