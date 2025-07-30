import axios from "axios";
import type { RegisterData } from "../../lib/types";

const baseURL = import.meta.env.VITE_API_URL;

export const loginService = (formData: { email: string; password: string, lang: string; }) => {
    return axios.post(`${baseURL}/api/login`, formData, {
        headers: {
            'Accept-Language': formData.lang,
        }
    });
};

export const registerService = (formData: RegisterData) => {
    return axios.post(`${baseURL}/api/register`, formData, {
        headers: {
            'Accept-Language': formData.lang,
        }
    });
};

export const resendVerifyEmailService = (lang: string, token: string) => {
    return axios.post(`${baseURL}/api/email/resend`, null, {
        headers: {
            'Accept-Language': lang,
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`,
        }
    });
}