<template>
    <div :class="props.class">
        <Select
            :options="cities"
            optionValue="name"
            :optionLabel="city => `${city.name}, ${city.region}`"
            placeholder="Ville"
            filter 
            class="p-dropdown-custom"
            overlayClass="!w-12 !bg-white"
            :pt="{
                label: 'p-dropdown-custom-label font-medium',
                option: 'p-dropdown-custom-option',
            }"
        />

        <div class="mt-10">
            <label class="font-semibold text-primary">
                Statut
            </label>
            <div class="mt-4 flex flex-col space-y-4">
                <div class="flex items-center gap-2">
                    <RadioButton 
                        inputId="all" 
                        name="all" 
                        value="all"
                        :pt="{
                            box: '!text-secondary !border-secondary !ring-secondary',
                        }" 
                    />
                    <label for="all">
                        Tous
                    </label>
                </div>

                <div class="flex items-center gap-2">
                    <RadioButton 
                        inputId="sell" 
                        name="sell" 
                        value="sell" 
                        :pt="{
                            box: '!text-secondary !border-secondary !ring-secondary',
                        }" 
                    />
                    <label for="sell">
                        À vendre
                    </label>
                </div>

                <div class="flex items-center gap-2">
                    <RadioButton 
                        inputId="sell" 
                        name="sell" 
                        value="sell" 
                        :pt="{
                            box: '!text-secondary !border-secondary !ring-secondary',
                        }" 
                    />
                    <label for="sell">
                        À louer
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-10">
            <label class="font-semibold text-primary">
                Type de propriété
            </label>
            <div class="mt-4 flex flex-col space-y-4">
                <div class="flex items-center gap-2">
                    <Checkbox 
                        inputId="field" 
                        name="field" 
                        value="field"
                        :pt="{
                            box: '!text-secondary !border-secondary !ring-secondary',
                        }" 
                    />
                    <label for="field">
                        Terrain
                    </label>
                </div>
                <div class="flex items-center gap-2">
                    <Checkbox 
                        inputId="house" 
                        name="house" 
                        value="house"
                        :pt="{
                            box: '!text-secondary !border-secondary !ring-secondary',
                        }" 
                    />
                    <label for="house">
                        Maison
                    </label>
                </div>
                <div class="flex items-center gap-2">
                    <Checkbox 
                        inputId="appartment" 
                        name="appartment" 
                        value="appartment"
                        :pt="{
                            box: '!text-secondary !border-secondary !ring-secondary',
                        }" 
                    />
                    <label for="house">
                        Appartement
                    </label>
                </div>
                <div class="flex items-center gap-2">
                    <Checkbox 
                        inputId="office" 
                        name="office" 
                        value="office"
                        :pt="{
                            box: '!text-secondary !border-secondary !ring-secondary',
                        }" 
                    />
                    <label for="office">
                        Office
                    </label>
                </div>
                <div class="flex items-center gap-2">
                    <Checkbox 
                        inputId="store" 
                        name="store" 
                        value="store"
                        :pt="{
                            box: '!text-secondary !border-secondary !ring-secondary',
                        }" 
                    />
                    <label for="office">
                        Magasin
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-10 flex flex-col gap-2">
            <label class="font-semibold text-primary">
                No. chambres
            </label>
            <InputText 
                type="number"
            />
        </div>

        <div class="mt-10">
                <label class="font-semibold text-primary">
                    Prix
                </label>
                <div class="mt-4 flex flex-col space-y-4">
                    <div class="flex flex-col gap-2">
                        <label for="field">
                            Min *
                        </label>
                        <InputText 
                            type="number"
                        />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="field">
                            Max
                        </label>
                        <InputText 
                            type="number"
                        />
                    </div>
                </div>
            </div>

        <div class="mt-10">
            <label class="font-semibold text-primary">
                    Équipements
            </label>
            <div class="mt-4 flex flex-wrap gap-4">
                <Chip 
                    label="Eau"
                    class="!text-sm !cursor-pointer" 
                />
                <Chip 
                    label="Électricité"
                    class="!text-sm !cursor-pointer" 
                />
                <Chip 
                    label="Clôture"
                    class="!text-sm !cursor-pointer" 
                />
                <Chip 
                    label="Jardin"
                    class="!text-sm !cursor-pointer" 
                />
                <Chip 
                    label="Garage"
                    class="!text-sm !cursor-pointer" 
                />
                <Chip 
                    label="Meublé"
                    class="!text-sm !cursor-pointer" 
                />
                <Chip 
                    label="Étage"
                    class="!text-sm !cursor-pointer" 
                />
                <Chip 
                    label="Balcon"
                    class="!text-sm !cursor-pointer" 
                />
                <Chip 
                    label="Parking"
                    class="!text-sm !cursor-pointer" 
                />
            </div>
        </div>

        <div class="flex flex-col mt-8 mb-4 space-y-6">
            <Button 
                label="Annuler"
                class="!bg-gray-200 !text-gray-800 !w-full md:!hidden"
            />
            <Button 
                label="Appliquer"
                class="!bg-secondary !w-full"
            />
        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref,onMounted } from 'vue';

import Button from 'primevue/button';
import Select from 'primevue/select';
import RadioButton from 'primevue/radiobutton';
import Checkbox from 'primevue/checkbox';
import InputText from 'primevue/inputtext';
import Chip from 'primevue/chip';

import { useCity } from '../../composables/useCity';

const { getCity } = useCity();

const props = defineProps({
    class: {
        type: String,
        required: false
    }
});


const cities = ref([]);

onMounted( async() => {
    cities.value = await getCity();
});
</script>