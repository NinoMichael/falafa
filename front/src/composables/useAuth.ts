import { ref } from 'vue';
import axios from 'axios';
import { useI18n } from 'vue-i18n';
import type { User } from '../lib/types';

import { loginService } from '../services/user/AuthService';

const user = ref<User>(null);
const token = ref<string>(null);
const loading = ref<boolean>(false);
const error = ref(null);

export const useAuth = () => {
    const { t } = useI18n();

    const login = async (credentials) => {
        loading.value = true;
        error.value = null;
    
        try {
            await loginService(credentials);
        
            axios.defaults.headers.common['Authorization'] = `Bearer ${token.value}`;
        } 
        catch (err) {
            error.value = err?.response?.data?.message || t('errConnection');
            throw err;
        } 
        finally {
            loading.value = false;
        }
    }

    return {
        login,
        error,
    }
}