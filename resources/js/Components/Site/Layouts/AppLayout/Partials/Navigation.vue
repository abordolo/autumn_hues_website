<template>
  <div class="py-3 bg-neutral-700">
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
import DesktopNavigation from './DesktopNavigation.vue';
import MobileNavigation from './MobileNavigation.vue';
</script>
