<template>
  <div>
    <!-- heading with edit button -->
    <div class="flex items-center space-x-4">
      <!-- heading -->
      <Heading5 class="text-gray-500">Images</Heading5>
      <!-- heading -->

      <!-- add button -->
      <div
        class="p-2 transition-colors bg-gray-200 rounded cursor-pointer hover:text-primary-500"
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
          <div
            class="relative h-48 overflow-hidden bg-gray-100 border-gray-200 rounded-md shadow-md"
          >
            <img
              :src="image.path"
              class="object-cover object-center w-full h-full"
            />
            <div class="absolute inset-0"></div>

            <!-- delete button -->
            <div
              v-if="deleteImageRoute"
              @click="clickedDeleteImage(image)"
              class="absolute p-2 bg-red-100 rounded shadow-md cursor-pointer top-2 right-2"
            >
              <TrashIcon class="text-red-600 size-5" />
            </div>
            <!-- delete button -->
          </div>
          <!-- single image -->
        </template>
      </div>
      <!-- images -->
    </div>
    <!-- images section -->

    <!-- delete confirmation message -->
    <FadeTransition>
      <div
        v-if="isVisibleDeleteConfirmation"
        class="flex items-center justify-between max-w-4xl p-6 mt-6 bg-red-100 rounded-md shadow-md"
      >
        <!-- texts and buttons -->
        <div>
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

    <!-- add image form -->
    <FadeTransition>
      <div
        v-if="isVisibleAddImageForm"
        class="mt-8"
      >
        <Heading6 class="mb-4"> Add Image </Heading6>

        <!-- form -->
        <div class="max-w-4xl">
          <AddImageForm
            :addImageRoute="addImageRoute"
            @success="successAddImage"
            @cancel="cancelAddImage"
          />
        </div>
        <!-- form -->
      </div>
    </FadeTransition>
    <!-- add image form -->

    <!-- add more image section -->
    <FadeTransition>
      <div
        v-if="isVisibleAddMoreImages"
        class="mt-6"
      >
        <Heading6>Do you want to add more image?</Heading6>
        <div class="flex items-center mt-4 space-x-4">
          <AppButton @click="clickedAddMoreImages"> Add more image </AppButton>
          <AppButton
            secondary
            @click="clickedCancelAddMoreImages"
          >
            I am done
          </AppButton>
        </div>
      </div>
    </FadeTransition>
    <!-- add more image section -->
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';
import AddImageForm from '@/Components/Site/Form/AddImageForm/Index.vue';
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

// show add more images
const isVisibleAddMoreImages = ref(false);

// show delete confirmation
const isVisibleDeleteConfirmation = ref(false);

// image to be deleted
let imageToDelete = ref(null);

// delete button on each image
const clickedDeleteImage = (image) => {
  // hide other sections
  isVisibleAddImageForm.value = false;
  isVisibleAddMoreImages.value = false;

  if (imageToDelete.value) {
    imageToDelete.value = null;
    isVisibleDeleteConfirmation.value = false;

    // wait for delete confirmation to hide
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

// success add image
const successAddImage = () => {
  isVisibleAddImageForm.value = false;
  setTimeout(() => {
    isVisibleAddMoreImages.value = true;
  }, 300);
};

// cancel add image
const cancelAddImage = () => {
  isVisibleAddImageForm.value = false;
};

// clicked add more images
const clickedAddMoreImages = () => {
  isVisibleAddMoreImages.value = false;
  setTimeout(() => {
    isVisibleAddImageForm.value = true;
  }, 300);
};

// clicked cancel add more images
const clickedCancelAddMoreImages = () => {
  isVisibleAddMoreImages.value = false;
};
</script>
