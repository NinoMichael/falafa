<template>
    <div class="px-8 lg:px-24">
        <img 
            :src="welcomeRegister" 
            alt="Welcome to Falafa"
            class="-mt-8 mx-auto w-72"
        >

        <div class="-mt-8">
            <h2 class="text-center text-xl font-bold text-primary">
                {{ t('welcomeTo') }}
            </h2>

            <p class="mt-6 text-center">
                {{ t('thankRegistering') }} <br>
                {{ t('whereverYou') }}
            </p>
        </div>

        <Button
            icon="pi pi-megaphone"
            :label="t('continueToExplore')"
            class="!mt-10 !bg-secondary !text-white !font-semibold !mx-auto !flex !gap-6"
        />

        <p class="mt-10 text-[0.7em] text-center">
            {{ t('consultOur') }} <span class="font-semibold text-primary">{{ t('startGuide') }}</span> {{ t('orContactOur') }}
        </p>
    </div> 
</template>

<script lang="ts" setup>
import { useI18n } from 'vue-i18n';

import Button from 'primevue/button';

import welcomeRegister from '../../assets/images/welcome-after-register.png';

const { t } = useI18n();
</script>