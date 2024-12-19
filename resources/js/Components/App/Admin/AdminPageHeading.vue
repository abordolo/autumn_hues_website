<template>
  <div>
    <!-- pre heading -->
    <div
      class="inline-flex px-2 py-1 border rounded bg-primary-100 text-primary-500 border-primary-200"
    >
      <PreHeading> {{ preHeading }} </PreHeading>
    </div>
    <!-- pre heading -->

    <!-- heading -->
    <Heading1 class="mt-1">{{ heading }}</Heading1>
    <!-- heading -->
  </div>
</template>

<script setup>
// props
const props = defineProps({
  preHeading: { type: String, required: true },
  heading: { type: String, required: true },
});
</script>
