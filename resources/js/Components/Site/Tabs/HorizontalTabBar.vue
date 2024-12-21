<template>
  <div class="flex">
    <!-- tabs -->
    <template
      v-for="(tab, index) in tabs"
      :key="tab"
    >
      <!-- single tab -->
      <div
        class="px-4 py-2 border cursor-pointer select-none"
        :class="{
          'bg-gray-100 text-primary-500': index == activeIndex,
          'rounded-l': index == 0,
          'rounded-r': index == tabs.length - 1,
        }"
        @click="$emit('tabSelected', index)"
      >
        <!-- tab text -->
        <BodyText class="font-medium select-none">
          {{ tab }}
        </BodyText>
        <!-- tab text -->
      </div>

      <!-- single tab -->
    </template>
    <!-- tabs -->
  </div>
</template>

<script setup>
// props
const props = defineProps({
  tabs: { type: Array, required: true },
  activeIndex: { type: Number, required: true },
});

// emits
const emit = defineEmits(['tabSelected']);
</script>
