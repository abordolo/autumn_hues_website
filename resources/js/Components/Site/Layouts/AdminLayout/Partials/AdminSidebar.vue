<template>
  <div class="fixed top-0 bottom-0 overflow-auto bg-gray-100 w-[320px]">
    <!-- logo -->
    <div class="px-4 pt-4"><Logo /></div>
    <!-- logo -->

    <!-- menu item container -->
    <div class="mt-4">
      <div
        v-for="navItem in navItems"
        :key="navItem.directives"
      >
        <NavItem :navItem="navItem" />
      </div>
    </div>
    <!-- menu item container -->
  </div>
</template>

<script setup>
// imports
import NavItem from './AdminNavItem.vue';
import { navItems } from '@/Components/Site/Layouts/AdminLayout/AdminNavItems.js';

// nav items
</script>
