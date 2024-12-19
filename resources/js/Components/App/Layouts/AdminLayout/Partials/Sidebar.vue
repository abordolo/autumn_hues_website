<template>
  <div class="h-[100vh] overflow-auto bg-gray-50 w-[320px]">
    <!-- heading -->
    <div class="px-4 py-6 bg-gray-100">
      <p class="text-lg font-bold">Admin Dashboard</p>
    </div>
    <!-- heading -->

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
import NavItem from './NavItem.vue';
import { navItems } from '@/Components/App/Layouts/AdminLayout/AdminNavItems.js';

// nav items
</script>
