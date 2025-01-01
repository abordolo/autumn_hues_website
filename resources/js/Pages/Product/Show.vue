<template>
  <div>
    <DebugGrid v-if="debug">
      <DebugPanel
        v-for="parameter in Object.keys(props)"
        :title="parameter"
        :data="props[parameter]"
      />
      <DebugPanel
        title="selectedVariation"
        :data="selectedVariation"
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
        <div class="grid grid-cols-2 gap-8">
          <!-- carousel -->
          <ProductImageCarousel />
          <!-- carousel -->

          <!-- contents -->
          <div>
            <!-- product details -->
            <Heading5>{{ product.name }}</Heading5>
            <ExtraSmall class="font-medium">
              {{ selectedProductSku?.description }}
            </ExtraSmall>
            <Medium class="mt-2">{{ product.description }}</Medium>
            <!-- product details -->

            <!-- variation types -->
            <div class="mt-6 space-y-5">
              <template
                v-for="variationType in variationTypes"
                :key="variationType.id"
              >
                <!-- single variation type -->
                <div>
                  <Small class="font-semibold text-gray-500">
                    {{ variationType.name }}
                  </Small>

                  <!-- variations -->
                  <div class="flex flex-wrap gap-3 mt-1">
                    <template v-for="variation in variationType.variations">
                      <!-- single tile -->
                      <button
                        :class="variationTileClasses(variationType, variation)"
                        @click="clickedVariationTile(variationType, variation)"
                      >
                        <ExtraSmall class="font-medium">
                          {{ variation.name }}
                        </ExtraSmall>
                      </button>
                      <!-- single tile -->
                    </template>
                  </div>
                  <!-- variations -->
                </div>
                <!-- single variation type -->
              </template>
            </div>
            <!-- variation types -->
          </div>
          <!-- contents -->
        </div>
      </Container>
    </Section>
    <!-- contents -->
  </div>
</template>

<script setup>
// imports
import { ref, computed } from 'vue';
import ProductImageCarousel from './Partials/ProductImageCarousel.vue';
import ExtraSmall from '@/Components/Site/Texts/ExtraSmall.vue';

// props
const props = defineProps({
  product: { type: Object, required: true },
  productSkus: { type: Array, required: true },
  variationTypes: { type: Array, required: true },
  variationCombinations: { type: Array, required: true },
});

// debug
const debug = ref(true);

// selected product sku
const selectedProductSku = ref(props.productSkus[0]);

// selected variation
const selectedVariation = ref({});
props.variationTypes.forEach((variationType) => {
  const variationTypeName = variationType.name;
  selectedVariation.value[variationTypeName] =
    selectedProductSku.value[variationTypeName];
});

// variation tile color classes
const variationTileClasses = (variationType, variation) => {
  const variationTypeName = variationType.name;
  const variationName = variation.name;

  let baseClasses = [
    'flex',
    'items-center',
    'justify-center',
    'p-4',
    'border',
    'rounded',
    'min-w-[80px]',
    'disabled:bg-gray-100',
    'disabled:cursor-not-allowed',
  ];

  if (selectedVariation.value[variationTypeName] === variationName) {
    baseClasses.push('bg-primary-500', 'text-white');
  } else {
    baseClasses.push('bg-white');
  }

  return baseClasses;
};

// clicked variation tile
const clickedVariationTile = (variationType, variation) => {
  const variationTypeName = variationType.name;
  const variationName = variation.name;

  selectedVariation.value[variationTypeName] = variationName;
};
</script>
