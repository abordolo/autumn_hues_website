<template>
  <div>
    <!-- meta -->
    <InertiaHead>
      <title>Test Page</title>
      <meta
        name="description"
        content="Home page"
      />
    </InertiaHead>
    <!-- meta -->
    <Section class="py-12">
      <Container>
        <Heading1>Test Page</Heading1>

        <div class="mt-8">
          <AppButton @click="showPopup = true">Show Popup</AppButton>

          <GenericForm
            :fields="fields"
            :primaryButtonText="primaryButtonText"
            :secondaryButtonText="secondaryButtonText"
            :submitUrl="submitUrl"
            :submissionMethod="submissionMethod"
            @secondaryButtonClicked="showPopup = false"
          />

          <Popup
            v-if="showPopup"
            @close="showPopup = false"
          >
            <GenericForm
              :fields="fields"
              :primaryButtonText="primaryButtonText"
              :secondaryButtonText="secondaryButtonText"
              :submitUrl="submitUrl"
              :submissionMethod="submissionMethod"
              @secondaryButtonClicked="showPopup = false"
            />
          </Popup>
        </div>
      </Container>
    </Section>
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';

// variables
const fields = [
  {
    label: 'Name',
    type: 'text',
    parameter: 'name',
    value: null,
    placeholder: 'Enter name',
  },

  {
    label: 'Description',
    type: 'textarea',
    parameter: 'name',
    value: null,
    placeholder: 'Enter name',
  },
];

const primaryButtonText = 'Submit';
const secondaryButtonText = 'Cancel';
const submitUrl = route('admin.product-skus.update', { product_sku: 1 });
const submissionMethod = 'put';

// popup
const showPopup = ref(true);
</script>
