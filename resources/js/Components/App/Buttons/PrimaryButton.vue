<template>
  <button
    @click="emit('clicked')"
    class="inline-block px-8 py-4 bg-primary-500 rounded min-w-[180px] border border-primary-600 hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-opacity-50"
  >
    <Small class="font-semibold text-white">
      <slot />
    </Small>
  </button>
</template>

<script setup>
// emit
const emit = defineEmits(['clicked']);
</script>
