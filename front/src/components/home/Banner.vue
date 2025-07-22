<template>
    <div class="relative">
        <img 
            :src="banner" 
            alt="Banner of Falafa homepage"
            class="object-cover mt-[42rem] sm:mt-48 flex justify-center mx-auto"
        >

        <div class="absolute w-full sm:w-auto -top-[42rem] sm:-top-48 left-1/2 transform -translate-x-1/2">
            <div class="relative text-center">
                <h1 class="text-primary font-bold text-4xl sm:text-nowrap">
                   {{ t('introTitle') }}
                </h1>
                <p class="mt-4 text-base">
                    {{ t('introFirstP') }} <strong class="font-semibold text-xl text-secondary">Falafa</strong>, {{ t('introSecondP') }}
                </p>
            </div>

            <form class="mt-6 relative bg-tertiary shadow flex flex-col sm:flex-row gap-3 sm:gap-6 p-6 items-center">
                <section class="grid sm:grid-cols-3 items-center gap-6 sm:gap-0">
                    <div class="border-b sm:border-b-0 sm:border-r border-gray-400 flex flex-col gap-3">
                        <label 
                            class="flex gap-3 items-center"
                        >
                            <i class="pi pi-map-marker" />
                            <span>
                                {{ t('city') }}
                            </span>
                        </label>

                        <Select 
                            v-model="searchFormData.city"
                            :options="cities"
                            optionLabel="name"
                            :placeholder="t('select')"
                            class="p-dropdown-custom !shadow-none !bg-transparent"
                            overlayClass="p-dropdown-custom-overlay !bg-white"
                            :pt="{
                                label: 'p-dropdown-custom-label',
                                option: 'p-dropdown-custom-option'
                            }"
                        />
                    </div>

                    <div class="sm:ml-4 border-b sm:border-b-0 sm:border-r border-gray-400 flex flex-col gap-3">
                        <label 
                            class="flex gap-3 items-center"
                        >
                            <i class="pi pi-home" />
                            <span>
                                {{ t('property') }}
                            </span>
                        </label>

                        <Select 
                            v-model="searchFormData.property"
                            :options="properties"
                            optionLabel="name"
                            :placeholder="t('select')"
                            class="p-dropdown-custom !shadow-none !bg-transparent"
                            overlayClass="p-dropdown-custom-overlay !bg-white"
                            :pt="{
                                label: 'p-dropdown-custom-label',
                                option: 'p-dropdown-custom-option'
                            }"
                        />
                    </div>

                    <div class="sm:ml-4 flex flex-col gap-3">
                        <label 
                            class="flex gap-3 items-center"
                        >
                            <i class="pi pi-wallet" />
                            <span>
                                {{ t('price') }}
                            </span>
                        </label>

                        <InputText
                            v-model="searchFormData.price"  
                            type="text"
                            :placeholder="t('entry')"
                            class="!border-none !h-8 !text-sm !bg-transparent !shadow-none"
                        />
                    </div>
                </section>

                <Button 
                    icon="pi pi-search"
                    class="!bg-primary hover:!bg-primary/90 !mt-8 !w-16 !hidden sm:!flex"
                />

                <Button 
                    icon="pi pi-search"
                    label="Rechercher"
                    class="!bg-primary hover:!bg-primary/90 !mt-3 !w-full sm:!hidden"
                />
            </form>
        </div>

    </div>
</template>

<script lang="ts" setup>
import { reactive } from "vue";
import { useI18n } from 'vue-i18n';

import Select from 'primevue/select';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';

import banner from '../../assets/images/banner.png';

const { t } = useI18n();

const searchFormData = reactive({
    city: null,
    property: null,
    price: '',
});

const cities = [
    {
        name: 'Antananarivo',
    },
    {
        name: 'Toamasina',
    },
];

const properties = [
    {
        name: 'Maison',
    },
    {
        name: 'Terrain',
    },
]
</script>