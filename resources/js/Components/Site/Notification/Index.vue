<template>
  <div
    v-if="true"
    class="fixed bottom-0 left-0 right-0 z-50 flex items-center justify-center px-6 pb-6 transition-all duration-300"
  >
    <Transition
      enter-from-class="translate-y-2 opacity-0"
      enter-active-class="transition duration-300 ease-out transform"
      leave-active-class="transition duration-100 ease-in"
      leave-to-class="translate-y-2 opacity-0"
    >
      <!-- message container -->
      <div
        v-if="notificationStore.message"
        class="flex items-stretch justify-between w-full max-w-3xl space-x-2 rounded-lg shadow-lg"
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
        <div class="flex p-4 space-x-3">
          <!-- icon -->
          <div>
            <Component
              :is="iconComponent"
              class="text-white size-7"
            />
          </div>
          <!-- icon -->

          <!-- text -->
          <Medium class="font-medium text-white">
            {{ notificationStore.message }}
          </Medium>
          <!-- text -->
        </div>

        <!-- close icon -->
        <div
          @click="notificationStore.hideNotification()"
          class="grid px-3 cursor-pointer bg-black/10 place-items-center"
        >
          <Small class="font-semibold text-white">Dismiss</Small>
        </div>
        <!-- close icon -->
      </div>
      <!-- message container -->
    </Transition>
  </div>
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
