<template>
  <div v-if="filters">
    <!-- debug -->
    <DebugGrid v-if="debug">
      <DebugPanel
        title="Filters"
        :data="filters"
      />
      <DebugPanel
        title="Form"
        :data="form"
      />
      <DebugPanel
        title="Page"
        :data="usePage().url"
      />
    </DebugGrid>
    <!-- debug -->

    <!-- button and count -->
    <div class="flex items-center space-x-2">
      <!-- button -->
      <div
        @click="searchFormVisible = !searchFormVisible"
        class="inline-flex items-center px-4 py-2 space-x-1 transition-colors duration-300 border rounded cursor-pointer select-none"
        :class="{
          'border-primary-500': searchFormVisible,
        }"
      >
        <MagnifyingGlassIcon class="size-5" />
        <p class="text-sm font-semibold">Search</p>
      </div>
      <!-- button -->

      <div>
        <LoadingIndicator v-if="processing" />
        <p
          v-else
          class="text-sm font-medium text-gray-500"
        >
          (Found {{ count }} records)
        </p>
      </div>
    </div>
    <!-- button and count -->

    <!-- form section -->
    <Transition
      enter-active-class="animate__animated animate__fadeIn animate__faster"
    >
      <div
        v-if="searchFormVisible"
        class="px-6 py-4 mt-4 border rounded"
      >
        <div class="flex items-center justify-between">
          <p class="text-xs font-medium text-gray-500">Search By</p>

          <button
            @click="clearSearch"
            class="text-sm font-medium text-primary-500"
          >
            Clear Search
          </button>
        </div>

        <!-- form -->
        <div class="mt-4">
          <form>
            <div class="flex flex-wrap gap-8">
              <template
                v-for="(filter, index) in filters"
                :key="`filter-${index}`"
              >
                <FormInput
                  v-model="form[filter.parameter]"
                  :label="filter.label"
                  :id="filter.label"
                  :name="filter.label"
                />
              </template>
            </div>
          </form>
        </div>
        <!-- form -->
      </div>
    </Transition>
    <!-- form section  -->
  </div>
</template>

<script setup>
// imports
import { ref, watch, computed } from 'vue';
import debounce from 'lodash/debounce';
import { usePage, router, useForm } from '@inertiajs/vue3';
import { MagnifyingGlassIcon } from '@heroicons/vue/24/outline';
import LoadingIndicator from '../LoadingIndicator.vue';

// props
const props = defineProps({
  filters: { type: Object },
  count: { type: Number },
});

// debug
const debug = ref(false);

// showing search fields
const searchFormVisible = ref(false);

// processing
const processing = ref(false);

// form
const form = useForm({});

if (props.filters && props.filters.length) {
  props.filters.forEach((filter) => {
    let parameter = filter.parameter;
    let value = filter.value;

    form[parameter] = value;
  });
}

// search
const search = () => {
  if (processing.value) return;

  const url = usePage().url;
  const baseUrl = url.split('?')[0];

  const options = {
    preserveState: true,
    preserveScroll: true,
    replace: true,
    onSuccess: () => {
      processing.value = false;
    },
  };

  let data = {};
  props.filters.forEach((filter) => {
    let parameter = filter.parameter;
    let value = form[parameter];

    if (value) data[parameter] = value;
  });

  processing.value = true;
  router.get(baseUrl, data, options);
};

// watch form
watch(form, debounce(search, 500), { deep: true });

const clearSearch = () => {
  searchFormVisible.value = false;

  let needSearch = false;
  props.filters.forEach((filter) => {
    let parameter = filter.parameter;
    needSearch = form[parameter] != null;
    form[parameter] = null;
  });

  if (needSearch) search();
};
</script>
