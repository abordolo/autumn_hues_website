<template>
  <div>
    <Heading5 class="text-gray-500">Images</Heading5>

    <div class="mt-5">
      <div v-if="!images.length">No image found.</div>

      <!-- images -->
      <div
        v-else
        class="grid grid-cols-8 gap-6"
      >
        <template
          v-for="image in images"
          :key="image.id"
        >
          <div class="h-32">
            <img
              :src="image.path"
              class="object-cover object-center w-full h-full"
            />
          </div>
        </template>
      </div>
      <!-- images -->
    </div>
  </div>
</template>

<script setup>
// props
const props = defineProps({
  images: { type: Array, default: [] },
});
</script>
