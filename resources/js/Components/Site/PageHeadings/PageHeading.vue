<template>
  <Section>
    <Container class="relative min-h-[400px] text-white flex items-center">
      <!-- background image -->
      <div class="absolute inset-0 z-10">
        <img
          :src="background"
          alt=""
          class="object-cover object-center w-full h-full"
        />
        <div class="absolute inset-0"></div>
      </div>
      <!-- background image -->

      <!-- contents -->
      <div class="relative z-20 max-w-3xl px-12">
        <!-- icon -->
        <AnimateOnScroll>
          <div class="relative">
            <img
              v-if="icon"
              :src="icon"
              alt="Icon"
              class="w-12 h-12 mb-6"
            />
            <div class="absolute inset-0"></div>
          </div>
        </AnimateOnScroll>
        <!-- icon -->

        <!-- heading -->
        <AnimateOnScroll :delay="200">
          <Heading2>{{ title }}</Heading2>
        </AnimateOnScroll>
        <!-- heading -->

        <!-- intro -->
        <AnimateOnScroll :delay="300">
          <Intro
            v-if="intro"
            class="mt-4"
          >
            {{ intro }}
          </Intro>
        </AnimateOnScroll>
        <!-- intro -->
      </div>
      <!-- contents -->
    </Container>
  </Section>
</template>

<script setup>
import AnimateOnScroll from '../AnimateOnScroll/AnimateOnScroll.vue';

// props
const props = defineProps({
  icon: { type: String, required: false },
  title: { type: String, required: true },
  intro: { type: String, required: false },
  background: { type: String, required: false },
});
</script>
