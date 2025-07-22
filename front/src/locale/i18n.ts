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
        introTitle: 'Trouvez la propriété idéale en un clic !',
        introFirstP: 'Facilitez votre recherche de terrain, maison ou appartement grâce à',
        introSecondP: 'la plateforme de location et de vente immobilière partout à Madagascar',
        property: 'Propriété',
        city: 'Ville',
        price: 'Prix',
        select: 'Sélectionner',
        entry: 'Entrer',
    },

    mg: {
        home: "TONGASOA",
        discover: "HIKAROKA",
        services: "TOLOTRA",
        contact: 'FIFANDRAISANA',
        login: 'Hiditra',
        register: 'Hisoratra',
        menu: 'TAKELAKA',
        introTitle: 'Tsindry iray dia vita ny fitadiavana fananana !',
        introFirstP: 'Amorao ny fitadiavana tany na trano amin\'ny alalan\'ny',
        introSecondP: 'sehatra fanofana sy varotra trano manerana eto Madagasikara',
        property: 'Fananana',
        city: 'Tanàn-dehibe',
        price: 'Vidy',
        select: 'Safidio',
        entry: 'Ampidiro',
    },
};

const i18n = createI18n({
    legacy: false,
    locale: 'fr', 
    fallbackLocale: 'mg',
    messages
});

export default i18n;