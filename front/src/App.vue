<template>
    <Toast
        position="bottom-right" 
        :pt="{
            message: '!bg-white !border-gray-100 !shadow',
            summary: '!-mt-0.5',
        }"
    />
    <router-view />
</template>

<script lang="ts" setup>
import Toast from 'primevue/toast';
</script>