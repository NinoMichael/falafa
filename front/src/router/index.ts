import { createRouter, createWebHistory, type RouteRecordRaw } from 'vue-router';

import { useRegistrationEmailStore } from '../stores/user/useRegistrationStore';

import Default from '../layouts/Default.vue';
import Auth from '../layouts/Auth.vue';

import Home from '../pages/Home.vue';
import Login from '../pages/auth/Login.vue';
import RegisterEmail from '../pages/auth/RegisterEmail.vue';
import RegisterInfo from '../pages/auth/RegisterInfo.vue';
import VerifyEmail from '../pages/auth/VerifyEmail.vue';
import RegisterProfile from '../pages/auth/RegisterProfile.vue';

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
            { path: 'verify-email', name: 'VerifyEmail', component: VerifyEmail },
            { path: 'register-profile', name: 'RegisterProfile', component: RegisterProfile },
        ]
    },
    // { path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFound },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    const store = useRegistrationEmailStore()

    if (to.name === 'RegisterInfo' && !store.emailEntered) {
        return next({ name: 'RegisterEmail' });
    }

    if (to.name === 'VerifyEmail' && !store.emailVerified) {
        return next({ name: 'RegisterInfo' });
    }

    next();
});

export default router;
