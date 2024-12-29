<template>
  <Section>
    <Container class="relative">
      <div class="block py-20 text-center text-white md:relative md:px-6">
        <!-- background image -->
        <div class="absolute inset-0 z-10">
          <img
            src="/images/home/hero/bg.png"
            class="object-cover object-center w-full h-full"
          />
        </div>
        <!-- background image -->

        <div class="relative z-20 max-w-3xl mx-auto">
          <div class="inline-flex px-3 py-2 mx-auto rounded bg-primary-500">
            <AnimateOnScroll :delay="50">
              <PreHeading class="tracking-wide">{{ preHeading }}</PreHeading>
            </AnimateOnScroll>
          </div>
          <AnimateOnScroll :delay="100">
            <DisplayHeading class="mt-6">{{ heading }}</DisplayHeading>
          </AnimateOnScroll>

          <AnimateOnScroll :delay="150">
            <Intro class="mt-6">{{ intro }}</Intro>
          </AnimateOnScroll>

          <div class="max-w-2xl mx-auto mt-12">
            <SearchForm />
          </div>
        </div>
      </div>
    </Container>
  </Section>
</template>

<script setup>
// imports
import SearchForm from './SearchForm.vue';

// variables
const preHeading = 'Explore a world of treasure';
const heading = 'Curated Collections for Your Home and Style';
const intro =
  'Discover unique jewelry, eco-conscious finds, and home essentials.  Express your individuality and shop with purpose.';
</script>
