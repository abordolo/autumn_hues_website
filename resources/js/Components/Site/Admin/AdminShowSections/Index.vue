<template>
  <div class="space-y-10">
    <template
      v-for="section in sections"
      :key="section.title"
    >
      <!-- block section -->
      <div v-if="section.type == 'block'">
        <Heading5 class="mb-4 text-gray-500">{{ section.title }}</Heading5>

        <!-- fields -->
        <div class="grid grid-cols-4 gap-6">
          <template
            v-for="field in section.fields"
            :key="field.title"
          >
            <!-- single field -->
            <div class="p-4 bg-gray-100">
              <Small class="font-semibold text-gray-500">
                {{ field.title }}
              </Small>
              <BodyText class="mt-1">{{ field.value }}</BodyText>
            </div>
            <!-- single field -->
          </template>
        </div>
        <!-- fields -->
      </div>
      <!-- block section -->

      <!-- text section -->
      <div v-if="section.type == 'text'"></div>
      <!-- text section -->
    </template>
  </div>
</template>

<script setup>
// props
const props = defineProps({
  sections: { type: Array, required: true },
});
</script>
