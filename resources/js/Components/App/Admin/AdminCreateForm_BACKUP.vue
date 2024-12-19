<template>
  <div>
    <!-- debug -->
    <DebugGrid
      v-if="debug"
      :colsCount="3"
    >
      <DebugPanel
        title="Fields"
        :data="fields"
      />
      <DebugPanel
        title="Form"
        :data="form"
      />
      <DebugPanel
        title="PageData"
        :data="usePage()"
      />
    </DebugGrid>
    <!-- debug -->

    <!-- form -->
    <div>
      <form @submit.prevent="submit">
        <!-- fields -->
        <div class="space-y-6">
          <template
            v-for="field in fields"
            :key="field.label"
          >
            <!-- single field -->

            <!-- text input -->
            <FormInput
              v-if="
                field.type === 'text' ||
                field.type === 'email' ||
                field.type === 'tel' ||
                field.type === 'password'
              "
              v-model="form[field.parameter]"
              :label="field.label"
              :textarea="field.textarea"
              :disabled="form.processing"
              :mandatory="field.mandatory"
              :placeholder="field.placeholder"
              :error="form.errors[field.parameter]"
              @textChanged="form.clearErrors(field.parameter)"
            />
            <!-- text input -->

            <!-- select field -->
            <FormSelect
              v-if="field.type == 'select'"
              v-model="form['selected_' + field.parameter]"
              :label="field.label"
              :options="field.options"
              :mandatory="field.mandatory"
              :placeholder="field.placeholder"
              :error="form.errors[field.parameter]"
              @optionSelected="
                (option) => {
                  form.clearErrors(field.parameter);
                  form[field.parameter] = option.value;
                }
              "
            />
            <!-- select field -->

            <!-- boolean field -->
            <FormToggle
              v-if="field.type == 'boolean'"
              :label="field.label"
              :active="form[field.parameter]"
              @toggleClicked="form[field.parameter] = !form[field.parameter]"
            />
            <!-- boolean field -->
            <!-- single field -->
          </template>
        </div>
        <!-- fields -->

        <!-- buttons -->
        <div class="flex items-center mt-8 space-x-4">
          <AppButton type="submit">Create</AppButton>
          <AppButton
            type="button"
            secondary
            @click="popRoute"
          >
            Go Back
          </AppButton>
        </div>
        <!-- buttons -->
      </form>
    </div>
    <!-- form -->
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';
import { popRoute } from '@/Helpers/NavigationHelpers';
import { useForm, router, usePage } from '@inertiajs/vue3';
import { showWarningNotification } from '@/Helpers/NotificationHelpers';

// props
const props = defineProps({
  // prefix to be prepended to the links and controls - admin prefix name
  urlPrefix: { type: String, required: true },

  // they are received from the server
  // $columns = [
  //   [
  //     'label' => 'Name',
  //     'parameter' => 'name',
  //     'type' => 'text',
  //     'mandatory' => true,
  //   ],
  //   [
  //     'label' => 'Description',
  //     'parameter' => 'description',
  //     'type' => 'text',
  //     'mandatory' => false,
  //   ],
  // ];
  fields: { type: Array, default: () => [] },
});

// debug
const debug = ref(false);

// emits
const emit = defineEmits(['success', 'error']);

// form
let formParameters = {};
props.fields.forEach((field) => {
  if (field.type == 'select') {
    // in case of select field keeping 2 parameters
    // one for the selected option and the other for the value
    // the value field will be populated at the time of submission
    formParameters['selected_' + field.parameter] = null;
  }

  if (field.type == 'boolean') {
    formParameters[field.parameter] = field.active;
  } else {
    formParameters[field.parameter] = null;
  }
});
const form = useForm(formParameters);

// submit
const submit = () => {
  // check if the form is dirty
  // if not show a notification
  if (!form.isDirty) {
    showWarningNotification('Please start filling the form.');
    return;
  }

  // for the select fields modify the parameters to hold only the value instead of the selected option
  props.fields.forEach((field) => {
    if (field.type === 'select') {
      let currentKey = 'select-' + field.parameter;
      let keyToSentToServer = field.parameter;

      if (form[currentKey]) {
        console.log('Inserting');
        form[keyToSentToServer] = form[currentKey].value;
      }
    }
  });

  // console.log(form);

  const url = `${props.urlPrefix}`;
  const options = {
    preserveScroll: true,

    onSuccess: () => {
      form.reset();
      emit('success');

      // to to the show page
      let newUserRoleId = usePage().props.flashData.data;
      // console.log('New User Role ID:', newUserRoleId);
      const showPageUrl = `${url}/${newUserRoleId}`;
      router.get(showPageUrl, {}, { replace: true });
    },

    onError: (e) => {
      // console.log(e);
      emit('error');
    },
  };

  form.post(url, options);
};
</script>
