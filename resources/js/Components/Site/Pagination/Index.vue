<template>
  <div class="flex flex-wrap gap-2">
    <template
      v-for="(link, index) in links.slice(1, links.length - 1)"
      :key="link.label"
    >
      <!-- single link -->
      <InertiaLink
        :href="link.url"
        replace
      >
        <div
          v-html="link.label"
          class="flex items-center justify-center transition-colors duration-300 bg-gray-100 rounded cursor-pointer size-10 hover:bg-primary-500 hover:text-white"
          :class="{
            'bg-primary-500 text-white': link.active,
          }"
        />
      </InertiaLink>
      <!-- single link -->
    </template>
  </div>
</template>

<script setup>
// props
const props = defineProps({
  links: { type: Array, required: true },
});
</script>
