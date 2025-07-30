<template>
    <div class="flex gap-3 items-center">
        <i class="pi pi-globe text-black/60" />

        <Select 
            v-model="selectedLanguage"
            :options = "languages" 
            optionLabel = "label"
            optionValue = "value"
            @change = "changeLanguage"
            class="p-dropdown-custom"
            overlayClass="p-dropdown-custom-overlay !bg-white"
            :pt="{
                label: 'p-dropdown-custom-label font-medium',
                option: 'p-dropdown-custom-option'
            }"
        />
    </div>
</template>

<script lang="ts" setup>
import { ref, watchEffect } from 'vue';
import { useI18n } from 'vue-i18n';
import { usePrimeVue } from 'primevue/config';

import Select from 'primevue/select';

const primevue = usePrimeVue();
const { locale, t } = useI18n();
const selectedLanguage = ref(locale.value);

const languages = ref([
    { 
        label: "FR", 
        value: "fr" 
    },
    { 
        label: "MG", 
        value: "mg" 
    }
]);

watchEffect(() => {
    selectedLanguage.value = locale.value;
});

const changeLanguage = () => {
    locale.value = selectedLanguage.value;
};
</script>