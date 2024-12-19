<template>
  <div>
    <!-- debug -->
    <DebugGrid
      v-if="debug"
      :colsCount="2"
    >
      <DebugPanel
        title="Fields"
        :data="fields"
      />

      <DebugPanel
        title="Form"
        :data="form"
      />
    </DebugGrid>
    <!-- debug -->

    <!-- form -->
    <div>
      <form @submit.prevent="submit">
        <!-- fields -->
        <div class="space-y-6">
          <template
            v-for="field in fields"
            :key="field.label"
          >
            <!-- single field -->
            <div>
              <!-- text field -->
              <FormInput
                v-if="field.type === 'text' || field.type === 'textbox'"
                v-model="form[field.parameter]"
                :label="field.label"
                :textarea="field.type === 'textbox'"
                :required="field.required"
                :error="form.errors[field.parameter]"
              />
              <!-- text field -->

              <!-- select -->
              <FormSelect
                v-if="field.type == 'select'"
                v-model="form[field.parameter]"
                :label="field.label"
                :options="field.options"
                :error="form.errors[`${field.parameter}.value`]"
              />
              <!-- select -->

              <!-- boolean field -->
              <FormToggle
                v-model="form[field.parameter]"
                :label="field.label"
                v-if="field.type == 'boolean'"
                :error="form.errors[field.parameter]"
              />
              <!-- boolean field -->
            </div>
            <!-- single field -->
          </template>
        </div>
        <!-- fields -->

        <!-- buttons -->
        <div class="flex items-center mt-12 space-x-4">
          <AppButton type="submit">Submit</AppButton>
          <AppButton
            secondary
            type="button"
            @click="popRoute"
          >
            Go Back
          </AppButton>
        </div>
        <!-- buttons -->
      </form>
    </div>
    <!-- form -->
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { showWarningNotification } from '@/Helpers/NotificationHelpers';
import { popRoute } from '@/Helpers/NavigationHelpers';

// props
const props = defineProps({
  fields: { type: Array, default: () => [] },
  submitUrl: { type: String, required: true },
});

// debug
const debug = ref(true);

// emits
const emits = defineEmits(['success', 'error']);

// form fields
const formFields = {};
props.fields.forEach((field) => {
  let fieldValue = null;

  if (field.type == 'select') {
    fieldValue = field.selected;
  } else if (field.type === 'boolean') {
    fieldValue = field.value ? true : false;
  } else {
    fieldValue = field.value;
  }

  formFields[field.parameter] = fieldValue;
});

// form
const form = useForm(formFields);

// submit
const submit = () => {
  if (!form.isDirty) {
    showWarningNotification('There is no change to save.');
    return;
  }

  const options = {
    preserveScroll: true,
    onSuccess: () => {
      console.log('Edit successful in admin edit form.');
      emits('success');
    },
    onError: () => {
      console.log('Edit failed in admin edit form.');
      emits('error');
    },
  };

  form.put(props.submitUrl, options);
};
</script>
