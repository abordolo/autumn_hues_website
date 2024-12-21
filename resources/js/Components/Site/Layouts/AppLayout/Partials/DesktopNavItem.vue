<template>
  <!-- link -->
  <div v-if="navItem.type == 'link'">
    <InertiaLink
      :href="navItem.url"
      class="font-medium transition-colors hover:text-primary-500 duration:300"
    >
      {{ navItem.name }}
    </InertiaLink>
  </div>
  <!-- link -->

  <!-- dropdown -->
  <div v-else>
    <DesktopDropdownNavItem :navItem="navItem" />
  </div>
  <!-- dropdown -->
</template>

<script setup>
// imports
import DesktopDropdownNavItem from './DesktopDropdownNavItem.vue';
// props
const props = defineProps({
  navItem: { type: Object, required: true },
});
</script>
