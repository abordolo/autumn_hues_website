<template>
  <div>
    <AdminSidebar />

    <div class="ml-[320px] flex-1 px-6 py-4 overflow-x-auto">
      <slot />
    </div>

    <Notification />
  </div>
</template>

<script setup>
import AdminSidebar from './Partials/AdminSidebar.vue';

// function keyPressed(e) {
//   if (e.ctrlKey && e.key === 'k') {
//     useDebugStore().toggleDebug();
//   }
// }

// document.addEventListener('keyup', keyPressed);
</script>
