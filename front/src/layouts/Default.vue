<template>
    <div class="py-2">
        <Header />

        <main class="pt-8 pb-24 px-8">
            <router-view />
        </main>

        <Footer />
    </div>
</template>

<script lang="ts" setup>
import Header from '../components/inc/Header.vue';
import Footer from '../components/inc/Footer.vue';
</script>