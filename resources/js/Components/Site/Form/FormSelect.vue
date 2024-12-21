<template>
  <div class="relative">
    <!-- label and required indicator -->
    <div class="flex items-center justify-between">
      <label
        v-if="label"
        :for="id ?? label"
        class="block mb-2 text-sm font-medium leading-6 text-gray-900"
      >
        {{ label }}
      </label>

      <!-- required indicator -->
      <div
        v-if="required"
        class="px-1 py-px text-xs border rounded bg-primary-100 border-primary-200"
      >
        Required
      </div>
      <!-- required indicator -->
    </div>
    <!-- label and required indicator -->

    <!-- selected option's label - readonly input -->
    <div
      @click="fieldClicked"
      class="relative flex items-center cursor-pointer select-none"
    >
      <input
        type="text"
        :id="id ?? label"
        :name="name ?? label"
        :value="selectedOption ? selectedOption.label : placeholder"
        class="w-full px-3 bg-transparent border border-gray-300 rounded cursor-pointer select-none focus:ring-1 focus:ring-primary-500"
        :class="{
          'text-gray-400': !selectedOption,
        }"
        readonly
      />

      <ChevronRightIcon
        class="absolute w-5 h-5 text-gray-400 transition duration-300 right-2"
        :class="{
          'transform rotate-90': areOptionsVisible,
        }"
      />
    </div>
    <!-- selected option's label - readonly input -->

    <!-- error -->
    <Transition
      appear
      enter-active-class="animate__animated animate__fadeIn animate__faster"
      leave-active-class="animate__animated animate__fadeOut animate__faster"
    >
      <p
        v-if="props.error"
        class="mt-2 text-sm text-red-500"
      >
        {{ props.error }}
      </p>
    </Transition>
    <!-- error -->

    <!-- options -->
    <Transition
      appear
      enter-from-class="-translate-y-2 opacity-0"
      enter-active-class="transition duration-300 ease-out"
    >
      <div
        v-show="areOptionsVisible"
        ref="elementOptions"
        class="absolute z-10 w-full pb-16 mt-3"
      >
        <div
          class="bg-white max-h-[400px] overflow-auto rounded border shadow-lg"
        >
          <!-- todo: implement search for the options -->
          <template
            v-for="(option, index) in options ?? defaultOptions"
            :key="index"
          >
            <!-- single option -->
            <div
              @click="optionClicked(option)"
              class="px-4 py-3 transition duration-300 cursor-pointer hover:bg-gray-100"
            >
              {{ option.label }}
            </div>
            <!-- single option -->
          </template>
        </div>
      </div>
    </Transition>
    <!-- options -->
  </div>
</template>

<script setup>
// imports
import { ref } from 'vue';
import { ChevronRightIcon } from '@heroicons/vue/24/outline';

// props
const props = defineProps({
  // one of the options
  modelValue: { type: Object },

  // if the model value is not set, placeholder will be shown in the input
  placeholder: { type: String, required: false, default: 'Select item' },

  // by default, label is 'Select'
  label: { type: String, default: 'Form Select' },

  // if id is not passed, label will be used as the id
  id: { type: String, default: null },

  // if name is not passed, label will be used as the name
  name: { type: String, default: null },

  // array of objects with keys: label and value
  // label is what is shown to the user
  // value is what is sent to the server - ideally the id of the resource
  options: { type: Array, default: null },
  error: { type: String, default: null },
  required: { type: Boolean, default: false },
});

// emits
const emits = defineEmits(['update:modelValue', 'optionSelected']);

// default options - will be displayed if options are not passed
const defaultOptions = [
  { label: 'Option 1', value: 1 },
  { label: 'Option 2', value: 2 },
  { label: 'Option 3', value: 3 },
];

// options element
// todo - use the height of the element to set the min height of the body
const elementOptions = ref(null);

// are options visible
const areOptionsVisible = ref(false);

// show options
const showOptions = () => {
  areOptionsVisible.value = !areOptionsVisible.value;
  setTimeout(() => {
    // console.log(
    //   'Height of the options element:',
    //   elementOptions.value.offsetHeight
    // );
    document.addEventListener('click', hideOptions);
  }, 20);
};

// hide options
const hideOptions = () => {
  areOptionsVisible.value = false;
  setTimeout(() => {
    // console.log(
    //   'Height of the options element:',
    //   elementOptions.value.offsetHeight
    // );
    document.removeEventListener('click', hideOptions);
  }, 20);
};

// selected option
// this is the option from the options array whose value matches the model value
// corresponding label will be displayed int he readonly input
const selectedOption = ref(null);
if (props.modelValue) {
  selectedOption.value = props.modelValue;
}

// field clicked
// readonly input clicked to trigger the options visibility
const fieldClicked = () => {
  if (areOptionsVisible.value) {
    hideOptions();
  } else {
    showOptions();
  }
};

// display error
// if there was an error, it will be displayed by default
// when the error is being displayed and user selects an option, it should be hidden
const displayError = ref(true);

// option selected
const optionClicked = (option) => {
  displayError.value = false;
  selectedOption.value = option;
  emits('update:modelValue', option);
  emits('optionSelected', option);
};
</script>
