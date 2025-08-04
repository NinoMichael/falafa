<template>
    <div class="grid grid-cols-3 items-center">
        <form class="border border-gray-200">

        </form>

        <section class="p-8 grid grid-cols-3 items-center">
            <CardEstate
                v-for="estate in estates"
                :key="estate.id"
                :estate="estate"
            />
        </section>
    </div>
</template>

<script lang="ts" setup>
import type { CategoryLocation, TypeField, EstateStatus, Province, AccountStatus } from '../lib/types';

import CardEstate from '../components/ui/CardEstate.vue';

import propertyImg from '../assets/images/example-property.jpg';

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
]
</script>