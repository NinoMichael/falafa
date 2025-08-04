<template>
    <header class="flex justify-between items-center bg-white px-8">
        <Logo class="w-28" />

        <Menubar 
            :model="items"
            class="!bg-transparent !hidden lg:!block !border-none !font-varela !text-sm"
        />
        
        <div class="flex gap-6 items-center">
            <Button
                as="a" 
                :label="user ? t('account') : t('login')"
                class="!bg-primary hover:!bg-primary/90 !hidden sm:!block"
                href='/auth/login'
            />
            <Button
                v-if="!user"
                as="a"  
                :label="t('register')"
                class="!bg-secondary hover:!bg-secondary/90 !hidden sm:!block"
                href='/auth/register-email'
            />

            <SelectLang />

            <i 
                title="Menu de navigation" 
                class="pi pi-bars hover:text-primary cursor-pointer lg:!hidden"
                @click="visible = true"
            />

            <Drawer 
                v-model:visible="visible" 
                :header="t('menu')"
                position="right"
                class=" !bg-tertiary !flex !flex-col !justify-between !h-screen"
                :pt="{
                    header: '!text-secondary',
                    content: '!px-1'
                }"
            >
                <Menu 
                    :model="items" 
                    class="!bg-transparent !border-none !font-varela !px-0 !text-sm"
                    :pt="{
                        list: '!mt-4 !space-y-4',
                    }"
                />

                <div class="flex flex-col gap-4 mt-48 px-4">
                    <Button
                        as="a" 
                        :label="t('login')"
                        class="!bg-primary"
                        href='/auth/login'
                    />
                    <Button
                        as="a"  
                        :label="t('register')"
                        class="!bg-secondary"
                        ref='/auth/register-email'
                    />
                </div>
            </Drawer>
        </div>
    </header>
</template>

<script lang="ts" setup>
import { ref, computed } from 'vue';
import { useRouter } from 'vue-router';
import { useI18n } from 'vue-i18n';

import Menubar from 'primevue/menubar';
import Menu from 'primevue/menu';
import Button from 'primevue/button';
import Drawer from 'primevue/drawer';
import Logo from './Logo.vue';
import SelectLang from "./SelectLang.vue";

import { useAuth } from '../../composables/useAuth';

const { t } = useI18n();
const router = useRouter();
const { getUser } = useAuth();

const user = getUser();
const visible = ref(false);
const items = computed(() => [
    {
        label: t('home'),
        command: () => {
            router.push('/');
        },
    },
    {
        label: t('discover'),
        command: () => {
            router.push('/discover');
        },
    },
    {
        label: t('services')
    },
    {
        label: t('contact')
    },
]);
</script>