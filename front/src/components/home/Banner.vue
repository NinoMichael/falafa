<template>
    <div class="relative">
        <img 
            :src="banner" 
            alt="Banner of Falafa homepage"
            class="object-cover mt-48 flex justify-center mx-auto"
        >

        <div class="absolute -top-48 left-1/2 transform -translate-x-1/2">
            <div class="relative text-center">
                <h1 class="text-primary font-bold text-4xl text-nowrap">
                    Trouvez la propriété idéale en un clic !
                </h1>
                <p class="mt-4 text-base">
                    Facilitez votre recherche de terrain, maison ou appartement grâce à <strong class="font-semibold text-xl text-secondary">Falafa</strong>, la plateforme de location et de vente immobilière partout à Madagascar
                </p>
            </div>

            <form class="mt-6 relative bg-tertiary shadow flex gap-6 p-6 items-center">
                <section class="grid grid-cols-3 items-center">
                    <div class="flex flex-col gap-3">
                        <label 
                            class="flex gap-3 items-center"
                        >
                            <i class="pi pi-map-marker" />
                            <span>
                                Ville
                            </span>
                        </label>

                        <Select 
                            v-model="selectedCity"
                            :options="cities"
                            optionLabel="name"
                            placeholder="Sélectionner"
                            class="p-dropdown-custom !shadow-none !bg-transparent"
                            overlayClass="p-dropdown-custom-overlay !bg-white"
                            :pt="{
                                label: 'p-dropdown-custom-label',
                                option: 'p-dropdown-custom-option'
                            }"
                        />
                    </div>

                    <div class="flex flex-col gap-3">
                        <label 
                            class="flex gap-3 items-center"
                        >
                            <i class="pi pi-home" />
                            <span>
                                Propriété
                            </span>
                        </label>

                        <Select 
                            v-model="selectedProperty"
                            :options="properties"
                            optionLabel="name"
                            placeholder="Sélectionner"
                            class="p-dropdown-custom !shadow-none !bg-transparent"
                            overlayClass="p-dropdown-custom-overlay !bg-white"
                            :pt="{
                                label: 'p-dropdown-custom-label',
                                option: 'p-dropdown-custom-option'
                            }"
                        />
                    </div>

                    <div class="flex flex-col gap-3">
                        <label 
                            class="flex gap-3 items-center"
                        >
                            <i class="pi pi-wallet" />
                            <span>
                                Prix
                            </span>
                        </label>

                        <InputText
                            v-model="price"  
                            type="text"
                            placeholder="Entrer"
                            class="!border-none !h-8 !text-sm !bg-transparent !shadow-none"
                        />
                    </div>
                </section>

                <Button 
                    icon="pi pi-search"
                    class="!bg-primary !mt-8 !w-12"
                />
            </form>
        </div>

    </div>
</template>

<script lang="ts" setup>
import { ref } from "vue";

import Select from 'primevue/select';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';

import banner from '../../assets/images/banner.png';

const selectedCity = ref();
const cities = [
    {
        name: 'Antananarivo',
    },
    {
        name: 'Toamasina',
    },
];

const selectedProperty = ref();
const properties = [
    {
        name: 'Maison',
    },
    {
        name: 'Terrain',
    },
]

const price = ref(null);
</script>