<template>
  <div>
    <Hero />
    <ProductCategoryBar :productCategories="productCategories" />
    <AboutUsPreview />
  </div>
</template>

<script setup>
// imports
import Hero from './Partials/Hero.vue';
import ProductCategoryBar from './Partials/ProductCategoryBar.vue';
import AboutUsPreview from './Partials/AboutUsPreview.vue';

// props
const props = defineProps({
  productCategories: { type: Array, required: true },
});
</script>
