<template>
  <Transition
    enter-from-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
    enter-active-class="transition duration-300 ease-out transform"
    enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"
    leave-from-class="opacity-100"
    leave-active-class="transition duration-100 ease-in"
    leave-to-class="opacity-0"
  >
    <div
      v-if="notificationStore.message"
      class="flex items-start transition-all duration-300 fixed px-6 py-4 rounded right-4 top-4 min-w-[440px] max-w-[560px]"
      :class="{
        'bg-green-500':
          notificationStore.type === 'success' ||
          notificationStore.type === 'info',
        'bg-red-500': !(
          notificationStore.type === 'success' ||
          notificationStore.type === 'info'
        ),
      }"
    >
      <!-- icon -->
      <div class="mr-3">
        <Component
          :is="iconComponent"
          class="text-white w-7 h-7"
        />
      </div>
      <!-- icon -->

      <!-- text -->
      <Medium class="font-semibold text-white">{{
        notificationStore.message
      }}</Medium>
      <!-- text -->
    </div>
  </Transition>
</template>

<script setup>
// imports
import { ref, computed } from 'vue';
import { useNotificationStore } from '@/Stores/NotificationStore';
import {
  CheckCircleIcon,
  ExclamationCircleIcon,
} from '@heroicons/vue/24/outline';

// store
const notificationStore = useNotificationStore();

// icon component
const iconComponent = computed(() => {
  return notificationStore.type === 'success' ||
    notificationStore.type === 'info'
    ? CheckCircleIcon
    : ExclamationCircleIcon;
});
</script>
