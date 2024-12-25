<template>
  <div>
    <DebugGrid>
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
    </DebugGrid>

    <AdminShowPage
      :data="productSku"
      :heading="heading"
      :sections="sections"
    />
  </div>
</template>

<script setup>
// props
const props = defineProps({
  productSku: { type: Object, required: true },
  heading: { type: String, required: true },
  sections: { type: Array, required: true },
});
</script>
