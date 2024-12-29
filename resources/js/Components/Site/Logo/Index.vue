<template>
  <InertiaLink href="/">
    <div>
      <img
        :src="logo"
        alt="Logo"
        class="object-contain h-14"
      />
    </div>
  </InertiaLink>
</template>

<script setup>
const logo = '/logo.png';
</script>
