<template>
  <div>
    <!-- heading -->
    <AdminPageHeading
      :preHeading="preHeading"
      :heading="heading"
    />
    <!-- heading -->

    <!-- form -->
    <div class="max-w-4xl">
      <AdminEditForm
        :fields="fields"
        :submitUrl="submitUrl"
        @success="success"
        @error="error"
      />
    </div>
    <!-- form -->
  </div>
</template>

<script setup>
// imports
import AdminEditForm from '@/Components/App/Admin/AdminEditForm.vue';

// props
const props = defineProps({
  preHeading: { type: String, required: true },
  heading: { type: String, required: true },
  fields: { type: Array, default: () => [] },
  submitUrl: { type: String, required: true },
});

// emits
const emits = defineEmits(['success', 'error']);

// success
const success = () => {
  emits('success');
};

// failure
const error = () => {
  emits('error');
};
</script>
