<template>
    <div>
        <h2 class="text-center text-2xl text-secondary font-bold">
            Nos partenaires
        </h2>
  
        <div class="overflow-hidden mt-16">
            <div
                ref="slider" 
                class="slider-track flex gap-12"
            >
                <a
                    v-for="partner in partners"
                    :key="partner.company"
                    :href="partner.url"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <img
                    :src="partner.img"
                    :alt="partner.company"
                    :title="partner.company"
                    class="w-32"
                    />
                </a>
            </div>
        </div>
    </div>
</template>
  
<script lang="ts" setup>
import { onMounted, ref } from 'vue'

import bestImmo from '../../assets/images/partners/best-immo.png'; 
import ofim from '../../assets/images/partners/ofim.png';  
import promoTana from '../../assets/images/partners/promo-tana.png';
import capImmo from '../../assets/images/partners/cap-immo.png';
import alohaImmo from '../../assets/images/partners/aloha-immo.png';
import kanelleImmo from '../../assets/images/partners/kanelle-immo.png';

const partners = [
    {
        company: 'BEST IMMOBILIER MADAGASCAR',
        img: bestImmo,
        url: 'https://www.bestimmostm.com/',
    },
    {
        company: 'Cap-May Immobilier Madagascar',
        img: capImmo,
        url: 'https://www.cap-may.net/',
    },
    {
        company: 'OFIM IMMOBILIER',
        img: ofim,
        url: 'https://www.ofim.mg/',
    },
    {
        company: 'Promo-Tana',
        img: promoTana,
        url: 'https://www.promotana.com/',
    },
    {
        company: 'Aloha Immo Services',
        img: alohaImmo,
        url: 'https://www.alohaimmoservices.com/',
    },
    {
        company: 'Kanelle Immobilier',
        img: kanelleImmo,
        url: 'https://www.facebook.com/kanelleimmo/',
    },
]
  
const slider = ref<HTMLDivElement | null>(null);
  
onMounted(() => {
    const el = slider.value
    if (el) {
        const trackWidth = el.scrollWidth;
        el.style.setProperty('--track-width', `${trackWidth}px`);
    }
});
</script>
  
<style scoped>
@keyframes scroll-x {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(calc(-1 * var(--track-width)));
    }
}

.slider-track {
    animation: scroll-x 60s linear infinite;
    width: max-content;
    will-change: transform;
}
</style>
  