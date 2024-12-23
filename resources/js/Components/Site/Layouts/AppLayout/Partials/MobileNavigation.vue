<template>
  <div>
    <div
      @click="showMenu"
      class="p-2 bg-gray-100 border cursor-pointer"
    >
      <Bars3Icon class="size-6" />
    </div>

    <!-- background screen -->
    <Transition>
      <div
        v-if="menuVisible"
        @click="hideMenu"
        class="fixed inset-0 z-30 min-h-screen bg-black/60"
      />
    </Transition>
    <!-- background screen -->

    <!-- x button -->
    <div
      v-if="menuVisible"
      @click="hideMenu"
      class="fixed z-40 p-2 bg-gray-100 border top-4 right-4"
    >
      <XMarkIcon class="text-gray-500 size-8" />
    </div>
    <!-- x button -->

    <!-- sidebar -->
    <Transition
      enter-from-class="-translate-x-full"
      enter-active-class="transition-all duration-200"
      leave-to-class="-translate-x-full"
      leave-active-class="transition-all duration-100"
    >
      <div
        v-if="menuVisible"
        class="fixed inset-0 z-30 bg-white max-w-[360px]"
      ></div>
    </Transition>
    <!-- sidebar -->
  </div>
</template>

<script setup>
// imports
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline';
import { ref } from 'vue';

// show menu
const menuVisible = ref(false);

// show menu
const showMenu = () => {
  menuVisible.value = true;
  document.body.style.overflow = 'hidden';
};

const hideMenu = () => {
  menuVisible.value = false;
  document.body.style.overflow = 'auto';
};
</script>
