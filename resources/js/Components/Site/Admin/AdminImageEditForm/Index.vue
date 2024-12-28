<template>
  <div class="mx-auto">
    <swiper-container
      slides-per-view="2"
      navigation="true"
      pagination="true"
    >
      <template
        v-for="image in images"
        :key="image.id"
      >
        <swiper-slide class="px-4">
          <div class="relative">
            <img
              :src="image.path"
              class="object-cover object-center w-full h-full"
            />

            <!-- delete button -->
            <div
              @click="deleteButtonClicked(image.id)"
              class="absolute p-2 bg-red-100 cursor-pointer top-4 right-4"
            >
              <TrashIcon class="text-red-600 size-6" />
            </div>
            <!-- delete button -->
          </div>
        </swiper-slide>
      </template>
    </swiper-container>
  </div>
</template>

<script setup>
import { register } from 'swiper/element/bundle';
import { TrashIcon } from '@heroicons/vue/24/outline';

// props
const props = defineProps({
  images: { type: Array, default: [] },
});

// register swiper
register();

// delete button clicked
const deleteButtonClicked = (id) => {
  console.log('Delete button clicked for image id:', id);
};
</script>

<style scoped>
.swiper-button-next,
.swiper-button-prev {
  cursor: no;
  color: red !important;
}
</style>
