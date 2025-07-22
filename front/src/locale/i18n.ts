import { createI18n } from 'vue-i18n';

const messages = {
    fr: {
        home: "ACCUEIL",
        discover: "EXPLORER",
        services: "SERVICES",
        contact: 'CONTACT',
        login: 'Se connecter',
        register: 'S\'inscrire',
        menu: 'MENU',
    },

    mg: {
        home: "TONGASOA",
        discover: "HIKAROKA",
        services: "TOLOTRA",
        contact: 'FIFANDRAISANA',
        login: 'Hiditra',
        register: 'Hisoratra',
        menu: 'TAKELAKA',
    },
};

const i18n = createI18n({
    legacy: false,
    locale: 'fr', 
    fallbackLocale: 'mg',
    messages
});

export default i18n;