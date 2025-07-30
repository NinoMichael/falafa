import axios from "axios";
import type { InformationDetail } from "../../lib/types";

const baseURL = import.meta.env.VITE_API_URL;

export const storeInfoDetailService = (formData: InformationDetail, token:string) => {
    return axios.post(`${baseURL}/api/profile/info-detail/store`, formData, {
        headers: {
            'Accept-Language': formData.lang,
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`,
        }
    });
};