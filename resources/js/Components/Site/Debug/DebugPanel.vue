<template>
  <div class="w-full h-full p-3 bg-white border rounded">
    <Medium class="mb-2 font-bold">{{ title }}</Medium>

    <div class="max-h-[480px] overflow-auto">
      <ExtraSmall class="font-medium whitespace-pre">{{ data }}</ExtraSmall>
    </div>
  </div>
</template>

<script setup>
// props
const props = defineProps({
  title: { type: String, required: true },
  data: { type: [Object, String, null, undefined] },
});
</script>
