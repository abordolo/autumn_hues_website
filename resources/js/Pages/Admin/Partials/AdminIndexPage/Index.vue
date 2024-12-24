<template>
  <div>
    <Heading1>{{ heading }}</Heading1>
    <AdminDataTable
      class="mt-12"
      :data="data"
      :columns="columns"
      @edit="editButtonClicked"
      @details="detailsButtonClicked"
    />
  </div>
</template>

<script setup>
// imports
import AdminDataTable from '@/Pages/Admin/Partials/AdminDataTable/Index.vue';
import { router } from '@inertiajs/vue3';

// props
const props = defineProps({
  data: { type: Array, required: true },
  columns: { type: Array, required: true },
  heading: { type: String, required: true },
  editRoute: { type: String, required: true },
  detailsRoute: { type: String, required: true },
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
