<template>
  <div>
    <!-- debug -->
    <DebugGrid v-if="debug">
      <DebugPanel
        title="Product Category"
        :data="productCategory"
      />
      <DebugPanel
        title="Product Sub Categories"
        :data="productSubCategories"
      />
      <DebugPanel
        title="Products"
        :data="products"
      />
    </DebugGrid>
    <!-- debug -->

    <PageHeading
      :icon="productCategory.icon"
      :title="productCategory.name"
      :intro="productCategory.description"
      :background="productCategory.header_image"
    />

    <Section class="my-12">
      <Container>
        <!-- sub categories -->
        <div class="space-y-12">
          <template
            v-for="productSubCategory in productSubCategories"
            :key="productSubCategory.id"
          >
            <!-- single sub category -->
            <div>
              <Heading5>{{ productSubCategory.name }}</Heading5>

              <!-- products for single sub category -->
              <div class="grid grid-cols-4 gap-6 mt-4">
                <template
                  v-for="product in productsInCategory(productSubCategory.id)"
                  :key="product.id"
                >
                  <!-- single product -->
                  <div>
                    <ProductCard :product="product" />
                  </div>
                  <!-- single product -->
                </template>
              </div>
              <!-- products for single sub category -->
            </div>
            <!-- single sub category -->
          </template>
        </div>
        <!-- sub categories -->
      </Container>
    </Section>
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';
import ProductCard from './Partials/ProductCard.vue';

// props
const props = defineProps({
  productCategory: { type: Object, required: true },
  productSubCategories: { type: Array, required: true },
  products: { type: Array, required: true },
});

// debug
const debug = ref(false);

// products in single category
const productsInCategory = (categoryId) => {
  return props.products.filter(
    (product) => product.product_sub_category_id === categoryId
  );
};
</script>
