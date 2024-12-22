<template>
  <Section>
    <Container class="relative py-24 overflow-hidden text-center text-white">
      <!-- background image -->
      <div class="absolute inset-0 z-10">
        <img
          src="/images/home/hero/bg.png"
          class="object-cover object-center w-full h-full"
        />
      </div>
      <!-- background image -->

      <div class="relative z-20 max-w-3xl mx-auto">
        <div class="inline-flex px-3 py-2 mx-auto bg-primary-500">
          <PreHeading>{{ preHeading }}</PreHeading>
        </div>
        <DisplayHeading class="mt-6">{{ heading }}</DisplayHeading>
        <Intro class="mt-6">{{ intro }}</Intro>

        <div class="max-w-2xl mx-auto mt-12">
          <SearchForm />
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
