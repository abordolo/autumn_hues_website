<template>
  <div>
    <DebugGrid v-if="debug">
      <DebugPanel
        title="Product SKU"
        :data="productSku"
      />
      <DebugPanel
        title="Heading"
        :data="heading"
      />
      <DebugPanel
        title="Sections"
        :data="sections"
      />
      <DebugPanel
        title="Update Route"
        :data="updateRoute"
      />
      <DebugPanel
        title="Page"
        :data="$page"
      />
      <DebugPanel
        title="Images"
        :data="images"
      />
    </DebugGrid>

    <AdminShowPage
      :data="productSku"
      :heading="heading"
      :sections="sections"
      :images="images"
      :updateRoute="updateRoute"
    />
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';

// props
const props = defineProps({
  productSku: { type: Object, required: true },
  heading: { type: String, required: true },
  sections: { type: Array, required: true },
  images: { type: Array, default: [] },
  updateRoute: { type: String, required: true },
});

// debug
const debug = ref(true);
</script>
