<template>
  <div>
    <DebugGrid v-if="debug">
      <DebugPanel
        title="Product Category"
        :data="props"
      />
    </DebugGrid>

    <PageHeading
      :icon="productCategory.icon"
      :title="productCategory.name"
      :intro="productCategory.description"
      :background="productCategory.header_image"
    />

    <Section class="my-16">
      <Container>
        <Heading4>Products</Heading4>
      </Container>
    </Section>
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';

// props
const props = defineProps({
  productCategory: { type: Object, required: true },
});

// debug
const debug = ref(false);
</script>
