<template>
  <div>
    <Hero />
    <ProductCategoryBar :productCategories="productCategories" />
  </div>
</template>

<script setup>
// imports
import Hero from './Partials/Hero.vue';
import ProductCategoryBar from './Partials/ProductCategoryBar.vue';

// props
const props = defineProps({
  productCategories: { type: Array, required: true },
});
</script>
