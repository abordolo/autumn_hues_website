<template>
  <div :class="classes">
    <slot />
  </div>
</template>

<script setup>
// imports
import { computed } from 'vue';

// props
const props = defineProps({
  colsCount: { type: Number, default: 6 },
});

// classes
const classes = computed(() => {
  let baseClasses = [
    // 'bg-gray-200',
    'grid',
    'gap-4',
    'my-6',
    // 'fixed',
    // 'bottom-0',
    // 'left-0',
    // 'right-0',
    // 'z-50',
    // 'h-96',
    // 'h-[440px]',
    'overflow-y-auto',
  ];

  // switch props.colsCount
  // switch (props.colsCount) {
  //   case 1:
  //     baseClasses.push('grid-cols-1');
  //     break;
  //   case 2:
  //     baseClasses.push('grid-cols-2');
  //     break;
  //   case 3:
  //     baseClasses.push('grid-cols-3');
  //     break;
  //   case 4:
  //     baseClasses.push('grid-cols-4');
  //     break;
  //   case 5:
  //     baseClasses.push('grid-cols-5');
  //     break;
  //   case 6:
  //     baseClasses.push('grid-cols-6');
  //     break;
  //   default:
  //     baseClasses.push('grid-cols-4');
  // }

  const colClasses = {
    1: 'grid-cols-1',
    2: 'grid-cols-2',
    3: 'grid-cols-3',
    4: 'grid-cols-4',
    5: 'grid-cols-5',
    6: 'grid-cols-6',
  };

  baseClasses.push(colClasses[props.colsCount]);

  return baseClasses;
});
</script>
