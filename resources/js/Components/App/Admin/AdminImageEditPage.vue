<template>
  <div>
    <!-- debug -->
    <DebugGrid v-if="debug">
      <DebugPanel
        title="Prop Object"
        :data="object"
      />
      <DebugPanel
        title="Fields"
        :data="fields"
      />
    </DebugGrid>
    <!-- debug -->

    <!-- forms -->
    <div class="space-y-6">
      <template
        v-for="field in fields"
        :key="field.columnName"
      >
        <div class="p-6 border rounded bg-gray-50">
          <!-- image - just to show the current image -->
          <div>
            <img
              :src="field.value"
              class="rounded"
              :class="{
                'h-10': field.columnName === 'icon',
                'h-24': field.columnName === 'thumbnail_image',
                'h-64': !['icon', 'thumbnail_image'].includes(field.columnName),
              }"
            />
          </div>
          <!-- image - just to show the current image -->

          <!-- edit form -->
          <div class="mt-4">
            <AdminImageEditForm
              :resourceId="object.id"
              :field="field"
              :urlPrefix="urlPrefix"
            />
          </div>
          <!-- edit form -->
        </div>
      </template>
    </div>
    <!-- forms -->
  </div>
</template>

<script setup>
// imports
import { computed, ref } from 'vue';
import { getFormattedColumnName, getColumnType } from './AdminHelpers';
import AdminImageEditForm from './AdminImageEditForm.vue';

// props
const props = defineProps({
  object: { type: Object, required: true },
  urlPrefix: { type: String, required: true },
});

// debug
const debug = ref(false);

// fields
// array of image fields
// of the type: [{columnName: 'icon', formattedColumnName: 'Image 1', value: 'image1.jpg'}, ...]
const fields = computed(() => {
  let fieldsArray = [];

  // check if the props.object is empty
  if (!props.object || Object.keys(props.object).length === 0) {
    return [];
  }

  // iterate over the columns (keys of the object) and collect the image fields
  // foreach object keys
  Object.keys(props.object).map((key) => {
    let columnType = getColumnType(key);

    // collect only the image fields
    if (columnType == 'image') {
      let obj = {
        // this is the actual name of the column in database
        columnName: key,

        // this will be the label in the form field
        formattedColumnName: getFormattedColumnName(key),

        // value in the database
        value: props.object[key],
      };

      fieldsArray.push(obj);
    }
  });
  // foreach object keys

  return fieldsArray;
});
</script>
