<template>
  <div>
    <!-- meta -->
    <div>
      <InertiaHead>
        <title>Product Category</title>
      </InertiaHead>
    </div>
    <!-- meta -->

    <!-- debug -->
    <DebugGrid>
      <DebugPanel
        title="Product Category"
        :data="productCategory"
      />
    </DebugGrid>
    <!-- debug -->

    <!-- contents -->
    <Section>
      <Container>
        <PageHeading :background="productCategory.header_image" />
      </Container>
    </Section>
    <!-- contents -->
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';

// props
const props = defineProps({
  productCategory: { type: Object, required: true },
});
</script>
