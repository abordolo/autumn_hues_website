<template>
  <div>
    <DebugGrid>
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
      :columns="columns"
      heading="Product SKUs"
      editRoute="admin.product-skus.edit"
      detailsRoute="admin.product-skus.show"
    />
  </div>
</template>

<script setup>
// props
const props = defineProps({
  productSkus: { type: [Array, Object], required: true },
  columns: { type: Array, required: true },
  paginated: { type: Boolean, required: true },
});
</script>
