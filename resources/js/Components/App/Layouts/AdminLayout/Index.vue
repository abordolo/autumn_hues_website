<template>
  <div class="flex">
    <Sidebar class="sticky top-0 shrink-0" />

    <div class="flex-1 px-6 py-4 overflow-x-auto">
      <slot />
    </div>

    <Notification />
  </div>
</template>

<script setup>
import Sidebar from './Partials/Sidebar.vue';
import Notification from '@/Components/App/Notification.vue';

// function keyPressed(e) {
//   if (e.ctrlKey && e.key === 'k') {
//     useDebugStore().toggleDebug();
//   }
// }

// document.addEventListener('keyup', keyPressed);
</script>
