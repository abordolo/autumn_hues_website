<template>
  <Section class="text-gray-200">
    <Container class="relative min-h-[280px] py-8 lg:py-12">
      <!-- background image -->
      <div class="absolute inset-0 xl:px-4">
        <img
          src="/images/footer.png"
          alt=""
          class="object-cover object-center w-full h-full"
        />
      </div>
      <!-- background image -->

      <!-- contents -->
      <div class="relative z-20 px-0 lg:px-8">
        <div class="space-y-12 md:space-y-8">
          <!-- logo and menu items -->
          <div
            class="flex flex-col items-start space-y-8 md:flex-row md:space-y-0 md:justify-between"
          >
            <Logo />

            <!-- menu items -->
            <div
              class="flex flex-col space-y-6 md:flex-row md:space-x-16 md:space-y-0 lg:space-x-20"
            >
              <template
                v-for="(item, index) in items"
                :key="`footer-item-${index}`"
              >
                <!-- single block -->
                <div class="space-y-2">
                  <Small class="font-bold">{{ item.heading }}</Small>
                  <!-- links -->
                  <div class="space-y-1">
                    <template
                      v-for="(link, index) in item.links"
                      :key="`footer-link-${item.heading}-${index}`"
                    >
                      <div
                        class="transition-colors duration-300 hover:text-primary-500"
                      >
                        <InertiaLink :href="link.url">
                          <Small class="font-medium">{{ link.title }}</Small>
                        </InertiaLink>
                      </div>
                    </template>
                  </div>
                  <!-- links -->
                </div>

                <!-- single block -->
              </template>
            </div>
            <!-- menu items -->
          </div>
          <!-- logo and menu items -->

          <!-- communication and copyright -->
          <div
            class="flex flex-col justify-between space-y-12 md:space-y-0 md:items-end md:flex-row"
          >
            <!-- communication -->
            <div class="space-y-6">
              <template
                v-for="(communicationItem, index) in communicationItems"
                :key="`communicationItem-${index}`"
              >
                <!-- single communication item -->
                <div>
                  <img :src="communicationItem.icon" />

                  <!-- communication lines -->
                  <div class="mt-2">
                    <template
                      v-for="(line, index) in communicationItem.lines"
                      :key="`line-${communicationItem.icon}-${index}`"
                    >
                      <ExtraSmall>{{ line }}</ExtraSmall>
                    </template>
                  </div>
                  <!-- communication lines -->
                </div>
                <!-- single communication item -->
              </template>
            </div>
            <!-- communication -->

            <!-- copyright -->
            <div>
              <ExtraSmall class="italic text-gray-500">
                All Rights Reserved &copy; 2021 Autumn Hues
              </ExtraSmall>
            </div>
            <!-- copyright -->
          </div>
          <!-- communication and copyright -->
        </div>
      </div>
      <!-- contents -->
    </Container>
  </Section>
</template>

<script setup>
// imports
import Logo from '@/Components/Site/Logo/Index.vue';

// items
const items = [
  {
    heading: 'Quick Links',
    links: [
      {
        title: 'Product Categories',
        url: '/product-categories',
      },
      {
        title: 'About Us',
        url: '/about-us',
      },
    ],
  },
  {
    heading: 'Social Media',
    links: [
      {
        title: 'Instagram',
        url: '/product-categories',
      },
      {
        title: 'Facebook',
        url: '/about-us',
      },
    ],
  },
  {
    heading: 'Legal',
    links: [
      {
        title: 'Terms & Conditions',
        url: '/product-categories',
      },
      {
        title: 'Return Policy',
        url: '/about-us',
      },
    ],
  },
];

const communicationItems = [
  {
    icon: '/icons/location.svg',
    lines: ['Address line 1', 'Address line 2', 'Address line 3'],
  },

  {
    icon: '/icons/phone.svg',
    lines: ['1234567890'],
  },

  {
    icon: '/icons/mail.svg',
    lines: ['info@autumnhues.com'],
  },
];
</script>
