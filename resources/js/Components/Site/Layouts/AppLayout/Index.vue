<template>
  <div class="flex flex-col min-h-screen">
    <div class="flex-1">
      <Navigation />
      <slot />
    </div>
    <Footer />
  </div>
</template>

<script setup>
// imports
import Navigation from './Partials/Navigation.vue';
import Footer from './Partials/Footer.vue';
</script>
