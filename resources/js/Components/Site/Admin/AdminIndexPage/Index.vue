<template>
  <div>
    <!-- heading and pagination -->
    <div class="flex items-center justify-between space-x-4">
      <Heading1>{{ heading }}</Heading1>
      <Pagination
        v-if="links"
        :links="links"
      />
    </div>
    <!-- heading and pagination -->

    <!-- data table -->
    <AdminDataTable
      class="mt-10"
      :data="data"
      :columns="columns"
      @edit="editButtonClicked"
      @details="detailsButtonClicked"
    />
    <!-- data table -->
  </div>
</template>

<script setup>
// imports
import AdminDataTable from '@/Components/Site/Admin/AdminDataTable/Index.vue';
import { router } from '@inertiajs/vue3';

// props
const props = defineProps({
  data: { type: Array, required: true },
  links: { type: Array, required: false },
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
