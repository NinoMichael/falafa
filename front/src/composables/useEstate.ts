import { ref } from 'vue';
import type { Estate } from '../lib/types';
import { transformEstates } from '../lib/utils/transformer';

import { getAndFilterEstatesService } from '../services/estate/EstateService';

const loading = ref<boolean>(false);
const error = ref(null);
const estates = ref<Estate[]>([]);

export const useEstate = () => {
    const getAndFilterEstate = async (formData) => {
        const response = await getAndFilterEstatesService(formData);
        const { data } = response.data;

        estates.value = transformEstates(data);
    }

    return {
        loading,
        error,
        getAndFilterEstate,
        estates,
    }
}