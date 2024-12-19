<template>
  <div v-if="links.length > 3">
    <!-- pagination -->
    <div class="flex flex-wrap items-center gap-3">
      <template
        v-for="link in links.slice(1, -1)"
        :key="link.label"
      >
        <!-- single box -->
        <InertiaLink
          v-if="link.url"
          :href="link.url"
          replace
        >
          <div
            class="grid border rounded size-12 place-items-center"
            :class="{
              'bg-primary-500 text-white': link.active,
            }"
          >
            <Small class="font-medium"> {{ link.label }}</Small>
          </div>
        </InertiaLink>
        <!-- single box -->

        <!-- box with ellipsis -->
        <!-- when the number of pages is more, laravel sends ... for an intermediate link -->
        <div
          v-else
          class="grid border rounded size-12 place-items-center"
          :class="{
            'bg-primary-500 text-white': link.active,
          }"
        >
          <Small class="font-medium"> {{ link.label }}</Small>
        </div>
        <!-- box with ellipsis -->
      </template>
    </div>
    <!-- pagination -->
  </div>
</template>

<script setup>
// props
const props = defineProps({
  // laravel 'links' parameter in paginated data
  links: { type: Array, required: true },

  // todo - code to conditionally show previous and next buttons
  // need to consider link[0] and link[-1] elements
  showPrevNextLinks: { type: Boolean, default: false },
});
</script>
