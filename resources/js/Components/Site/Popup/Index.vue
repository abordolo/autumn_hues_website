<template>
  <div class="fixed inset-0 z-10 grid place-items-center">
    <!-- screen -->
    <div
      class="fixed inset-0 z-20 bg-black/60"
      @click="close"
    ></div>
    <!-- screen -->

    <!-- contents -->
    <Transition
      enter-from-class="-translate-y-2 opacity-0"
      enter-active-class="transition duration-300"
      appear
    >
      <div class="z-20 p-8 bg-white">
        <slot />
      </div>
    </Transition>
    <!-- contents -->
  </div>
</template>

<script setup>
// imports
import { onUnmounted } from 'vue';

// props
const props = defineProps({});

// emits
const emits = defineEmits(['close']);

document.body.style.overflow = 'hidden';

// close
const close = () => {
  document.body.style.overflow = 'auto';
  emits('close');
};

// on unmounted
onUnmounted(() => {
  document.body.style.overflow = 'auto';
});
</script>
