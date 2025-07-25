<template>
    <footer class="bg-secondary py-6 px-8 space-y-8 text-white">
        <section class="flex justify-between">
            <div class="w-1/3">
                <Logo 
                    class="w-28 h-28"
                    :white="true"
                />
            </div>
            
            <div class="flex justify-end gap-16">
                <div>
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

                <div>
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

                <div class="w-1/3">
                    <h4 class="font-semibold">
                        S'inscrire au newsletter
                    </h4>
                    <p class="mt-2 text-xs">
                        Entrez votre e-mail ci-dessous pour vous abonner dès maintenant et recevez en avant-première les dernières annonces et Les tendances du marché immobilier
                    </p>
                </div>
            </div>
        </section>

        <hr class="!border-gray-300">

        <p class="text-center">

        </p>
    </footer>
</template>

<script lang="ts" setup>
import { computed } from 'vue';
import { useI18n } from 'vue-i18n';

import Logo from './Logo.vue';

const { t } = useI18n();

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