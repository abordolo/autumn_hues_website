<template>
  <div>
    <swiper-container init="false">
      <swiper-slide
        v-for="image in images"
        :key="image.id"
      >
        <div>
          <img
            :src="image.path"
            alt="Product Image"
            class="object-cover w-full h-full"
          />
        </div>
      </swiper-slide>
    </swiper-container>
  </div>
</template>

<script setup>
// imports
import { register } from 'swiper/element/bundle';
import { Navigation, Pagination, A11y } from 'swiper/modules';
import { onMounted } from 'vue';

// props
const props = defineProps({
  images: { type: Array, default: [] },
});

register();

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
