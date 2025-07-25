<template>
    <div class="py-2 h-screen">
        <Header />

        <main class="pt-8 pb-24 px-8">
            <router-view />
        </main>

        <Footer />

        <ScrollTop />
    </div>
</template>

<script lang="ts" setup>
import ScrollTop from 'primevue/scrolltop';

import Header from '../components/inc/Header.vue';
import Footer from '../components/inc/Footer.vue';
</script>

<style>
.p-scrolltop {
  background-color: oklch(0.6995 0.0524 53.79) !important;
  color: white !important;
  border-radius: 50% !important;
}
</style>