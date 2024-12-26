<template>
  <div class="relative p-4 bg-gray-100 border">
    <!-- edit button -->
    <div
      v-if="field.edit"
      class="absolute p-2 transition-colors bg-gray-200 cursor-pointer top-2 right-2 hover:text-primary-500"
      @click="showForm = true"
    >
      <PencilIcon class="size-5" />
    </div>
    <!-- edit button -->

    <!-- show contents -->
    <div>
      <Small class="font-semibold text-gray-500">
        {{ field.show?.label }}
      </Small>
      <BodyText class="mt-1">
        {{ field.show?.value }}
      </BodyText>
    </div>
    <!-- show contents -->

    <!-- popup form -->
    <Popup
      v-if="showForm"
      @close="showForm = false"
    >
      <Heading4 class="mb-6">Edit {{ field.show.label }}</Heading4>

      <GenericForm
        :fields="[field.edit]"
        primaryButtonText="Update"
        secondaryButtonText="Cancel"
        :submitUrl="updateRoute"
        submissionMethod="put"
        @secondaryButtonClicked="showForm = false"
        @success="success"
        @error="error"
      />
    </Popup>
    <!-- popup form -->
  </div>
</template>

<script setup>
// imports
import { showSuccessNotification } from '@/Helpers/NotificationHelpers';
import { PencilIcon } from '@heroicons/vue/24/outline';
import { ref, computed } from 'vue';

// props
const props = defineProps({
  field: {
    type: Object,
    default: {
      show: {
        label: 'Dummy Label',
        type: 'text',
        value: 'Dummy Value',
      },

      edit: {
        label: 'Dummy Name',
        type: 'text',
        parameter: 'name',
        value: 'value',
        placeholder: 'Enter Name',
      },
    },
  },

  updateRoute: { type: String, default: '#' },
});

// show form
const showForm = ref(false);

// form fields
const formFields = computed(() => {
  return [
    {
      label: props.field.label,
      type: props.field.type,
      parameter: props.field.parameter,
      value: props.field.show.value,
      placeholder: props.field.label,
    },
  ];
});

// success
const success = () => {
  showForm.value = false;
  showSuccessNotification('Record updated successfully');
};

// error
const error = () => {
  showWarningNotification('There was an error while updating the record');
};
</script>
