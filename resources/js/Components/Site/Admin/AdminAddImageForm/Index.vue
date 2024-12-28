<template>
  <div>
    <DebugPanel
      class="mb-4"
      title="form"
      :data="form"
    />

    <!-- preview -->
    <div
      v-if="imageObjUrl"
      class="mb-4 border size-24"
    >
      <img
        :src="imageObjUrl"
        class="object-cover object-center w-full h-full"
      />
    </div>
    <!-- preview -->

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
  </div>
</template>

<script setup>
// imports
import { useForm } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

// props
const props = defineProps({
  addImageRoute: { type: String, required: false },
});

// emits
const emits = defineEmits(['cancel']);

const form = useForm({
  image: null,
});

// clicked cancel
const clickedCancel = () => {
  emits('cancel');
};

// computed
const imageObjUrl = computed(() => {
  if (form.image) {
    return URL.createObjectURL(form.image);
  }

  return null;
});

// submit
const submit = () => {
  console.log('form submitted');
};
</script>
