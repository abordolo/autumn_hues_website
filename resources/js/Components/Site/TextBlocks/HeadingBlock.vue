<template>
  <div>
    <!-- pre heading -->
    <AnimateOnScroll :delay="50">
      <PreHeading
        v-if="preHeading"
        class="mb-6"
      >
        {{ preHeading }}
      </PreHeading>
    </AnimateOnScroll>
    <!-- pre heading -->

    <!-- heading -->
    <AnimateOnScroll :delay="150">
      <Heading1>{{ heading }}</Heading1>
    </AnimateOnScroll>
    <!-- heading -->

    <!-- intro -->
    <AnimateOnScroll :delay="200">
      <Intro class="mt-6">{{ intro }}</Intro>
    </AnimateOnScroll>
    <!-- intro -->

    <!-- buttons -->
    <div
      v-if="primaryButtonText || secondaryButtonText"
      class="flex items-center mt-10 space-x-4"
    >
      <!-- primary Button -->
      <AnimateOnScroll :delay="250">
        <InertiaLink :href="primaryButtonLink">
          <AppButton v-if="primaryButtonText">
            {{ primaryButtonText }}
          </AppButton>
        </InertiaLink>
      </AnimateOnScroll>
      <!-- primary Button -->

      <!-- secondary button -->
      <AnimateOnScroll :delay="300">
        <InertiaLink :href="primaryButtonLink">
          <AppButton
            v-if="secondaryButtonText"
            secondary
          >
            {{ secondaryButtonText }}</AppButton
          >
        </InertiaLink>
      </AnimateOnScroll>
      <!-- secondary button -->
    </div>
    <!-- buttons -->
  </div>
</template>

<script setup>
import AnimateOnScroll from '../AnimateOnScroll/AnimateOnScroll.vue';

// props
const props = defineProps({
  preHeading: { type: String, required: false },
  heading: { type: String, required: true },
  intro: { type: String, required: true },
  primaryButtonText: { type: String, required: false },
  primaryButtonLink: { type: String, required: false },
  secondaryButtonText: { type: String, required: false },
  secondaryButtonLink: { type: String, required: false },
});
</script>
