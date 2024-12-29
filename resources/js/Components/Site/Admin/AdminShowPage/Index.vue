<template>
  <div class="mb-48">
    <!-- page heading -->
    <Heading1>{{ heading }}</Heading1>
    <!-- page heading -->

    <!-- images -->
    <div class="mt-12">
      <AdminShowImages
        :images="images"
        :deleteImageRoute="deleteImageRoute"
        :addImageRoute="addImageRoute"
      />
    </div>
    <!-- images -->

    <!-- sections -->
    <div class="mt-12 space-y-12">
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
    </div>
    <!-- sections -->

    <!-- buttons -->
    <div class="flex items-center mt-12 space-x-4">
      <!-- primary button -->
      <AppButton
        v-if="editResourceRoute"
        @click="clickedEditButton"
      >
        Edit Record
      </AppButton>
      <!-- primary button -->

      <!-- secondary button -->
      <AppButton
        secondary
        @click="clickedGoBack"
      >
        Go Back
      </AppButton>
      <!-- secondary button -->
    </div>
    <!-- buttons -->
  </div>
</template>

<script setup>
// imports
import { router } from '@inertiajs/vue3';
import AdminShowSingleField from './Partials/AdminShowSingleField.vue';
import AdminShowImages from './Partials/AdminShowImages.vue';
import { popRoute } from '@/Helpers/NavigationHelpers';

// props
const props = defineProps({
  data: { type: Object, required: true },
  heading: { type: String, required: true },
  sections: { type: Array, required: true },
  images: { type: Array, default: [] },
  updateRoute: { type: String, required: true },
  deleteImageRoute: { type: String, required: false },
  addImageRoute: { type: String, required: false },
  editResourceRoute: { type: String, required: false },
});

// edit button clicked
const clickedEditButton = (record) => {
  const options = {
    replace: true,
  };
  router.get(props.editResourceRoute, options);
};

// details button clicked
const clickedGoBack = () => {
  popRoute();
};
</script>
