<template>
  <div
    class="relative h-full pb-12 overflow-hidden bg-white border rounded-md shadow-md"
  >
    <!-- image -->
    <InertiaLink :href="productShowLink">
      <div class="h-48 bg-gray-100">
        <img
          v-if="product.images.length"
          :src="product.images[0].path"
          alt=""
          class="object-cover object-center w-full h-full"
        />
      </div>
    </InertiaLink>
    <!-- image -->

    <!-- contents -->
    <div class="p-5 bg-white rounded-b-md">
      <!-- name and price -->
      <div class="flex items-start justify-between space-x-4">
        <BodyText class="font-semibold line-clamp-2">
          {{ product.name }}
        </BodyText>

        <BodyText class="font-semibold line-clamp-2">
          {{ price }}
        </BodyText>
      </div>
      <!-- name and price -->

      <!-- description -->
      <Medium class="mt-2 line-clamp-3">
        {{ product.description }}
      </Medium>
      <!-- description -->
    </div>
    <!-- contents -->

    <!-- buttons -->
    <div class="absolute bottom-0 left-0 right-0 p-4">
      <InertiaLink :href="productShowLink">
        <AppButton small>Details</AppButton>
      </InertiaLink>
    </div>
    <!-- buttons -->
  </div>
</template>

<script setup>
// imports
import { computed } from 'vue';

// props
const props = defineProps({
  product: { type: Object, required: true },
});

// details link
const productShowLink = computed(() => {
  return route('products.show', { product: props.product.slug });
});

const price = computed(() => {
  // pound sign
  if (!props.product.product_skus.length) return 'NA';
  return `£${props.product.product_skus[0].price}`;
});
</script>
