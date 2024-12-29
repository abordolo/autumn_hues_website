<template>
  <form @submit.prevent="submit">
    <div class="flex items-stretch overflow-hidden rounded">
      <!-- icon -->
      <div
        class="flex items-center justify-center w-16 px-4 transition-all duration-300 border border-r-0 rounded-l bg-white/50"
        :class="{
          'border-white': searchFocused,
          'border-white/50': !searchFocused,
        }"
      >
        <MagnifyingGlassIcon
          :class="{
            'size-4': !searchFocused,
            'size-5': searchFocused,
          }"
          class="transition-all duration-1000"
        />
      </div>
      <!-- icon -->

      <!-- input -->
      <input
        class="w-full text-lg font-medium transition-all duration-300 bg-transparent border-l-0 border-r-0 border-white/50 h-14 focus:outline-none focus:ring-0 focus:border-white placeholder:text-white/30"
        placeholder="Search for products"
        @focus="searchFocused = true"
        @blur="searchFocused = false"
      />
      <!-- input -->

      <!-- search button -->
      <button
        class="px-6 font-semibold text-white border bg-primary-500 border-primary-500"
      >
        Search
      </button>
      <!-- search button -->
    </div>
  </form>
</template>

<script setup>
// imports
import { MagnifyingGlassIcon } from '@heroicons/vue/24/outline';
import { ref } from 'vue';

// focused
const searchFocused = ref(false);
</script>
