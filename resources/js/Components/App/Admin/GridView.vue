<template>
  <div>
    <!-- empty data -->
    <div v-if="data.length == 0">
      <p>We did not find any record.</p>
    </div>
    <!-- empty data -->

    <!-- table -->
    <div v-else>
      <DebugGrid v-if="debug">
        <DebugPanel
          title="Data"
          :data="props.data"
        />
        <DebugPanel
          title="Columns"
          :data="columns"
        />
      </DebugGrid>

      <!-- table -->
      <table class="w-full">
        <!-- header -->
        <thead>
          <tr class="bg-gray-100 border-b">
            <!-- columns -->
            <th
              v-for="column in columns"
              key="column.label"
            >
              <div
                class="p-2 font-semibold text-left border-r border-gray-200 border-right"
              >
                <!-- column name -->
                <span> {{ column.label }}</span>
                <!-- column name -->
              </div>
            </th>
            <!-- columns -->

            <!-- edit header -->
            <th>
              <p
                class="p-2 font-semibold text-center border-r border-gray-200 border-right"
              >
                Edit
              </p>
            </th>
            <!-- edit header -->
          </tr>
        </thead>
        <!-- header -->

        <!-- table body -->
        <tbody>
          <tr
            v-for="(record, recordIndex) in data"
            :key="`record-${recordIndex}`"
            class="transition-colors duration-300 border-b cursor-pointer hover:bg-gray-300"
            :class="{ 'bg-gray-100': recordIndex % 2 != 0 }"
          >
            <!-- single cell -->
            <td
              v-for="column in columns"
              @dblclick="cellDoubleClicked(record.id)"
            >
              <!-- string -->
              <p
                v-if="column.type == 'string'"
                class="px-2 py-3 text-sm"
              >
                {{ record[column.key] }}
              </p>
              <!-- string -->

              <!-- boolean -->
              <p
                v-if="column.type == 'boolean'"
                class="px-2 py-3 text-sm"
                :class="record[column.key] ? 'text-green-600' : 'text-red-600'"
              >
                {{ record[column.key] ? 'Yes' : 'No' }}
              </p>
              <!-- boolean -->

              <!-- image -->
              <img
                v-if="column.type == 'image'"
                :src="record[column.key]"
                class="h-12"
              />
              <!-- image -->
            </td>
            <!-- single cell -->

            <!-- edit button -->
            <td class="z-10">
              <div class="flex items-center justify-center">
                <!-- edit link -->
                <button
                  @click="editButtonClicked(record.id)"
                  class="px-3 py-2 text-sm font-semibold text-white transition-all duration-1000 rounded hover:bg-primary-600 bg-primary-500"
                >
                  Edit
                </button>
                <!-- edit link -->
              </div>
            </td>
            <!-- edit button -->
          </tr>
        </tbody>
        <!-- table body -->
      </table>
      <!-- table -->
    </div>
    <!-- table -->
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';

// props
const props = defineProps({
  data: { type: Array },
  columns: { type: Array },
  urlPrefix: { type: String },
});

// debug
const debug = ref(true);

// emits
const emits = defineEmits(['cellDoubleClicked', 'editButtonClicked']);

// row clicked
const cellDoubleClicked = (id) => {
  emits('cellDoubleClicked', id);
};

// edit button clicked
const editButtonClicked = (id) => {
  emits('editButtonClicked', id);
};
</script>
