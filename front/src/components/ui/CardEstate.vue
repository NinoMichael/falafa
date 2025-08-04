<template>
    <div class="relative shadow rounded-2xl">
        <img 
            :src="props.estate.cover_image"
            :alt="props.estate.title"
            class="object-cover w-full" 
        >
        <div class="absolute bottom-4 bg-white p-4 rounded-md">
            <h2>
                {{ props.estate.title }}
            </h2>
        </div>
    </div>
</template>

<script lang="ts" setup>
import type { Estate } from '../../lib/types';

const props = defineProps<{
    estate: Estate;
}>();
</script>