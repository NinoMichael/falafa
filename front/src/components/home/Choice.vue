<template>
    <div>
        <h2 class="text-2xl text-center font-bold text-secondary">
            {{ t('whyChoose') }}
        </h2>
        <p class="mt-2 text-center">
            {{ t('uniqueWay') }}
        </p>    

        <section class="mt-12 grid lg:grid-cols-2 gap-16">
            <img 
                :src="imgChoose" 
                alt="Choice image of house"
                class="order-2 lg:order-1"
            >

            <div class="order-1 lg:order-2 grid md:grid-cols-2 lg:grid-cols-1 gap-8">
                <div
                    v-for="reason in reasons"
                    :key="reason.id"
                    class="flex space-x-6 items-center"
                >
                    <i 
                        class="!text-3xl opacity-70"
                        :class="reason.icon" 
                    />
                    <div class="flex flex-col">
                        <h4 class="font-semibold text-lg text-primary">
                            {{ reason.title }}
                        </h4>
                        <p>
                            {{ reason.text }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script lang="ts" setup>
import { computed } from 'vue';
import { useI18n } from 'vue-i18n';

import imgChoose from '../../assets/images/img-choose.png';

const { t } = useI18n();

const reasons = computed(() => [
    {
        id: 1,
        icon: 'pi pi-search',
        title: t('simplifiedSearch'),
        text: t('searchRapidly'),
    },
    {
        id: 2,
        icon: 'pi pi-megaphone',
        title: t('verifiedAnnonce'),
        text: t('verifiedAnnonce'),
    },
    {
        id: 3,
        icon: 'pi pi-phone',
        title: t('directContact'),
        text: t('exchangeDirectly'),
    },
    {
        id: 4,
        icon: 'pi pi-barcode',
        title: t('seoNational'),
        text: t('coverAnnonce'),
    }
]);
</script>