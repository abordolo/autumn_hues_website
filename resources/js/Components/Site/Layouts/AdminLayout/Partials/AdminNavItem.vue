<template>
  <InertiaLink :href="navItem.href">
    <div
      class="flex items-center justify-between p-3 px-4 space-x-4 transition-colors duration-300 hover:bg-gray-100"
      :class="{
        'bg-gray-100': active,
      }"
    >
      <!-- nav item text -->
      <p
        class="transition-all duration-300"
        :class="{
          'font-bold text-primary-500': active,
          'font-medium': !active,
        }"
      >
        {{ navItem.name }}
      </p>

      <!-- nav item text -->

      <!-- arrow -->
      <Transition
        enter-active-class="animate__animated animate__slideInLeft animate__faster"
      >
        <div
          v-if="active"
          class="font-bold text-primary-500"
        >
          &rarr;
        </div>
      </Transition>
      <!-- arrow -->
    </div>
  </InertiaLink>
</template>

<script setup>
// imports
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

// props
const props = defineProps({
  navItem: Object,
});

// active
const active = computed(() => {
  return usePage().component.startsWith(props.navItem.componentPrefix);
});
</script>
