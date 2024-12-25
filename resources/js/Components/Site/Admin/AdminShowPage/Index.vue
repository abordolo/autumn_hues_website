<template>
  <div>
    <Heading1>{{ heading }}</Heading1>

    <!-- sections -->
    <AdminShowSections
      :sections="sections"
      class="mt-12"
    />
    <!-- sections -->
  </div>
</template>

<script setup>
// imports
import AdminShowSections from '@/Components/Site/Admin/AdminShowSections/Index.vue';
import { router } from '@inertiajs/vue3';

// props
const props = defineProps({
  data: { type: Object, required: true },
  heading: { type: String, required: true },
  sections: { type: Array, required: true },
});

// edit button clicked
const editButtonClicked = (record) => {
  const url = route(props.editRoute, { product_sku: record.id });
  router.get(url);
};

// details button clicked
const detailsButtonClicked = (record) => {
  const url = route(props.detailsRoute, { product_sku: record.id });
  router.get(url);
};
</script>
