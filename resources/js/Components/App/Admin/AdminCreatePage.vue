<template>
  <div>
    <!-- heading -->
    <AdminPageHeading
      preHeading="Creating"
      :heading="heading"
    />
    <!-- heading -->

    <!-- form -->
    <div class="max-w-4xl">
      <AdminCreateForm
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
// props
const props = defineProps({
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
