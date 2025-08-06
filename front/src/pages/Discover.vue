<template>
    <div class="-mx-8 -mb-24 -mt-6 border-l border-t border-b border-gray-300 grid grid-cols-[20%_80%] items-stretch">
        <form class="border-r border-gray-300 float-left p-4">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold">
                    Filtres
                </h3>
                <Button 
                    label="Tout effacer"
                    class="!bg-transparent !text-xs !text-secondary !font-semibold"
                />
            </div>

            <Select
                :options="cities" 
                optionValue="name"
                :optionLabel="city => `${city.name}, ${city.province}`"
                placeholder="Ville"
                filter 
                class="!mt-6 p-dropdown-custom"
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

            <Button 
                label="Appliquer"
                class="!bg-secondary !mt-8 !mb-4 !flex !w-full"
            />
        </form>

        <section class="mt-4">
            <div class="flex justify-end items-center gap-4 mr-8">
                <IconField>
                    <InputText 
                        placeholder="Rechercher"
                        class="!text-xs" 
                    />
                    <InputIcon 
                        title="Rechercher"
                        class="pi pi-search cursor-pointer" 
                    />
                </IconField>
                <Button 
                    icon="pi pi-sort-amount-up"
                    label="Trier par"
                    class="!text-xs !bg-transparent !text-gray-500 !border !border-gray-300"
                    @click="toggle"
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

            <div class="mt-2 p-8 grid grid-cols-3 gap-6 items-stretch">
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
import Select from 'primevue/select';
import RadioButton from 'primevue/radiobutton';
import Checkbox from 'primevue/checkbox';
import InputText from 'primevue/inputtext';
import Chip from 'primevue/chip';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import Popover from 'primevue/popover';
import CardEstate from '../components/ui/CardEstate.vue';

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

const toggle = (event) => {
    sortPop.value.toggle(event);
}
</script>