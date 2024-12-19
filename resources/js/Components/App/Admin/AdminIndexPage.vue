<template>
  <div>
    <!-- heading section -->
    <div class="flex items-end justify-between mb-8">
      <!-- heading -->
      <AdminPageHeading
        preHeading="Showing"
        :heading="heading"
      />
      <!-- heading -->

      <!-- create link -->
      <AppButton @click="createButtonClicked">Create New</AppButton>
      <!-- create link -->
    </div>
    <!-- heading section -->

    <!-- search -->
    <TableSearch
      :filters="filters"
      class="mb-6"
      :count="filteredCount"
    />
    <!-- search -->

    <!-- table -->
    <GridView
      :data="data"
      :columns="columns"
      urlPrefix="/admin/product-categories"
      @cellDoubleClicked="cellDoubleClicked"
      @editButtonClicked="editButtonClicked"
    />
    <!-- table -->

    <!-- pagination -->
    <div
      v-if="paginationLinks"
      class="flex justify-end mt-6"
    >
      <Pagination :links="paginationLinks" />
    </div>
    <!-- pagination -->
  </div>
</template>

<script setup>
// imports
import GridView from '@/Components/App/Admin/GridView.vue';

// props
const props = defineProps({
  heading: { type: String, required: true },
  filters: { type: Object, default: {} },
  filteredCount: { type: Number, default: 0 },
  data: { type: Array, required: true },
  columns: { type: Array, required: true },
  paginationLinks: { type: Object, default: null },
});

// emits
const emits = defineEmits([
  'createButtonClicked',
  'cellDoubleClicked',
  'editButtonClicked',
]);

// create button clicked
const createButtonClicked = () => {
  emits('createButtonClicked');
};

// cell double clicked
const cellDoubleClicked = (id) => {
  emits('cellDoubleClicked', id);
};

// edit button clicked
const editButtonClicked = (id) => {
  emits('editButtonClicked', id);
};
</script>
