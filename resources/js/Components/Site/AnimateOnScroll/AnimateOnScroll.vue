<!-- usage
  <AnimateOnScroll :delay="300" animateFrom="translate-x-2" :threshold="0.75"></AnimateOnScroll>
 -->

<template>
  <div
    class="transition-all duration-1000"
    :class="[classList]"
    ref="target"
  >
    <slot />
  </div>
</template>
<script setup>
import { onMounted, ref } from 'vue';

const props = defineProps({
  delay: { type: Number, default: null },
  animateFrom: { type: String, default: 'translate-y-2' },
  threshold: { type: Number, default: 0.5 },
  sequence: { type: [Number, String], default: 1 },
});

let target = ref(null);
let classList = `opacity-0 ${props.animateFrom}`;

// variable
let delayToApply = 100;
if (props.delay) {
  delayToApply = props.delay;
} else {
  if (typeof props.sequence === 'string') {
    delayToApply = delayToApply * Number(props.sequence);
  } else if (typeof props.sequence === 'number') {
    delayToApply = delayToApply * props.sequence;
  }
}

onMounted(() => {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          setTimeout(() => {
            classList
              .split(/\s+/)
              .forEach((c) => entry.target.classList.remove(c));
            observer.unobserve(entry.target);
          }, delayToApply);
        }
      });
    },
    {
      threshold: props.threshold,
    }
  );

  observer.observe(target.value);
});
</script>
