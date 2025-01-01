<template>
  <div class="max-w-4xl py-16 mx-auto">
    <swiper-container init="false">
      <swiper-slide
        v-for="i in 3"
        :key="i"
      >
        <div class="h-64 bg-gray-100">
          {{ i }}
        </div>
      </swiper-slide>
    </swiper-container>
  </div>
</template>

<script setup>
import { register } from 'swiper/element/bundle';
import { Navigation, Pagination, A11y } from 'swiper/modules';
import { onMounted } from 'vue';

register();

// on mounted
onMounted(() => {
  const swiperEl = document.querySelector('swiper-container');

  const params = {
    modules: [Navigation, Pagination, A11y],
    navigation: true,
    pagination: {
      clickable: true,
    },
    autoplay: {
      delay: 5000,
    },
    a11y: true,
    // effect: 'fade',
    // injectStyles: [
    //   `
    //   .swiper-button-next {
    //     color: red;
    //   }
    // `,
    // ],
    injectStylesUrls: ['/swiper.css'],
  };

  Object.assign(swiperEl, params);

  swiperEl.initialize();
});
</script>
