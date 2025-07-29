<template>
    <form
        class="px-8 lg:px-24"
        @submit.prevent="submit"
    >
        <h1 class="text-2xl font-semibold text-center text-primary">
            {{ t('registerTitle') }}
        </h1>
        <p class="mt-3 text-center">
            {{ t('enterRegisterInfo') }}
        </p>

        <section 
            :class="formData.role == 'agency' ? 'space-y-4 mt-10' : 'mt-16 space-y-10'"
        >
            <FloatLabel 
                inputId="on_label"
                variant="on"
            >
                <Select 
                    v-model="formData.role"
                    :options = "accountTypes" 
                    optionLabel = "label"
                    optionValue = "value"
                    class="p-dropdown-custom"
                    overlayClass="p-dropdown-custom-overlay !bg-white"
                    :pt="{
                        label: 'p-dropdown-custom-label font-medium',
                        option: 'p-dropdown-custom-option'
                    }"
                />
                <label 
                    for="on_label"
                    class="in-focus-within:!text-secondary"
                >
                    {{ t('accountType') }}
                </label>
            </FloatLabel>

            <FloatLabel
                variant="on"
            >
                <InputText
                    id="email" 
                    v-model="formData.contact"
                    class="focus-within:!border-secondary"
                />
                <label 
                    for="email"
                    class="in-focus-within:!text-secondary"
                >
                    {{ t('phoneNumber') }}
                </label>
            </FloatLabel>

            <FloatLabel
                v-if="formData.role == 'agency'"
                variant="on"
            >
                <InputText
                    id="companyName" 
                    v-model="formData.company_name"
                    class="focus-within:!border-secondary"
                />
                <label 
                    for="companyName"
                    class="in-focus-within:!text-secondary"
                >
                    {{ t('companyName') }}
                </label>
            </FloatLabel>

            <FloatLabel
                v-if="formData.role == 'agency'"
                variant="on"
            >
                <InputText
                    id="nif" 
                    v-model="formData.nif"
                    class="focus-within:!border-secondary"
                />
                <label 
                    for="nif"
                    class="in-focus-within:!text-secondary"
                >
                    NIF
                </label>
            </FloatLabel>

            <FloatLabel
                v-if="formData.role == 'agency'"
                variant="on"
            >
                <InputText
                    id="stat" 
                    v-model="formData.stat"
                    class="focus-within:!border-secondary"
                />
                <label 
                    for="stat"
                    class="in-focus-within:!text-secondary"
                >
                    STAT
                </label>
            </FloatLabel>

            <FloatLabel
                v-if="formData.role == 'agency'"
                variant="on"
            >
                <InputText
                    id="stat" 
                    v-model="formData.responsible_name"
                    class="focus-within:!border-secondary"
                />
                <label 
                    for="stat"
                    class="in-focus-within:!text-secondary"
                >
                    {{ t('responsibleName') }}
                </label>
            </FloatLabel>
        </section>

        <Button 
            :label="t('next')"
            type="submit"
            :loading="loading"
            class="!mt-10 !bg-secondary !w-full"
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
import { computed, reactive } from 'vue';
import { useI18n } from 'vue-i18n';

import Select from 'primevue/select';
import InputText from 'primevue/inputtext';
import FloatLabel from 'primevue/floatlabel';
import Button from 'primevue/button';
import { useToast } from "primevue/usetoast";

import { useAuth } from '../../composables/useAuth';

import { useRegistrationEmailStore } from '../../stores/user/useRegistrationStore';

const { t, locale } = useI18n();
const toast = useToast();
const { register, loading, error } = useAuth();

const formData = reactive({
    role: 'visitor',
    contact: '',
    company_name: '',
    nif: '',
    stat: '',
    responsible_name: '',
});

const accountTypes = computed(() => [
    {
        label: t('visitor'),
        value: 'visitor',
    },
    {
        label: t('promoter'),
        value: 'promoter',
    },
    {
        label: 'Agence',
        value: 'agency',
    },
]);

const submit = async () => {
    const store = useRegistrationEmailStore();

    const payload: any = reactive({
        email: store.email,
        password: store.password,
        role: formData.role,
        contact: formData.contact,
        lang: locale.value,
    });

    if (formData.role === 'agency') {
        payload.company_name = formData.company_name;
        payload.nif = formData.nif;
        payload.stat = formData.stat;
        payload.responsible_name = formData.responsible_name;
    }

    try {
        const response = await register(payload);

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