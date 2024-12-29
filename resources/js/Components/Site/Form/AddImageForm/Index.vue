<template>
  <div>
    <DebugPanel
      v-if="debug"
      class="mb-4"
      title="form"
      :data="form"
    />

    <!-- image preview -->
    <div
      v-if="imageObjUrl"
      class="mb-4 border size-24"
    >
      <img
        :src="imageObjUrl"
        class="object-cover object-center w-full h-full"
      />
    </div>
    <!-- image preview -->

    <!-- add image form -->
    <form @submit.prevent="submit">
      <!-- fields -->
      <FormFileInput
        label="Select Image"
        id="image"
        v-model="form.image"
      />
      <!-- fields -->

      <!-- buttons -->
      <div class="flex items-center mt-6 space-x-4">
        <AppButton type="submit">Submit</AppButton>
        <AppButton
          @click="clickedCancel"
          secondary
          type="button"
        >
          Cancel
        </AppButton>
      </div>
      <!-- buttons -->
    </form>
    <!-- add image form -->
  </div>
</template>

<script setup>
// imports
import {
  showSuccessNotification,
  showWarningNotification,
} from '@/Helpers/NotificationHelpers';
import { useForm } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

// props
const props = defineProps({
  addImageRoute: { type: String, required: false },
});

// emits
const emits = defineEmits(['success', 'cancel', 'error']);

// debug
const debug = ref(false);

// form
const form = useForm({
  image: null,
  order: 1,
});

// clicked cancel
const clickedCancel = () => {
  emits('cancel');
};

// to display preview
const imageObjUrl = computed(() => {
  if (form.image) {
    return URL.createObjectURL(form.image);
  }

  return null;
});

// submit
const submit = () => {
  if (!form.image) {
    showWarningNotification('Please select an image');
    return;
  }

  // isVisibleForm.value = false;
  // return;

  const options = {
    preserveScroll: true,
    onSuccess: () => {
      form.reset();
      emits('success');
    },
    onError: () => {
      showWarningNotification('Failed to add image');
      emits('error');
    },
  };

  form.post(props.addImageRoute, options);
};
</script>
