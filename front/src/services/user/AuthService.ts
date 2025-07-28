import axios from "axios";

const baseURL = import.meta.env.VITE_API_URL;

export const loginService = (formData: { email: string; password: string }) => {
    return axios.post(`${baseURL}/api/login`, formData);
};