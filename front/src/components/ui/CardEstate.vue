<template>
    <div class="relative h-full w-full cursor-pointer hover:transform hover:transition-all hover:scale-105 hover:duration-500 hover:ease-in-out">
        <img 
            :src="props.estate.cover_image"
            :alt="props.estate.title"
            class="object-cover h-64 w-full rounded-xl" 
        >

        <div class="absolute bottom-2 left-2 right-2 flex justify-between items-center bg-white p-4 rounded">
            <div>
                <p class="text-base font-medium">
                    {{ props.estate.title }}
                </p>
                <p>
                    <i class="pi pi-map-marker mr-2"/>
                    <span>
                        {{ props.estate.city.name }}, {{ props.estate.city.province }}
                    </span>
                </p>
            </div>

            <div>
                <p class="font-semibold">
                    {{ props.estate.sell_price }} Ar
                </p>
            </div>
        </div>

        <Badge 
            :value="typeLocations[props.estate.category]"
            class="absolute top-0 left-0"
            :class="props.estate.category == 'rent' as CategoryLocation ? '!bg-secondary' : '!bg-primary'"
        />
    </div>
</template>

<script lang="ts" setup>
import type { CategoryLocation, Estate } from '../../lib/types';
import { typeLocations } from '../../lib/constants';

import Badge from 'primevue/badge';

const props = defineProps<{
    estate: Estate;
}>();
</script>