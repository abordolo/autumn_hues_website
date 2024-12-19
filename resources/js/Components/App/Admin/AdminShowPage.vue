<template>
  <div class="min-h-screen pt-2 pb-32">
    <!-- information -->
    <div class="space-y-6">
      <template
        v-for="field in fields"
        :key="field.name"
      >
        <!-- single information -->
        <div class="pb-2 border-b">
          <!-- label -->
          <ExtraSmall class="font-semibold text-gray-500">
            {{ field.formattedName }}
          </ExtraSmall>
          <!-- label -->

          <!-- image -->
          <div
            v-if="field.type == 'image'"
            class="mt-2"
          >
            <img
              :src="field.value"
              class="rounded"
              :class="{
                'h-16': field.name === 'icon',
                'h-32': field.name === 'thumbnail_image',
                'h-64': !['icon', 'thumbnail_image'].includes(field.name),
              }"
            />
          </div>
          <!-- image -->

          <!-- text -->
          <BodyText v-else>{{ field.value }} </BodyText>
          <!-- text -->
        </div>
        <!-- single information -->
      </template>
    </div>
    <!-- information -->

    <!-- buttons -->
    <div class="flex items-center mt-10 space-x-4">
      <!-- add new button -->
      <AppButton
        link
        :href="`${urlPrefix}/${object.id}/edit`"
      >
        Edit
      </AppButton>
      <!-- add new button -->

      <!-- dashboard link -->
      <AppButton
        secondary
        @click="popRoute"
      >
        Go Back
      </AppButton>
      <!-- dashboard link -->
    </div>
    <!-- buttons -->
  </div>
</template>

<script setup>
// imports
import { computed } from 'vue';
import { popRoute } from '@/Helpers/NavigationHelpers';
import {
  getFormattedColumnName,
  getColumnType,
  getFormattedData,
} from '@/Components/App/Admin/AdminHelpers.js';

// props
const props = defineProps({
  // prefix to be prepended to the links and controls - admin prefix name
  urlPrefix: { type: String, required: true },

  // the object whose details are to be displayed
  // this is a database row - maybe with relationships
  object: { type: Object, required: true },

  // columns that we do not want to show
  // opt to now show relations as well, because they are treated separately
  skipColumns: { type: Array, default: () => [] },

  // specify if the data passed has relationships that need to be displayed
  // of the form [{ name: 'relation_name', lookupColumn: 'column_name' }]
  relations: { type: Array, default: () => [] },
});

// fields
const fields = computed(() => {
  let fieldsArray = [];

  // iterate over the keys of the object pass
  // which are the column names
  Object.keys(props.object).forEach((columnName) => {
    // skip the columns that are in skipColumns
    if (props.skipColumns.includes(columnName)) return;

    // push the details of the column
    fieldsArray.push({
      name: columnName,
      formattedName: getFormattedColumnName(columnName),
      type: getColumnType(columnName),
      value: getFormattedData(
        props.object[columnName],
        getColumnType(columnName)
      ),
    });

    // if column name is 'id', then push the details of the relations as well
    if (columnName == 'id' && props.relations.length) {
      props.relations.forEach((relation) => {
        let relationName = relation.name;
        let lookupColumn = relation.lookupColumn;
        let value = 'ERROR';

        // this is to check that the correct relationship name and lookup column are passed
        // check if the relation exists
        if (relationName in props.object) {
          // check if the lookup column exists in the relation
          if (lookupColumn in props.object[relationName]) {
            value = props.object[relationName][lookupColumn];
          } else {
            console.log('Lookup column not found in relation: ' + relationName);
          }
        } else {
          console.log('Relation not found: ' + relationName);
        }

        fieldsArray.push({
          name: relationName,
          formattedName: getFormattedColumnName(relationName) + ' [Relation]',
          type: 'relation',
          value: value,
        });
      });
    }
  });

  return fieldsArray;
});
</script>
