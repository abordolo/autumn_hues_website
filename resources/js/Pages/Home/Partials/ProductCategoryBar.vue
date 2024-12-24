<template>
  <Section>
    <Container class="bg-amber-100 xl:bg-inherit">
      <div
        class="flex flex-wrap items-center justify-center gap-4 py-4 bg-amber-100"
      >
        <template
          v-for="productCategory in productCategories"
          :key="productCategory.id"
        >
          <!-- single product category -->
          <InertiaLink
            :href="route('product-categories.show', productCategory.slug)"
          >
            <div class="flex flex-col items-center p-2 bg-white rounded w-36">
              <img
                :src="productCategory.icon"
                alt=""
              />
              <Small class="font-semibold">
                {{ productCategory.name }}
              </Small>
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
