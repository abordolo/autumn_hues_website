<template>
  <div class="grid grid-cols-2">
    <template
      v-for="image in images"
      :key="image.id"
    >
      <img
        :src="image.path"
        class="object-cover"
      />
    </template>
  </div>
</template>

<script setup>
// props
const props = defineProps({
  images: { type: Array, default: [] },
});
</script>
