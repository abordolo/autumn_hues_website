<template>
  <div class="flow-root mt-8">
    <div class="overflow-x-auto">
      <div class="inline-block min-w-full py-2 align-middle">
        <!-- table -->
        <table class="min-w-full divide-y divide-gray-300">
          <!-- header -->
          <thead>
            <tr>
              <th
                v-for="column in columns"
                :key="column.name"
                scope="col"
                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-0"
              >
                {{ column.title }}
              </th>
            </tr>
          </thead>
          <!-- header -->

          <!-- table body -->
          <tbody class="divide-y divide-gray-200">
            <tr
              v-for="(record, index) in data"
              :key="`record-${index}`"
            >
              <!-- single row -->
              <template
                v-for="column in columns"
                :key="`record-${index}-${column.name}`"
              >
                <!-- single cell -->
                <td
                  class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-0"
                  :class="{
                    'text-green-600':
                      column.type == 'boolean' && record[column.key],
                    'text-red-600':
                      column.type == 'boolean' && !record[column.key],
                  }"
                >
                  {{ cellData(record, column) }}
                </td>
                <!-- single cell -->
              </template>

              <!-- buttons -->
              <td
                class="relative py-4 pl-3 pr-4 space-x-2 text-sm font-medium text-right whitespace-nowrap sm:pr-0"
              >
                <!-- edit button -->
                <AppButton
                  small
                  @click="editButtonClicked(record)"
                >
                  Edit
                  <span class="sr-only"> Edit Record </span>
                </AppButton>
                <!-- edit button -->

                <!-- details button -->
                <AppButton
                  small
                  @click="detailsButtonClicked(record)"
                >
                  Details
                  <span class="sr-only"> Record Details </span>
                </AppButton>
                <!-- details button -->
              </td>
              <!-- buttons -->

              <!-- single row -->
            </tr>
          </tbody>
          <!-- table body -->
        </table>
        <!-- table -->
      </div>
    </div>
  </div>
</template>

<script setup>
// imports
import { computed } from 'vue';

// props
const props = defineProps({
  data: { type: Array, required: true },
  columns: { type: Array, required: true },
});

// emits
const emits = defineEmits(['edit', 'details']);

// cell data
const cellData = (record, column) => {
  const type = column['type'];
  const key = column['key'];

  // DO NOT DELETE
  // const keys = key.split('::');
  // let value = record;
  // for (let i = 0; i < keys.length; i++) {
  //   if (value[keys[i]]) {
  //     value = value[keys[i]];
  //   }
  // }

  let value = record[key];

  if (type == 'boolean') {
    value = value ? 'Yes' : 'No';
  } else if (type == 'date') {
    value = new Date(value).toLocaleDateString();
  }

  return value;
};

// edit button clicked
const editButtonClicked = (record) => {
  emits('edit', record);
};

// details button clicked
const detailsButtonClicked = (record) => {
  emits('details', record);
};
</script>
