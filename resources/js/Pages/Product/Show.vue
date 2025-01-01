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
          <div>
            <ProductImageCarousel
              :images="selectedProductSku.images"
              :key="selectedProductSku.id"
            />
          </div>
          <!-- carousel -->

          <!-- contents -->
          <div>
            <!-- product details -->
            <div>
              <Heading5>{{ product.name }}</Heading5>
              <ExtraSmall class="font-medium">
                {{ selectedProductSku?.description }}
              </ExtraSmall>
              <Medium class="mt-2">{{ product.description }}</Medium>

              <Small class="mt-6 font-semibold text-gray-500">Price</Small>
              <Heading5> £{{ selectedProductSku.price }} </Heading5>
            </div>
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
                        :disabled="
                          shouldVariationTileBeDisabled(
                            variationType,
                            variation
                          )
                        "
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

            <!-- buttons -->
            <div class="mt-12">
              <div class="flex items-center space-x-4">
                <AppButton>Add to Cart</AppButton>
                <AppButton secondary>Customize</AppButton>
              </div>
            </div>
            <!-- buttons -->

            <!-- send inquiry button -->
            <button class="flex items-center mt-4 space-x-1 group">
              <InformationCircleIcon
                class="transition-colors duration-200 size-4 group-hover:text-primary-500 shrink-0"
              />
              <ExtraSmall
                class="mt-px font-medium transition-colors duration-200 group-hover:text-primary-500 shrink-0 group-hover:underline"
              >
                Send inquiry about this product
              </ExtraSmall>
            </button>
            <!-- send inquiry button -->
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
import { InformationCircleIcon } from '@heroicons/vue/24/outline';

// props
const props = defineProps({
  product: { type: Object, required: true },
  productSkus: { type: Array, required: true },
  variationTypes: { type: Array, required: true },
  variationCombinations: { type: Array, required: true },
});

// debug
const debug = ref(false);

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
    'transition-colors',
    'duration-200',
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

  for (let i = 0; i < props.productSkus.length; i++) {
    const productSku = props.productSkus[i];
    let isMatched = true;

    for (let j = 0; j < props.variationTypes.length; j++) {
      // iterator variation type
      const iteratorVariationType = props.variationTypes[j];

      const variationTypeName = iteratorVariationType.name;
      const selectedVariationName = selectedVariation.value[variationTypeName];
      const currentProductSkuVariationName = productSku[variationTypeName];

      if (currentProductSkuVariationName !== selectedVariationName) {
        isMatched = false;
        break;
      }
    }

    if (isMatched) {
      selectedProductSku.value = productSku;
      break;
    }
  }
};

// are equal objects
const areEqualObjects = (object1, object2) => {
  if (object1 == null || object2 == null) {
    return false;
  }

  const object1Keys = Object.keys(object1);
  const object2Keys = Object.keys(object2);

  if (object1Keys.length !== object2Keys.length) {
    return false;
  }

  for (let i = 0; i < object1Keys.length; i++) {
    const key = object1Keys[i];
    const value1 = object1[key];
    const value2 = object2[key];

    if (value1 !== value2) {
      return false;
    }
  }

  return true;
};

// should tile be disabled
const shouldVariationTileBeDisabled = (variationType, variation) => {
  let selectedVariationClone = { ...selectedVariation.value };
  selectedVariationClone[variationType.name] = variation.name;

  for (let i = 0; i < props.variationCombinations.length; i++) {
    const variationCombination = props.variationCombinations[i];

    if (areEqualObjects(selectedVariationClone, variationCombination)) {
      return false;
    }
  }

  return true;
};
</script>
