<template>
    <form class="mt-8 px-8 lg:px-24">
        <img 
            :src="verifyEmail" 
            alt="Verify email"
            class="mx-auto w-64"
        >

        <div class="mt-8">
            <h2 class="text-center text-lg font-bold text-secondary">
                {{ t('titleVerifyEmail') }}
            </h2>

            <p class="mt-6 text-center">
                {{ t('pVerifyEmail') }}
            </p>

            <Button
                icon="pi pi-arrow-right"
                :label="t('resendEmail')" 
                :loading="loading"
                class="!mt-10 !bg-transparent !text-primary !font-semibold !mx-auto !flex !gap-6"
                @click="handleResendEmail"
            />
        </div>
    </form>
</template>

<script lang="ts" setup>
import { useI18n } from 'vue-i18n';

import { Button } from 'primevue';
import { useToast } from "primevue/usetoast";
import { useAuth } from '../../composables/useAuth';

import verifyEmail from '../../assets/images/verify-email.png';

const toast = useToast();
const { t, locale } = useI18n();
const { loading, error, resendEmail } = useAuth();

const handleResendEmail = async () => {
    const lang = locale.value;

    try {
        const response = await resendEmail(lang);

        toast.add({ 
            severity: 'success',
            summary: t('success'),
            detail: response.data.message,
            life: 3000,  
        });
    } 
    catch (err) {
        toast.add({ 
            severity: 'error',
            summary: t('error'),
            detail: error.value,
            life: 3000,  
        });
    }
}
</script>

