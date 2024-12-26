<template>
  <div class="fixed inset-0 z-10 grid p-6 place-items-center">
    <!-- screen -->
    <div
      class="fixed inset-0 z-20 bg-black/60"
      @click="close"
    ></div>
    <!-- screen -->

    <!-- contents -->
    <Transition
      enter-from-class="-translate-y-4 opacity-0"
      enter-active-class="transition duration-300"
      appear
    >
      <div class="z-20 w-full max-w-4xl p-8 bg-white">
        <slot />
      </div>
    </Transition>
    <!-- contents -->
  </div>
</template>

<script setup>
// imports
import { onMounted, onUnmounted } from 'vue';

// props
const props = defineProps({});

// emits
const emits = defineEmits(['close']);

// close
const close = () => {
  document.body.style.overflow = 'auto';
  emits('close');
};

// on mounted
onMounted(() => {
  document.body.style.overflow = 'hidden';
});

// on unmounted
onUnmounted(() => {
  document.body.style.overflow = 'auto';
});
</script>
