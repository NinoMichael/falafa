<template>
    <div class="flex gap-3 items-center">
        <i class="pi pi-globe text-black/60" />

        <Select 
            v-model="selectedLanguage"
            :options = "languages" 
            optionLabel = "label"
            optionValue = "value"
            @change = "changeLanguage"
            class="!border-none !shadow !font-poppins !text-sm !text-black/70"
            overlayClass="!text-sm !font-poppins"
            :pt="{
                label: '!text-black/60 !font-medium !text-sm',
                overlay: '!bg-transparent !text-black/70',
                option: '!bg-transparent hover:!bg-primary/10 !text-black/70 !w-full',
            }"
        />
    </div>
</template>

<script lang="ts" setup>
import { ref, watchEffect } from 'vue';
import { useI18n } from 'vue-i18n';

import Select from 'primevue/select';

const { locale } = useI18n();
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