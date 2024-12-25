<template>
  <div>
    <DebugGrid v-if="debug">
      <DebugPanel
        title="Form"
        :data="form"
      />
    </DebugGrid>
    <form @submit.prevent="submit">
      <!-- fields -->
      <div class="space-y-6">
        <template
          v-for="field in fields"
          :key="field.id"
        >
          <!-- single field -->
          <FormInput
            v-if="field.type === 'text' || field.type === 'textarea'"
            v-model="form[field.parameter]"
            :label="field.label"
            :textarea="field.type === 'textarea'"
            :error="form.errors[field.parameter]"
          />
          <!-- single field -->
        </template>
      </div>
      <!-- fields -->

      <!-- buttons -->
      <div class="flex items-center mt-8 space-x-4">
        <!-- primary button -->
        <AppButton
          type="submit"
          :loading="form.processing"
        >
          {{ primaryButtonText }}
        </AppButton>
        <!-- primary button -->

        <!-- secondary button -->
        <AppButton
          v-if="secondaryButtonText"
          type="button"
          secondary
          :disabled="form.processing"
          @click="emits('secondaryButtonClicked')"
        >
          {{ secondaryButtonText }}
        </AppButton>
        <!-- secondary button -->
      </div>
      <!-- buttons -->
    </form>
  </div>
</template>

<script setup>
// imports
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

// props
const props = defineProps({
  // each object of fields should contain the following parameters
  // label, type, parameter, value, placeholder
  fields: { type: Array, required: true },
  primaryButtonText: { type: String, required: true },
  secondaryButtonText: { type: String, required: false },
  submitUrl: { type: String, required: true },
  submissionMethod: { type: String, required: true },
});

// debug
const debug = ref(true);

// emits
const emits = defineEmits(['success', 'error', 'secondaryButtonClicked']);

// form parameters
let formParameters = {};
props.fields.forEach((field) => {
  formParameters[field.parameter] = field.value;
});

// form
const form = useForm(formParameters);

// methods
const submit = () => {
  console.log('Submitting to url:', props.submitUrl);

  const options = {
    preserveScroll: true,
    onSuccess: () => {
      emits('success');
    },
    onError: () => {
      emits('error');
    },
  };

  form.submit(props.submissionMethod, props.submitUrl);
};
</script>
