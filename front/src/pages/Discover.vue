<template>
    <div class="-mx-8 -mb-24 -mt-6 md:border-l md:border-t md:border-b border-gray-300 grid md:grid-cols-[25%_75%] lg:grid-cols-[20%_80%] items-stretch">
        <form class="hidden md:block md:border-r border-gray-300 float-left p-4">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold">
                    Filtres
                </h3>
                <Button 
                    label="Tout effacer"
                    class="!bg-transparent !text-xs !text-secondary !font-semibold"
                />
            </div>

            <FilterEstateForm class="mt-4" />
        </form>

        <section class="mt-8 md:mt-4">
            <div class="flex justify-between items-center pl-4 sm:pr-5 sm:pl-10 md:pr-0 md:pl-0 md:px-0 md:justify-end">
                <Button
                    icon="pi pi-filter" 
                    label="Filtrer"
                    class="!text-xs !bg-secondary md:!hidden"
                    @click="filterDialog = true"
                />

                <Dialog
                    v-model:visible="filterDialog"
                    modal
                    header="Filtres"
                    class="!w-[90vw] h-[28rem]"
                >
                    <FilterEstateForm />
                </Dialog>

                <div class="flex sm:gap-4 md:mr-8">
                    <IconField>
                        <InputText 
                            placeholder="Rechercher"
                            class="!text-xs !w-36 sm:!w-full" 
                        />
                        <InputIcon 
                            title="Rechercher"
                            class="pi pi-search cursor-pointer" 
                        />
                    </IconField>
                    <Button 
                        icon="pi pi-sort-amount-up"
                        label="Trier par"
                        class="!text-xs !text-nowrap !bg-transparent !text-gray-500 !border !border-gray-300"
                        @click="toggleSort"
                    />

                    <Popover 
                        ref="sortPop"
                        class="w-52 text-xs"
                    >
                        <div class="flex flex-col space-y-4">
                            <div class="flex gap-2 items-center">
                                <i class="pi pi-sort-amount-up" />
                                <p>
                                    Ordre croissant
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <i class="pi pi-sort-amount-down" />
                                <p>
                                    Ordre décroissant
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <i class="pi pi-star-fill" />
                                <p>
                                    Les plus vues
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <i class="pi pi-dollar" />
                                <p>
                                    Les moins chers
                                </p>
                            </div>
                        </div>
                    </Popover>
                </div>
            </div>

            <div class="mt-2 p-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
                <CardEstate
                    v-for="estate in estates"
                    :key="estate.id"
                    :estate="estate"
                />
            </div>
        </section>
    </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import type { CategoryLocation, TypeField, EstateStatus, Province, AccountStatus } from '../lib/types';

import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import Popover from 'primevue/popover';
import Dialog from 'primevue/dialog';
import CardEstate from '../components/ui/CardEstate.vue';
import FilterEstateForm from '../components/ui/FilterEstateForm.vue';

import propertyImg from '../assets/images/example-property.jpg';

const cities = [
    {
        id: 1,
        name: 'Ivato',
        province: 'Antananarivo',
    },
    {
        id: 2,
        name: 'Ambohibao',
        province: 'Antananarivo',
    },
];

