<template>
  <label
    :for="id"
    class="block text-sm font-semibold leading-6 text-gray-900 select-none"
  >
    {{ label }}
  </label>
</template>

<script setup>
// props
const props = defineProps({
  label: { type: String, required: true },
  id: { type: String, required: true },
});
</script>
