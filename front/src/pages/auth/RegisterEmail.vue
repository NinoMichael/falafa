<template>
    <form 
        class="px-8 lg:px-24"
        @submit.prevent="submit"
    >
        <h1 class="text-2xl font-semibold text-center text-primary">
            {{ t('registerTitle') }}
        </h1>
        <p class="mt-3 text-center">
            {{ t('enterRegisterEmail') }}
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

            <FloatLabel 
                variant="on"
            >
                <Password
                    id="passwordConfirm" 
                    v-model="formData.passwordConfirm"
                    class="focus-within:!border-secondary !w-full"
                    :feedback="false"
                    toggleMask
                    :pt="{
                        pcInputText: 'in-focus-within:!border-secondary'
                    }"
                />
                <label 
                    for="passwordConfirm"
                    class="in-focus-within:!text-secondary"
                >
                    {{ t('passwordConfirm') }}
                </label>
            </FloatLabel>
        </section>

        <Button 
            :label="t('next')"
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
            {{ t('alreadyHave') }}
            <router-link 
                to="/auth/register-email"
                class="font-semibold text-primary"
            >
                {{ t('login') }}
            </router-link>
        </p>
    </form>
</template>

<script lang="ts" setup>
import { reactive } from 'vue';
import { useRouter } from 'vue-router';
import { useI18n } from 'vue-i18n';

import InputText from 'primevue/inputtext';
import FloatLabel from 'primevue/floatlabel';
import Password from 'primevue/password';
import Button from 'primevue/button';

import { useRegistrationEmailStore } from '../../stores/user/useRegistrationStore';

const { t } = useI18n();
const router = useRouter();

const formData = reactive({
    email: '',
    password: '',
    passwordConfirm: '',
});

const submit = () => {
    const store = useRegistrationEmailStore();
    
    store.email = formData.email;
    if ( formData.password == formData.passwordConfirm ) {
        store.password = formData.password;
    }

    router.push('/auth/register-info');
}
</script>