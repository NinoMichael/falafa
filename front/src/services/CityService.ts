import axios from "axios";

const baseURL = import.meta.env.VITE_API_URL;

export const getCityService = () => {
    return axios.get(`${baseURL}/api/cities/`, {
        headers: {
            'Accept-Language': 'fr',
        }
    });
};