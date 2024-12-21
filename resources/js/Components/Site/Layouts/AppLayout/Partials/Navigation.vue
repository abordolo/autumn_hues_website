<template>
  <div class="bg-white">
    <Section>
      <Container>
        <div class="flex items-center justify-between">
          <Logo />

          <DesktopNavigation class="hidden md:block" />
          <MobileNavigation class="block md:hidden" />
        </div>
      </Container>
    </Section>
  </div>
</template>

<script setup>
// imports
import Logo from '@/Components/Site/Logo/Index.vue';
import DesktopNavigation from './DesktopNavigation.vue';
import MobileNavigation from './MobileNavigation.vue';
</script>
