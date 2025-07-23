<template>
    <div>
        <h2 class="text-2xl text-center font-bold text-secondary">
            Pourquoi choisir Falafa ?
        </h2>
        <p class="mt-2 text-center">
            Un guichet unique pour tous vos besoins immobiliers
        </p>    

        <section class="mt-12 grid lg:grid-cols-2 gap-16">
            <img 
                :src="imgChoose" 
                alt="Choice image of house"
                class="order-2 lg:order-1"
            >

            <div class="order-1 lg:order-2 grid md:grid-cols-2 lg:grid-cols-1 space-y-8">
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
import imgChoose from '../../assets/images/img-choose.png';

const reasons = [
    {
        id: 1,
        icon: 'pi pi-search',
        title: 'Recherche simplifiée',
        text: 'Trouvez rapidement la propriété qui vous correspond grâce à nos filtres avancés (type, région, prix, superficie…)',
    },
    {
        id: 2,
        icon: 'pi pi-megaphone',
        title: 'Annonces vérifiées',
        text: 'Toutes les annonces sont validées pour garantir leur authenticité',
    },
    {
        id: 3,
        icon: 'pi pi-phone',
        title: 'Contact direct',
        text: 'Échangez directement avec les propriétaires ou agences',
    },
    {
        id: 4,
        icon: 'pi pi-barcode',
        title: 'Référencement national',
        text: 'Des annonces couvrant toutes les régions de Madagascar',
    }
];
</script>