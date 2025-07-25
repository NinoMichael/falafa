<template>
    <footer class="bg-secondary py-6 px-8 space-y-8 text-white">
        <section class="flex flex-col sm:flex-row justify-center items-center mx-auto sm:justify-between sm:mx-0 sm:items-start">
            <div class="w-1/3">
                <Logo 
                    class="w-28 h-28 object-cover mx-auto sm:mx-0"
                    :white="true"
                />
            </div>
            
            <div class="mt-4 flex flex-col justify-center items-center mx-auto gap-8 sm:mt-0 sm:flex-row sm:flex-wrap sm:mx-0 sm:items-start sm:justify-end sm:gap-16">
                <div class="text-center sm:text-start">
                    <h4 class="font-semibold mb-2">
                        {{ t('quickLinks') }}
                    </h4>

                    <RouterLink
                        v-for="quick in quickLinks"
                        :key="quick.name"
                        :to="quick.url"
                        class="block mb-1"
                    >
                        {{ quick.name }}
                    </RouterLink>
                </div>

                <div class="text-center sm:text-start">
                    <h4 class="font-semibold mb-2">
                        {{ t('legals') }}
                    </h4>

                    <RouterLink
                        v-for="legal in legalLinks"
                        :key="legal.name"
                        :to="legal.url"
                        class="block mb-1"
                    >
                        {{ legal.name }}
                    </RouterLink>
                </div>

                <div class="sm:-ml-24 text-center lg:text-start lg:ml-0 lg:w-1/3">
                    <h4 class="font-semibold">
                        {{ t('subscribeNewsletter') }}
                    </h4>
                    <p class="mt-2 sm:mx-24 lg:mx-0">
                        {{ t('pSubscribeNews') }}
                    </p>

                    <form class="flex items-center sm:mx-24 lg:mx-0 sm:mt-4 lg:mt-0">
                        <InputText 
                            type="text"
                            :placeholder="t('emailAddress')"
                            class="!w-full !mt-2 !text-xs !rounded-full"
                            size="small"
                        />
                        <Button 
                            :label="t('save')"
                            class="!bg-primary hover:!bg-primary/90 !border-none !px-5 !text-xs !mt-1 !rounded-full"
                        />
                    </form>
                </div>
            </div>
        </section>

        <hr class="!border-gray-300">

        <p class="text-center text-xs">
            &copy; 2025 Falafa - {{ t('allRightsReserved') }}.
        </p>
    </footer>
</template>

<script lang="ts" setup>
import { ref, computed } from 'vue';
import { useI18n } from 'vue-i18n';

import InputText from 'primevue/inputtext';
import Button from 'primevue/button';
import Logo from './Logo.vue';

const { t } = useI18n();

const email = ref('');

const quickLinks = computed(() => [
    {
        name: t('homeMin'), 
        url: '/',
    },
    {
        name: t('discoverMin'), 
        url: '/discover',
    },
    {
        name: t('servicesMin'), 
        url: '/services',
    },
    {
        name: t('contactMin'), 
        url: '/contact',
    }
])

const legalLinks = computed(() => [
    {
        name: t('termsOfUse'), 
        url: '/terms-of-use',
    },
    {
        name: t('privacyPolicy'), 
        url: '/privacy-policy',
    },
    {
        name: t('support'), 
        url: '/support',
    },
]);
</script>