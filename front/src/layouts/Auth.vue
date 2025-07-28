<template>
    <div class="grid md:grid-cols-2 md:h-screen overflow-hidden">
        <section class="relative">
            <img 
                :src="house" 
                alt="Malagasy house"
                class="w-full h-52 md:h-screen object-cover"
            >

            <Logo 
                class="hidden sm:block w-28 absolute top-8 left-8"
                :white="true"
            />

            <div class="absolute left-8 right-8 text-center sm:left-0 sm:text-end sm:ml-auto sm:w-[65%] bottom-[20%] md:w-auto md:bottom-20 md:left-8 md:text-start text-white">
                <h3 class="text-2xl font-bold">
                    {{ t('introTitle') }}
                </h3>
                <p class="md:w-[90%]">
                    {{ t('introFirstP') }} <strong class="font-semibold text-xl">Falafa</strong>, {{ t('introSecondP') }}
                </p>
            </div>
        </section>

        <section class="p-4 sm:p-8">
            <div class="flex justify-between items-center">
                <i 
                    class="pi pi-arrow-left hover:text-secondary !cursor-pointer"
                    title="Revenir en arrière"
                    @click="goBack" 
                />

                <SelectLang />
            </div>

            <router-view class="mt-4"/>
        </section>
    </div>
</template>

<script lang="ts" setup>
import { useI18n } from 'vue-i18n';

import Logo from '../components/inc/Logo.vue';
import SelectLang from '../components/inc/SelectLang.vue';
import house from '../assets/images/house-login.png';

const { t } = useI18n();

const goBack = () => {
    window.history.back();
}
</script>