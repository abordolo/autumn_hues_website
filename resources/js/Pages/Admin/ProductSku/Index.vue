<template>
  <div>
    <DebugGrid v-if="debug">
      <DebugPanel
        title="Product Skus"
        :data="productSkus"
      />
      <DebugPanel
        title="Columns"
        :data="columns"
      />
    </DebugGrid>

    <AdminIndexPage
      :data="paginated ? productSkus['data'] : productSkus"
      :links="paginated ? productSkus['links'] : null"
      :columns="columns"
      heading="Product SKUs"
      editRoute="admin.product-skus.edit"
      detailsRoute="admin.product-skus.show"
    />
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';

// props
const props = defineProps({
  productSkus: { type: [Array, Object], required: true },
  columns: { type: Array, required: true },
  paginated: { type: Boolean, required: true },
});

// debug
const debug = ref(false);
</script>
