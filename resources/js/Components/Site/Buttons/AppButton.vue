<template>
  <button
    :class="buttonClasses"
    :disabled="disabled"
  >
    <!-- content -->
    <p :class="contentClasses">
      <slot />
    </p>
    <!-- content -->

    <!-- loading indicator -->
    <LoadingIndicator
      v-if="loading"
      class="absolute inset-0"
      color="white"
    />
    <!-- loading indicator -->
  </button>
</template>

<script setup>
// imports
import { computed } from 'vue';
import LoadingIndicator from '../LoadingIndicator.vue';

// props
const props = defineProps({
  loading: { type: Boolean, default: false },
  disabled: { type: Boolean, default: false },
  primary: { type: Boolean, default: true },
  secondary: { type: Boolean, default: false },
  href: { type: String, default: '#' },
  small: { type: Boolean, default: false },
});

// button classes
const buttonClasses = computed(() => {
  let baseClasses = [
    // position
    'relative',
    'inline-block',

    // transitions
    'transition-colors',
    'duration-300',

    // appearance
    'border',
    'rounded',
    'focus:outline-none',
    'focus:ring-2',
    'focus:ring-primary-500',
    'focus:ring-opacity-50',
    'disabled:cursor-not-allowed',

    // colors
    // 'bg-primary-500',
    // 'border-primary-600',
    // 'hover:bg-primary-600',
  ];

  if (props.secondary) {
    baseClasses.push('bg-gray-800', 'border-gray-900', 'hover:bg-gray-900');
  } else {
    baseClasses.push(
      'bg-primary-500',
      'border-primary-600',
      'hover:bg-primary-600'
    );
  }

  // size
  if (props.small) {
    baseClasses.push('px-2', 'py-1');
  } else {
    baseClasses.push('px-6', 'py-3');
  }

  return baseClasses;
});

// content classes
const contentClasses = computed(() => {
  let baseClasses = [
    // color
    'text-white',
    'text-center',

    // appearance
    'font-semibold',

    // disable selection
    'select-none',
  ];

  // opacity
  if (props.loading) {
    baseClasses.push('opacity-0');
  } else if (props.disabled) {
    baseClasses.push('opacity-50');
  }

  // size
  if (props.small) {
    baseClasses.push('text-sm');
  } else {
    baseClasses.push('text-base');
  }

  return baseClasses;
});
</script>
