<template>
  <div class="mb-16">
    <!-- page heading -->
    <Heading1>{{ heading }}</Heading1>
    <!-- page heading -->

    <!-- sections -->
    <div class="mt-10 space-y-12">
      <template
        v-for="section in sections"
        :key="section.title"
      >
        <!-- single section -->
        <div>
          <!-- section heading -->
          <Heading5 class="mb-5 text-gray-500">
            {{ section.title }}
          </Heading5>
          <!-- section heading -->

          <!-- fields -->
          <div
            :class="{
              'grid grid-cols-4 gap-6': section.type == 'block',
              'space-y-6 w-1/2 pr-3': section.type == 'text',
            }"
          >
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
        <!-- single section -->
      </template>

      <!-- images -->
      <AdminShowImages :images="images" />
      <!-- images -->
    </div>
    <!-- sections -->
  </div>
</template>

<script setup>
// imports
import { router } from '@inertiajs/vue3';
import AdminShowSingleField from './Partials/AdminShowSingleField.vue';
import AdminShowImages from './Partials/AdminShowImages.vue';

// props
const props = defineProps({
  data: { type: Object, required: true },
  heading: { type: String, required: true },
  sections: { type: Array, required: true },
  images: { type: Array, default: [] },
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
