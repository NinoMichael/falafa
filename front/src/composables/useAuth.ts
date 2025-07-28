import { ref } from 'vue';
import axios from 'axios';
import { useI18n } from 'vue-i18n';

import { loginService } from '../services/user/AuthService';

const loading = ref<boolean>(false);
const error = ref(null);

export const useAuth = () => {
    const { t } = useI18n();

    const login = async (credentials) => {
        loading.value = true;
        error.value = null;
    
        try {
            const response = await loginService(credentials);

            localStorage.setItem('user', JSON.stringify(response.data?.user));
        
            axios.defaults.headers.common['Authorization'] = `Bearer ${JSON.stringify(response.data?.token)}`;
        } 
        catch (err) {
            error.value = err?.response?.data?.message;
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