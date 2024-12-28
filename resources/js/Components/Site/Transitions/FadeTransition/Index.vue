<template>
  <transition
    enter-from-class="opacity-0"
    enter-to-class="opacity-100"
    enter-active-class="transition duration-300 ease-out"
    leave-from-class="opacity-100"
    leave-to-class="opacity-0"
    leave-active-class="transition duration-300 ease-out"
  >
    <slot />
  </transition>
</template>
