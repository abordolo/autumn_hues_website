<template>
  <InertiaLink
    :href="href"
    class="inline-block px-8 py-4 border rounded bg-primary-500 border-primary-600 hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-opacity-50 min-w-[180px] text-center"
  >
    <Small class="font-semibold text-white">
      <slot />
    </Small>
  </InertiaLink>
</template>

<script setup>
// props
const props = defineProps({
  href: { type: String, required: true },
});
</script>
