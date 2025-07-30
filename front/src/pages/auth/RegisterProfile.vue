<template>
    <form 
        class="px-8 lg:px-24"
        @submit.prevent="submit"
    >
        <h1 class="text-2xl font-semibold text-center text-primary">
            {{ t('registerTitle') }}
        </h1>
        <p class="mt-3 text-center">
            {{ t('enterProfileInfo') }}
        </p>

        <section 
            class="mt-8 space-y-8"
        >
            <FloatLabel
                variant="on"
            >
                <InputText
                    id="lastname" 
                    v-model="formData.lastname"
                    class="focus-within:!border-secondary"
                />
                <label 
                    for="lastname"
                    class="in-focus-within:!text-secondary"
                >
                    {{ t('lastname') }}
                </label>
            </FloatLabel>

            <FloatLabel
                variant="on"
            >
                <InputText
                    id="firstname" 
                    v-model="formData.firstname"
                    class="focus-within:!border-secondary"
                />
                <label 
                    for="firstname"
                    class="in-focus-within:!text-secondary"
                >
                    {{ t('firstname') }}
                </label>
            </FloatLabel>

            <FloatLabel
                variant="on"
            >
                <DatePicker
                    id="birthDate" 
                    v-model="formData.birth_date"
                    dateFormat="yy-mm-dd"
                    class="focus-within:!border-secondary !w-full"
                    showIcon 
                    iconDisplay="input"
                    :pt="{
                        pcInputText: 'in-focus-within:!border-secondary',
                        tableBodyRow: '!text-sm'
                    }"
                />
                <label 
                    for="birthDate"
                    class="in-focus-within:!text-secondary"
                >
                    {{ t('birthDate') }}
                </label>
            </FloatLabel>

            <div>
                <label 
                    for="gender"
                    class="in-focus-within:!text-secondary"
                >
                    {{ t('gender') }}
                </label>
                
                <div class="mt-4 flex gap-6 items-center">
                    <div class="flex items-center gap-2">
                        <RadioButton 
                            v-model="gender" 
                            inputId="male" 
                            name="male" 
                            value="male"
                            :pt="{
                                box: '!text-secondary !border-secondary !ring-secondary',
                            }" 
                        />
                        <label for="male">
                            {{ t('male') }}
                        </label>
                    </div>

                    <div class="flex items-center gap-2">
                        <RadioButton 
                            v-model="gender" 
                            inputId="female" 
                            name="female" 
                            value="female" 
                            :pt="{
                                box: '!text-secondary !border-secondary !ring-secondary',
                            }" 
                        />
                        <label for="female">
                            {{ t('female') }}
                        </label>
                    </div>
                </div>
            </div>
        </section>

        <Button 
            :label="t('finish')"
            :loading="loading"
            type="submit"
            class="!mt-10 !mb-6 sm:!mb-0 !bg-secondary !w-full"
        />
    </form>
</template>

<script lang="ts" setup>
import { ref, reactive, watchEffect } from 'vue';
import { useI18n } from 'vue-i18n';
import { usePrimeVue } from 'primevue/config';

import InputText from 'primevue/inputtext';
import FloatLabel from 'primevue/floatlabel';
import DatePicker from 'primevue/datepicker';
import RadioButton from 'primevue/radiobutton';
import Button from 'primevue/button';
import { primevueLocales } from '../../locale/primevue';
import { useToast } from "primevue/usetoast";
import { formatDateToYMD } from '../../lib/utils/function';

import { useAuth } from '../../composables/useAuth';

const { t, locale } = useI18n();
const PrimeVue = usePrimeVue();
const toast = useToast();
const { storeInfoDetail, loading, error } = useAuth();

const gender = ref('male');

const formData = reactive({
    lastname: '',
    firstname: '',
    birth_date: null,
    is_male: true,
    lang: locale.value,
});

watchEffect(() => {
    PrimeVue.config.locale = primevueLocales[locale.value] || primevueLocales['fr'];
});

const submit = async () => {
    if ( gender.value == 'female' ) {
        formData.is_male = false;
    }

    formData.birth_date = formatDateToYMD(formData.birth_date);
    formData.lang = locale.value;

    try {
        const response = await storeInfoDetail(formData);
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