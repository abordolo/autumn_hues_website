<template>
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="flow-root mt-8">
      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
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
                  <button
                    @click="editButtonClicked(record)"
                    :class="buttonClasses"
                  >
                    Edit
                    <span class="sr-only"> Edit Record </span>
                  </button>
                  <!-- edit button -->

                  <!-- details button -->
                  <button
                    @click="detailsButtonClicked(record)"
                    :class="buttonClasses"
                  >
                    Details
                    <span class="sr-only"> Record Details </span>
                  </button>
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
  const name = column['name'];
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

// button classes
const buttonClasses = computed(() => {
  return [
    'inline-flex items-center px-2 py-1.5 border border-transparent text-xs font-medium shadow-sm text-white bg-primary-500 hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-primary-500',
  ];
});
</script>
