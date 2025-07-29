import { defineStore } from 'pinia';

export const useRegistrationEmailStore = defineStore('registrationEmail', {
    state: () => ({
        email: '',
        password: '',
    }),
});
