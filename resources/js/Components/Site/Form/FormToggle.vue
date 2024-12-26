<template>
  <div>
    <!-- label -->
    <FormLabel
      :label="label"
      :id="label"
    />
    <!-- label -->

    <!-- toggle -->
    <div class="mt-2">
      <div
        @click="clicked"
        class="relative w-16 h-10 p-2 bg-gray-200 rounded-full cursor-pointer border-primary-500"
        :class="{
          'bg-primary-500': modelValue,
          'bg-gray-200': !modelValue,
        }"
      >
        <!-- switch -->
        <div
          class="absolute bg-white rounded-full size-7 top-1.5 transition-all duration-300 ease-in-out"
          :class="{
            'left-1.5': !modelValue,
            'right-1.5': modelValue,
          }"
        />
        <!-- switch -->
      </div>
    </div>
    <!-- toggle -->
  </div>
</template>

<script setup>
// props
const props = defineProps({
  modelValue: { type: Boolean, required: false },
  label: { type: String, required: true },
});

// emits
const emit = defineEmits(['update:modelValue']);

// clicked
const clicked = () => {
  emit('update:modelValue', !props.modelValue);
};
</script>
