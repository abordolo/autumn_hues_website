<template>
  <div>
    <Heading1>{{ heading }}</Heading1>

    <!-- sections -->
    <div class="mt-10 space-y-10">
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
              <AdminShowSingleField
                :field="field"
                :updateRoute="updateRoute"
              />
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
    <!-- sections -->
  </div>
</template>

<script setup>
// imports
import { router } from '@inertiajs/vue3';
import AdminShowSingleField from './Partials/AdminShowSingleField.vue';

// props
const props = defineProps({
  data: { type: Object, required: true },
  heading: { type: String, required: true },
  sections: { type: Array, required: true },
  updateRoute: { type: String, required: true },
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
