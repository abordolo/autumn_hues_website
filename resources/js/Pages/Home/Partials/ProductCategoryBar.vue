<template>
  <Section>
    <Container class="bg-primary-100 md:bg-primary-50">
      <div
        class="flex flex-wrap items-center justify-center gap-4 py-3 bg-primary-100"
      >
        <template
          v-for="productCategory in productCategories"
          :key="productCategory.id"
        >
          <!-- single product category -->
          <InertiaLink
            :href="route('product-categories.show', productCategory.slug)"
          >
            <div
              class="flex flex-col items-center p-2 transition-colors duration-300 border rounded shadow-sm bg-primary-100 hover:bg-primary-200 min-w-[140px] border-primary-200"
            >
              <!-- icon -->
              <div class="relative">
                <img
                  :src="productCategory.icon"
                  class="w-6"
                />
                <div class="absolute inset-0"></div>
              </div>
              <!-- icon -->

              <!-- name -->
              <Small class="mt-1 font-medium">
                {{ productCategory.name }}
              </Small>
              <!-- name -->
            </div>
          </InertiaLink>
          <!-- single product category -->
        </template>
      </div>
    </Container>
  </Section>
</template>

<script setup>
// props
const props = defineProps({
  productCategories: { type: Array, required: true },
});
</script>
