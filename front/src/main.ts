import { createApp } from 'vue';
import './style.css';
import PrimeVue from "primevue/config";
import Aura from '@primeuix/themes/aura';
import i18n from './locale/i18n';
import "primeicons/primeicons.css"; 
import App from './App.vue';
import router from './router';

const app = createApp(App);
app.use(PrimeVue, {
    theme: {
        preset: Aura,
        options: {
            prefix: 'p',
            darkModeSelector: 'system',
            cssLayer: false
        }
    }
});

app.use(router);
app.use(i18n);
app.mount('#app');
