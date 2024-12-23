<template>
  <InertiaLink href="/">
    <div>
      <img
        :src="logo"
        alt="Logo"
        class="object-contain h-full"
      />
    </div>
  </InertiaLink>
</template>

<script setup>
const logo = '/logo.svg';
</script>
