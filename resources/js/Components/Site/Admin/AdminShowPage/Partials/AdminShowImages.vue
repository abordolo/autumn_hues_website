<template>
  <div>
    <!-- heading with edit button -->
    <div class="flex items-center space-x-4">
      <Heading5 class="text-gray-500">Images</Heading5>
      <!-- add button -->
      <div
        class="p-2 transition-colors bg-gray-200 cursor-pointer hover:text-primary-500"
        @click="isVisibleAddImageForm = true"
      >
        <PlusIcon class="size-5" />
      </div>
      <!-- add button -->
    </div>
    <!-- heading with edit button -->

    <!-- images section -->
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
          <!-- single image -->
          <div class="relative h-48 bg-gray-100">
            <img
              :src="image.path"
              class="object-cover object-center w-full h-full"
            />
            <div class="absolute inset-0"></div>

            <!-- delete button -->
            <div
              v-if="deleteImageRoute"
              @click="clickedDeleteImage(image)"
              class="absolute p-2 bg-red-100 cursor-pointer top-2 right-2"
            >
              <TrashIcon class="text-red-600 size-5" />
            </div>
            <!-- delete button -->
          </div>
          <!-- single image -->
        </template>
      </div>
      <!-- images -->

      <!-- delete confirmation message -->
      <FadeTransition>
        <div
          v-if="isVisibleDeleteConfirmation"
          class="flex items-center justify-between max-w-4xl mt-4 bg-red-100"
        >
          <!-- texts and buttons -->
          <div class="p-6">
            <!-- texts -->
            <div>
              <Heading6>Confirm Deletion</Heading6>
              <BodyText> Are you sure to delete the image? </BodyText>
            </div>
            <!-- texts -->

            <!-- buttons -->
            <div class="flex items-center mt-4 space-x-4">
              <!-- confirm button -->
              <AppButton @click="clickedDeleteImageConfirm">Confirm</AppButton>
              <!-- confirm button -->

              <!-- cancel button -->
              <AppButton
                secondary
                @click="clickedDeleteImageCancel"
              >
                Cancel
              </AppButton>
              <!-- cancel button -->
            </div>
            <!-- buttons -->
          </div>
          <!-- texts and buttons -->

          <!-- image preview -->
          <div
            v-if="imageToDelete"
            class="w-48"
          >
            <img
              :src="imageToDelete.path"
              class="object-cover object-center w-full h-full"
            />
          </div>
          <!-- image preview -->
        </div>
      </FadeTransition>
      <!-- delete confirmation message -->
    </div>
    <!-- images section -->

    <!-- add image form -->
    <FadeTransition>
      <div
        v-if="isVisibleAddImageForm"
        class="mt-8"
      >
        <Heading6 class="mb-4"> Add Image </Heading6>

        <!-- form -->
        <div class="max-w-4xl">
          <AdminAddImageForm
            :addImageRoute="addImageRoute"
            @cancel="isVisibleAddImageForm = false"
          />
        </div>
        <!-- form -->
      </div>
    </FadeTransition>
    <!-- add image form -->
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';
import AdminAddImageForm from '@/Components/Site/Admin/AdminAddImageForm/Index.vue';
import { TrashIcon, PlusIcon } from '@heroicons/vue/24/outline';
import { router } from '@inertiajs/vue3';
import {
  showSuccessNotification,
  showWarningNotification,
} from '@/Helpers/NotificationHelpers';

// props
const props = defineProps({
  images: { type: Array, default: [] },
  deleteImageRoute: { type: String, required: false },
  addImageRoute: { type: String, required: false },
});

// show form
const isVisibleAddImageForm = ref(true);

// show delete confirmation
const isVisibleDeleteConfirmation = ref(false);

// image to be deleted
let imageToDelete = ref(null);

// delete button on each image
const clickedDeleteImage = (image) => {
  if (imageToDelete.value) {
    imageToDelete.value = null;
    isVisibleDeleteConfirmation.value = false;

    setTimeout(() => {
      imageToDelete.value = image;
      isVisibleDeleteConfirmation.value = true;
    }, 300);
  } else {
    imageToDelete.value = image;
    isVisibleDeleteConfirmation.value = true;
  }
};

// cancel button on delete confirmation
const clickedDeleteImageCancel = () => {
  imageToDelete.value = null;
  isVisibleDeleteConfirmation.value = false;
};

// confirm button on delete confirmation
const clickedDeleteImageConfirm = () => {
  if (!imageToDelete.value) return;
  if (!props.deleteImageRoute) return;

  // options
  const options = {
    data: {
      image_id: imageToDelete.value.id,
    },

    preserveScroll: true,

    onSuccess: () => {
      isVisibleDeleteConfirmation.value = false;
      imageToDelete.value = null;
      showSuccessNotification('Image deleted successfully.');
    },

    onError: () => {
      isVisibleDeleteConfirmation.value = false;
      imageToDelete.value = null;
      showWarningNotification('There was an error while deleting the image.');
    },
  };

  router.delete(props.deleteImageRoute, options);
};

// add image form submission
const submitAddImageForm = (event) => {
  console.log('Add image form submitted');
};
</script>
