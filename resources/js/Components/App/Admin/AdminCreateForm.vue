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

    <div>
      <form @submit.prevent="submit">
        <!-- fields -->
        <div class="space-y-6">
          <template
            v-for="field in fields"
            :key="field.label"
          >
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
          </template>
        </div>
        <!-- fields -->

        <!-- buttons -->
        <!-- buttons -->
      </form>
    </div>
  </div>
</template>

<script setup>
// imports
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

// props
const props = defineProps({
  fields: { type: Array, default: () => [] },
  submitUrl: { type: String, required: true },
});

// debug
const debug = ref(true);

// form fields
let formFields = {};
props.fields.forEach((field) => {
  formFields[field.parameter] = null;
});

// form
const form = useForm(formFields);
</script>
