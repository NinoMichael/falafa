<template>
    <div class="-mx-8 -mb-24 -mt-6 md:border-l md:border-t md:border-b border-gray-300 grid md:grid-cols-[25%_75%] lg:grid-cols-[20%_80%] items-stretch">
        <form class="hidden md:block md:border-r border-gray-300 float-left p-4">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold">
                    Filtres
                </h3>
                <Button 
                    label="Tout effacer"
                    class="!bg-transparent !text-xs !text-secondary !font-semibold"
                />
            </div>

            <FilterEstateForm class="mt-4" />
        </form>

        <section class="mt-8 md:mt-4">
            <div class="flex justify-between items-center pl-4 sm:pr-5 sm:pl-10 md:pr-0 md:pl-0 md:px-0 md:justify-end">
                <Button
                    icon="pi pi-filter" 
                    label="Filtrer"
                    class="!text-xs !bg-secondary md:!hidden"
                    @click="filterDialog = true"
                />

                <Dialog
                    v-model:visible="filterDialog"
                    modal
                    header="Filtres"
                    class="!w-[90vw] h-[28rem]"
                >
                    <FilterEstateForm />
                </Dialog>

                <div class="flex sm:gap-4 md:mr-8">
                    <IconField>
                        <InputText 
                            placeholder="Rechercher"
                            class="!text-xs !w-36 sm:!w-full" 
                        />
                        <InputIcon 
                            title="Rechercher"
                            class="pi pi-search cursor-pointer" 
                        />
                    </IconField>
                    <Button 
                        icon="pi pi-sort-amount-up"
                        label="Trier par"
                        class="!text-xs !text-nowrap !bg-transparent !text-gray-500 !border !border-gray-300"
                        @click="toggleSort"
                    />

                    <Popover 
                        ref="sortPop"
                        class="w-52 text-xs"
                    >
                        <div class="flex flex-col space-y-4">
                            <div class="flex gap-2 items-center">
                                <i class="pi pi-sort-amount-up" />
                                <p>
                                    Ordre croissant
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <i class="pi pi-sort-amount-down" />
                                <p>
                                    Ordre décroissant
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <i class="pi pi-star-fill" />
                                <p>
                                    Les plus vues
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <i class="pi pi-dollar" />
                                <p>
                                    Les moins chers
                                </p>
                            </div>
                        </div>
                    </Popover>
                </div>
            </div>

            <div class="mt-2 p-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
                <CardEstate
                    v-for="estate in estates"
                    :key="estate.id"
                    :estate="estate"
                />
            </div>
        </section>
    </div>
</template>

<script lang="ts" setup>
import { ref, onMounted, reactive } from 'vue';
import { useI18n } from 'vue-i18n';
import type { CategoryLocation, TypeField, EstateStatus, AccountStatus } from '../lib/types';

import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import Popover from 'primevue/popover';
import Dialog from 'primevue/dialog';
import CardEstate from '../components/ui/CardEstate.vue';
import FilterEstateForm from '../components/ui/FilterEstateForm.vue';

import { useEstate } from '../composables/useEstate';

const { getAndFilterEstate, estates } = useEstate();

const { t, locale } = useI18n();
const sortPop = ref();
const filterDialog = ref(false);

const toggleSort = (event) => {
    sortPop.value.toggle(event);
}

const formData = reactive({
    lang: locale.value,
})

onMounted( async() => {
    formData.lang = locale.value;

    await getAndFilterEstate(formData);
});
</script>