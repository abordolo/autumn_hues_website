<template>
  <div>
    <!-- label and mandatory indicator -->
    <div class="flex items-center justify-between">
      <label
        v-if="label"
        :for="id"
        class="block mb-2 text-sm font-medium leading-6 text-gray-900"
      >
        {{ label }}
      </label>

      <div
        v-if="required"
        class="px-1 py-px text-xs border rounded bg-primary-100 border-primary-200"
      >
        Required
      </div>
    </div>
    <!-- label and mandatory indicator -->

    <!-- field -->
    <div>
      <div
        class="flex rounded-md shadow-sm shadow-primary-50 ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-primary-500"
      >
        <input
          v-if="!props.textarea"
          :value="props.modelValue"
          @input="
            $emit('update:modelValue', $event.target.value);
            $emit('textChanged');
          "
          :type="type"
          :name="computedName"
          :id="computedId"
          :autocomplete="autocomplete"
          class="block w-full px-3 py-2 text-gray-900 bg-transparent border-0 placeholder:text-gray-400 focus:ring-0 disabled:cursor-not-allowed disabled:bg-gray-100 disabled:text-gray-500"
          :placeholder="placeholder"
          :disabled="disabled"
        />

        <textarea
          v-else
          rows="4"
          :value="props.modelValue"
          @input="
            $emit('update:modelValue', $event.target.value);
            $emit('textChanged');
          "
          :type="type"
          :name="name"
          :id="id"
          :autocomplete="autocomplete"
          class="block w-full px-3 py-2 text-gray-900 bg-transparent border-0 placeholder:text-sm placeholder:text-gray-400 focus:ring-0 disabled:cursor-not-allowed disabled:bg-gray-100 disabled:text-gray-500"
          :placeholder="placeholder"
          :disabled="disabled"
        />
      </div>
    </div>
    <!-- field -->

    <!-- error -->
    <Transition
      appear
      enter-active-class="animate__animated animate__fadeIn animate__faster"
      leave-active-class="animate__animated animate__fadeOut animate__faster"
    >
      <div
        v-if="props.error"
        class="mt-2 text-sm text-red-600"
      >
        {{ props.error }}
      </div>
    </Transition>
    <!-- error -->
  </div>
</template>

<script setup>
// imports
import { computed, ref } from 'vue';

// props
const props = defineProps({
  modelValue: { required: true },
  type: {
    type: String,
    validator: (value) => ['text', 'email', 'tel', 'password'].includes(value),
    default: 'text',
  },
  label: { type: String, default: null },

  // if label is specified, id and name are optional
  // if label is not specified, either id or name must be specified
  id: {
    type: String,
    validator: (value, props) => {
      if (props.label != null) return true;
      if (props.id || props.name) return true;
      return false;
    },
  },

  // id or name must be specified if label is not specified
  name: {
    type: String,
    validator: (value, props) => {
      if (props.label != null) return true;
      if (props.id || props.name) return true;
      return false;
    },
  },

  autocomplete: { type: String, required: false, default: null },
  placeholder: { type: String, required: false, default: null },
  error: { type: String, required: false, default: null },
  textarea: { type: Boolean, default: false },
  disabled: { type: Boolean, default: false },
  required: { type: Boolean, default: false },
});

// emits
const emits = defineEmits(['update:modelValue', 'textChanged']);

// computed id
const computedId = computed(() => {
  if (props.id) return props.id;
  if (props.label) return props.label.toLowerCase().replace(/ /g, '-');
  if (props.name) return props.name;
  return null;
});

// computed name
const computedName = computed(() => {
  if (props.name) return props.name;
  if (props.label) return props.label.toLowerCase().replace(/ /g, '_');
  if (props.id) return props.id;
  return null;
});
</script>
