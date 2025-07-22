<template>
    <img
        :src="imgSrc"
        :alt="alt"
        :class="imgClass"
    >
</template>
  
<script lang="ts" setup>
import { computed } from 'vue';

import falafa from '../../assets/images/falafa.png';
import falafaWhite from '../../assets/images/falafa-white.png';
  
const props = defineProps<{
    class?: string
    white?: boolean
    alt?: string
}>();
  
const imgSrc = computed(() => {
    return props.white
        ? falafaWhite
        : falafa
});
 
const imgClass = computed(() => props.class ?? '');
</script>
  