<template>
  <div
    class="absolute top-0 bottom-0 z-10 -left-4 -right-4 xl:left-0 xl:right-0"
  >
    <img
      :src="image"
      class="object-cover object-center w-full h-full"
    />
    <div class="absolute inset-0"></div>
  </div>
</template>

<script setup>
// props
const props = defineProps({
  image: { type: String, required: true },
});
</script>
