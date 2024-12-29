<template>
  <Section>
    <Container>
      <!-- contents -->
      <div
        class="relative flex items-center min-h-[400px] px-12 bg-primary-500"
      >
        <!-- background image -->
        <div
          v-if="background"
          class="absolute inset-0"
        >
          <img
            :src="background"
            class="object-cover object-center w-full h-full"
          />
        </div>
        <!-- background image -->

        <!-- image screen -->
        <div
          v-if="background"
          class="absolute inset-0 bg-black/60"
        />
        <!-- image screen -->

        <!-- texts -->
        <div class="relative z-10 max-w-3xl text-white">
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
        <!-- texts -->
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
  title: { type: String, required: false },
  intro: { type: String, required: false },
  background: { type: String, required: false },
});
</script>
