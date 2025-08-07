import { ref } from 'vue';
import { getCityService } from '../services/CityService';

const loading = ref<boolean>(false);
const error = ref(null);

export const useCity = () => {
    const getCity = async () => {
        const response = await getCityService();
        return response.data;
    }

    return {
        loading,
        error,
        getCity,
    }
}