const estates = [
    {
        id: 1,
        title: 'La Résidence',
        description: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, voluptatem.',
        category: 'sell' as CategoryLocation,
        field: {
            id: 1,
            type: 'buildable' as TypeField,
            is_fenced: true,
            road_access: true,
        },
        sell_price: '12000',
        rent_price: undefined,
        area: 123,
        longitude: 23.897686,
        latitude: 23.897686,
        address: '123 Baker',
        city: {
            id: 1,
            name: 'Ivato',
            province: 'Antananarivo' as Province,
        },
        promoter: {
            id: 1,
            user_id: 1,
            status: 'active' as AccountStatus,
        },
        agency: undefined,
        visitor: undefined,
        is_validated: true,
        status: 'available' as EstateStatus,
        cover_image: propertyImg,
        water: true,
        eletricity: true,
        views_count: 0,
    },
    {
        id: 1,
        title: 'La Résidence',
        description: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, voluptatem.',
        category: 'sell' as CategoryLocation,
        field: {
            id: 1,
            type: 'buildable' as TypeField,
            is_fenced: true,
            road_access: true,
        },
        sell_price: '12000',
        rent_price: undefined,
        area: 123,
        longitude: 23.897686,
        latitude: 23.897686,
        address: '123 Baker',
        city: {
            id: 1,
            name: 'Ivato',
            province: 'Antananarivo' as Province,
        },
        promoter: {
            id: 1,
            user_id: 1,
            status: 'active' as AccountStatus,
        },
        agency: undefined,
        visitor: undefined,
        is_validated: true,
        status: 'available' as EstateStatus,
        cover_image: propertyImg,
        water: true,
        eletricity: true,
        views_count: 0,
    },
    {
        id: 3,
        title: 'La Résidence',
        description: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, voluptatem.',
        category: 'sell' as CategoryLocation,
        field: {
            id: 1,
            type: 'buildable' as TypeField,
            is_fenced: true,
            road_access: true,
        },
        sell_price: '12000',
        rent_price: undefined,
        area: 123,
        longitude: 23.897686,
        latitude: 23.897686,
        address: '123 Baker',
        city: {
            id: 1,
            name: 'Ivato',
            province: 'Antananarivo' as Province,
        },
        promoter: {
            id: 1,
            user_id: 1,
            status: 'active' as AccountStatus,
        },
        agency: undefined,
        visitor: undefined,
        is_validated: true,
        status: 'available' as EstateStatus,
        cover_image: propertyImg,
        water: true,
        eletricity: true,
        views_count: 0,
    },
    {
        id: 2,
        title: 'La Résidence',
        description: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, voluptatem.',
        category: 'sell' as CategoryLocation,
        field: {
            id: 1,
            type: 'buildable' as TypeField,
            is_fenced: true,
            road_access: true,
        },
        sell_price: '12000',
        rent_price: undefined,
        area: 123,
        longitude: 23.897686,
        latitude: 23.897686,
        address: '123 Baker',
        city: {
            id: 1,
            name: 'Ivato',
            province: 'Antananarivo' as Province,
        },
        promoter: {
            id: 1,
            user_id: 1,
            status: 'active' as AccountStatus,
        },
        agency: undefined,
        visitor: undefined,
        is_validated: true,
        status: 'available' as EstateStatus,
        cover_image: propertyImg,
        water: true,
        eletricity: true,
        views_count: 0,
    },
    {
        id: 2,
        title: 'La Résidence',
        description: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, voluptatem.',
        category: 'sell' as CategoryLocation,
        field: {
            id: 1,
            type: 'buildable' as TypeField,
            is_fenced: true,
            road_access: true,
        },
        sell_price: '12000',
        rent_price: undefined,
        area: 123,
        longitude: 23.897686,
        latitude: 23.897686,
        address: '123 Baker',
        city: {
            id: 1,
            name: 'Ivato',
            province: 'Antananarivo' as Province,
        },
        promoter: {
            id: 1,
            user_id: 1,
            status: 'active' as AccountStatus,
        },
        agency: undefined,
        visitor: undefined,
        is_validated: true,
        status: 'available' as EstateStatus,
        cover_image: propertyImg,
        water: true,
        eletricity: true,
        views_count: 0,
    },
    {
        id: 2,
        title: 'La Résidence',
        description: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, voluptatem.',
        category: 'sell' as CategoryLocation,
        field: {
            id: 1,
            type: 'buildable' as TypeField,
            is_fenced: true,
            road_access: true,
        },
        sell_price: '12000',
        rent_price: undefined,
        area: 123,
        longitude: 23.897686,
        latitude: 23.897686,
        address: '123 Baker',
        city: {
            id: 1,
            name: 'Ivato',
            province: 'Antananarivo' as Province,
        },
        promoter: {
            id: 1,
            user_id: 1,
            status: 'active' as AccountStatus,
        },
        agency: undefined,
        visitor: undefined,
        is_validated: true,
        status: 'available' as EstateStatus,
        cover_image: propertyImg,
        water: true,
        eletricity: true,
        views_count: 0,
    },
    {
        id: 2,
        title: 'La Résidence',
        description: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, voluptatem.',
        category: 'sell' as CategoryLocation,
        field: {
            id: 1,
            type: 'buildable' as TypeField,
            is_fenced: true,
            road_access: true,
        },
        sell_price: '12000',
        rent_price: undefined,
        area: 123,
        longitude: 23.897686,
        latitude: 23.897686,
        address: '123 Baker',
        city: {
            id: 1,
            name: 'Ivato',
            province: 'Antananarivo' as Province,
        },
        promoter: {
            id: 1,
            user_id: 1,
            status: 'active' as AccountStatus,
        },
        agency: undefined,
        visitor: undefined,
        is_validated: true,
        status: 'available' as EstateStatus,
        cover_image: propertyImg,
        water: true,
        eletricity: true,
        views_count: 0,
    },
    {
        id: 2,
        title: 'La Résidence',
        description: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, voluptatem.',
        category: 'sell' as CategoryLocation,
        field: {
            id: 1,
            type: 'buildable' as TypeField,
            is_fenced: true,
            road_access: true,
        },
        sell_price: '12000',
        rent_price: undefined,
        area: 123,
        longitude: 23.897686,
        latitude: 23.897686,
        address: '123 Baker',
        city: {
            id: 1,
            name: 'Ivato',
            province: 'Antananarivo' as Province,
        },
        promoter: {
            id: 1,
            user_id: 1,
            status: 'active' as AccountStatus,
        },
        agency: undefined,
        visitor: undefined,
        is_validated: true,
        status: 'available' as EstateStatus,
        cover_image: propertyImg,
        water: true,
        eletricity: true,
        views_count: 0,
    },
    {
        id: 2,
        title: 'La Résidence',
        description: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, voluptatem.',
        category: 'sell' as CategoryLocation,
        field: {
            id: 1,
            type: 'buildable' as TypeField,
            is_fenced: true,
            road_access: true,
        },
        sell_price: '12000',
        rent_price: undefined,
        area: 123,
        longitude: 23.897686,
        latitude: 23.897686,
        address: '123 Baker',
        city: {
            id: 1,
            name: 'Ivato',
            province: 'Antananarivo' as Province,
        },
        promoter: {
            id: 1,
            user_id: 1,
            status: 'active' as AccountStatus,
        },
        agency: undefined,
        visitor: undefined,
        is_validated: true,
        status: 'available' as EstateStatus,
        cover_image: propertyImg,
        water: true,
        eletricity: true,
        views_count: 0,
    },
    {
        id: 2,
        title: 'La Résidence',
        description: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, voluptatem.',
        category: 'sell' as CategoryLocation,
        field: {
            id: 1,
            type: 'buildable' as TypeField,
            is_fenced: true,
            road_access: true,
        },
        sell_price: '12000',
        rent_price: undefined,
        area: 123,
        longitude: 23.897686,
        latitude: 23.897686,
        address: '123 Baker',
        city: {
            id: 1,
            name: 'Ivato',
            province: 'Antananarivo' as Province,
        },
        promoter: {
            id: 1,
            user_id: 1,
            status: 'active' as AccountStatus,
        },
        agency: undefined,
        visitor: undefined,
        is_validated: true,
        status: 'available' as EstateStatus,
        cover_image: propertyImg,
        water: true,
        eletricity: true,
        views_count: 0,
    },
    {
        id: 2,
        title: 'La Résidence',
        description: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, voluptatem.',
        category: 'sell' as CategoryLocation,
        field: {
            id: 1,
            type: 'buildable' as TypeField,
            is_fenced: true,
            road_access: true,
        },
        sell_price: '12000',
        rent_price: undefined,
        area: 123,
        longitude: 23.897686,
        latitude: 23.897686,
        address: '123 Baker',
        city: {
            id: 1,
            name: 'Ivato',
            province: 'Antananarivo' as Province,
        },
        promoter: {
            id: 1,
            user_id: 1,
            status: 'active' as AccountStatus,
        },
        agency: undefined,
        visitor: undefined,
        is_validated: true,
        status: 'available' as EstateStatus,
        cover_image: propertyImg,
        water: true,
        eletricity: true,
        views_count: 0,
    },
];

const sortPop = ref();
const filterDialog = ref(false);

const toggleSort = (event) => {
    sortPop.value.toggle(event);
}
</script>