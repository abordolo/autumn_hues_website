<template>
  <div
    class="relative"
    @mouseenter="showDropdown = true"
    @mouseleave="showDropdown = false"
  >
    <nav
      class="font-medium transition-colors duration-300 cursor-pointer hover:text-primary-500"
    >
      {{ navItem.name }}
    </nav>

    <!-- dropdown -->
    <Transition
      enter-from-class="-translate-y-4 opacity-0"
      enter-active-class="transition duration-300 ease-out"
      leave-to-class="opacity-0"
    >
      <div
        v-show="showDropdown"
        class="absolute z-10 pt-2"
      >
        <div class="w-48 bg-white border rounded-md shadow-lg">
          <template
            v-for="item in navItem.items"
            :key="item.name"
          >
            <InertiaLink
              :href="item.url"
              class="block hover:bg-gray-100"
            >
              <div class="px-4 py-2">{{ item.name }}</div>
            </InertiaLink>
          </template>
        </div>
      </div>
    </Transition>
    <!-- dropdown -->
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';

// props
const props = defineProps({
  navItem: { type: Object, required: true },
});

// show dropdown
const showDropdown = ref(false);
</script>
