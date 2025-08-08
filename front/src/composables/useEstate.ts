import { ref } from 'vue';
import type { Estate } from '../lib/types';
import { transformEstates } from '../lib/utils/transformer';

import { getAndFilterEstatesService } from '../services/estate/EstateService';

const loading = ref<boolean>(false);
const error = ref(null);
const estates = ref<Estate[]>([]);

export const useEstate = () => {
    const getAndFilterEstate = async (formData) => {
        try {
            loading.value = true;

            const response = await getAndFilterEstatesService(formData);
            const { data } = response.data;
    
            estates.value = transformEstates(data);
        } 
        catch (err) {
            error.value = err;
            throw err;
        }
        finally {
            loading.value = false;
        }
    }

    return {
        loading,
        error,
        getAndFilterEstate,
        estates,
    }
}