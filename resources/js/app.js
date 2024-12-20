import '../css/app.css';
import './bootstrap';

import { components } from './components.js';
import 'animate.css';
import { createPinia } from 'pinia';

import { createInertiaApp, Head, Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

// layouts
import AdminLayout from '@/Components/App/Layouts/AdminLayout/Index.vue';

const pinia = createPinia();

const appName = import.meta.env.VITE_APP_NAME || 'Autumn Hues';

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    let page = pages[`./Pages/${name}.vue`];

    if (name.startsWith('Admin/')) {
      page.default.layout = page.default.layout || AdminLayout;
    }

    return page;
  },
  setup({ el, App, props, plugin }) {
    // create app
    let vueApp = createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .use(pinia)
      .component('InertiaHead', Head)
      .component('InertiaLink', Link);

    // register the custom components
    components.forEach((component) => {
      vueApp.component(component.name, component.component);
    });

    // return the mounted app
    return vueApp.mount(el);

    // return createApp({ render: () => h(App, props) })
    //   .use(plugin)
    //   .use(ZiggyVue)
    //   .mount(el);
  },
  progress: {
    color: '#4B5563',
  },
});
