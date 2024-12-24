<template>
  <div>Edit {{ productSku }}</div>
</template>

<script setup>
// props
const props = defineProps({
  productSku: { type: Object, required: true },
});
</script>
