<template>
  <div>
    <!-- label -->
    <label :for="id" class="text-sm font-medium text-gray-500">
      {{ label }}
    </label>
    <!-- label -->

    <!-- field -->
    <div class="mt-2">
      <div
        class="flex rounded-md shadow-sm shadow-primary-50 ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-primary-500"
      >
        <input
          @input="$emit('update:modelValue', $event.target.files[0])"
          type="file"
          :name="name"
          :id="id"
          class="block w-full border-0 bg-transparent py-2 pl-3 pr-4 text-gray-900 file:rounded file:border-none file:bg-gray-100 file:text-sm placeholder:text-sm placeholder:text-gray-400 focus:outline-primary-500"
        />
      </div>
    </div>
    <!-- field -->

    <!-- error -->
    <Transition appear enter-active-class="animate__animated animate__fadeIn">
      <div v-if="error" class="mt-2 text-sm text-red-600">
        {{ error }}
      </div>
    </Transition>
    <!-- error -->
  </div>
</template>

<script setup>
// props
const props = defineProps({
  modelValue: { required: true },
  label: { type: String, required: true },
  id: { type: String, required: true },
  name: { type: String, required: true },
  placeholder: { type: String, required: false, default: null },
  error: { type: String, required: false, default: null },
});
</script>
