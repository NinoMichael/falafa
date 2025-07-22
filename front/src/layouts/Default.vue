<template>
    <div class="py-2 px-8">
        <Header />

        <main class="py-8">
            <router-view />
        </main>
    </div>
</template>

<script lang="ts" setup>
import Header from '../components/inc/Header.vue';
</script>