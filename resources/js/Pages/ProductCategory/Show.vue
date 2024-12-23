<template>
  <div>
    <DebugGrid v-if="debug">
      <DebugPanel
        title="Product Category"
        :data="props"
      />
    </DebugGrid>

    <PageHeading
      :icon="productCategory.icon"
      :title="productCategory.name"
      :intro="productCategory.description"
      :background="productCategory.header_image"
    />
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';

// props
const props = defineProps({
  productCategory: { type: Object, required: true },
});

// debug
const debug = ref(true);
</script>
