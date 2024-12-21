<template>
  <div>
    <div class="flex items-center space-x-12">
      <template
        v-for="navItem in navItems"
        :key="navItem.name"
      >
        <DesktopNavItem :navItem="navItem" />
      </template>
    </div>
  </div>
</template>

<script setup>
// imports
import DesktopNavItem from './DesktopNavItem.vue';
import { navItems } from './NavItems';
</script>
