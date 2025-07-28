<template>
    <form
        class="px-8 lg:px-24"
        @submit.prevent="submit"
    >
        <h1 class="text-2xl font-semibold text-center text-primary">
            {{ t('loginTitle') }}
        </h1>
        <p class="mt-3 text-center">
            {{ t('enterInfoLogin') }}
        </p>

        <section class="mt-10 space-y-8">
            <FloatLabel 
                variant="on"
            >
                <InputText
                    id="email" 
                    v-model="formData.email"
                    class="focus-within:!border-secondary"
                />
                <label 
                    for="email"
                    class="in-focus-within:!text-secondary"
                >
                    {{ t('emailAddress') }}
                </label>
            </FloatLabel>

            <FloatLabel 
                variant="on"
            >
                <Password
                    id="password" 
                    v-model="formData.password"
                    class="focus-within:!border-secondary !w-full"
                    :feedback="false"
                    toggleMask
                    :pt="{
                        pcInputText: 'in-focus-within:!border-secondary'
                    }"
                />
                <label 
                    for="password"
                    class="in-focus-within:!text-secondary"
                >
                    {{ t('password') }}
                </label>
            </FloatLabel>
        </section>

        <div class="mt-4 text-[0.7em] sm:text-xs flex justify-between items-center">
            <div class="flex gap-2 items-center">
                <Checkbox id="remember"/>
                <label>
                    {{ t('rememberMe') }}
                </label>
            </div>
            
            <router-link
                to="/"
                class="underline underline-offset-2 text-primary"
            >
                {{ t('forgottenPassword') }}
            </router-link>
        </div>

        <Button 
            :label="t('login')"
            type="submit"
            class="!mt-10 !bg-secondary !w-full"
        />

        <div class="mt-8 relative text-gray-300">
            <hr class="border border-gray-200">
            <p class="absolute -top-4 left-[45%] text-base bg-white p-2">
                {{ t('or') }}
            </p>
        </div>

        <Button
            icon="pi pi-google" 
            :label="t('googleLogin')"
            class="!mt-10 !bg-primary !w-full"
        />

        <p class="mt-8 text-center text-xs">
            {{ t('dontHave') }}
            <router-link 
                to="/"
                class="font-semibold text-primary"
            >
                {{ t('registerLogin') }}
            </router-link>
        </p>
    </form>
</template>

<script lang="ts" setup>
import { reactive } from 'vue';
import { useI18n } from 'vue-i18n';

import InputText from 'primevue/inputtext';
import FloatLabel from 'primevue/floatlabel';
import Password from 'primevue/password';
import Checkbox from 'primevue/checkbox';
import Button from 'primevue/button';
import { useToast } from "primevue/usetoast";

import { useAuth } from '../../composables/useAuth';

const toast = useToast();
const { t, locale } = useI18n();
const { login, error } = useAuth();

const formData = reactive({
    email: '',
    password: '',
    lang: locale.value,
});

const submit = async () => {
    formData.lang = locale.value;

    try {
        await login(formData);
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