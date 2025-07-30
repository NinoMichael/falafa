import { ref } from 'vue';
import axios from 'axios';

import { loginService, registerService, resendVerifyEmailService } from '../services/user/AuthService';

const loading = ref<boolean>(false);
const error = ref(null);

export const useAuth = () => {
    const login = async (credentials) => {
        loading.value = true;
        error.value = null;
    
        try {
            const response = await loginService(credentials);

            localStorage.setItem('token', response.data?.token);
            localStorage.setItem('user', JSON.stringify(response.data?.user));
        } 
        catch (err) {
            error.value = err?.response?.data?.message;
            throw err;
        } 
        finally {
            loading.value = false;
        }
    }

    const register = async (formData) => {
        loading.value = true;
        error.value = null;

        try {
            const response = await registerService(formData);
            
            localStorage.setItem('token', response.data?.token);
            localStorage.setItem('user', JSON.stringify(response.data?.user));

            return response.data?.message;
        } 
        catch (err) {
            error.value = err?.response?.data?.message;
            throw err;
        } 
        finally {
            loading.value = false;
        }
    }

    const resendEmail = async (lang) => {
        loading.value = true;
        error.value = null;

        const token = localStorage.getItem('token')

        try {
            return await resendVerifyEmailService(lang, token);
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
        register,
        resendEmail,
        error,
        loading,
    }
}