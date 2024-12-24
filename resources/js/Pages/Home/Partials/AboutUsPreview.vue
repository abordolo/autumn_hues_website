<template>
  <Section class="py-16">
    <Container>
      <div class="flex flex-col-reverse items-center space-x-8 lg:flex-row">
        <!-- left -->
        <div class="flex-1">
          <HeadingBlock
            :heading="heading"
            :intro="intro"
            :primaryButtonText="primaryButtonText"
            :primaryButtonLink="primaryButtonLink"
            :secondaryButtonText="secondaryButtonText"
            :secondaryButtonLink="secondaryButtonLink"
          />
        </div>
        <!-- left -->

        <!-- right -->
        <div class="flex-1 max-w-[480px] lg:max-w-none relative">
          <img src="/images/home/about-us-preview/illustration.svg" />
          <div class="absolute inset-0"></div>
        </div>
        <!-- right -->
      </div>
    </Container>
  </Section>
</template>

<script setup>
// variables
const heading = 'All the way from North East India';
const intro =
  'Unearth hidden gems from the enchanting landscapes of North East India. We bring you unique and sustainable products, each with a story to tell, directly from this captivating region.';
const primaryButtonText = 'Browse Products';
const primaryButtonLink = '/product-categories';
const secondaryButtonText = 'More About Us';
const secondaryButtonLink = '/about-us';
</script>
