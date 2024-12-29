<template>
  <div>
    <DebugGrid v-if="debug">
      <DebugPanel
        title="Product"
        :data="product"
      />
    </DebugGrid>

    <!-- meta -->
    <InertiaHead>
      <title>{{ product.name }}</title>
    </InertiaHead>
    <!-- meta -->

    <!-- contents -->
    <Section class="py-16">
      <Container>
        <div class="flex items-start space-x-6">
          <div class="flex-1">
            <ProductImageCarousel />
          </div>
          <!-- images -->
          <Heading6>{{ product.name }}</Heading6>
          <!-- images -->
        </div>
      </Container>
    </Section>
    <!-- contents -->
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';
import ProductImageCarousel from './Partials/ProductImageCarousel.vue';

// props
const props = defineProps({
  product: { type: Object, required: true },
});

// debug
const debug = ref(true);
</script>
