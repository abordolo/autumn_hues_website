import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },

      screens: {
        xs: '480px',
        '3xl': '1920px',
      },

      colors: {
        primary: {
          50: '#fef2f2',
          100: '#fee2e2',
          200: '#fecaca',
          300: '#fca5a5',
          400: '#f87171',
          500: '#EF4444',
          600: '#DC2626',
          700: '#B91C1C',
          800: '#991B1B',
          900: '#7F1D1D',
        },

        secondary: {
          50: '#fffaf0',
          100: '#fef1d4',
          200: '#fee6b3',
          300: '#fdd78f',
          400: '#fccc6a',
          500: '#EDAE49',
          600: '#E58C29',
          700: '#C26B1D',
          800: '#9C5219',
          900: '#7D4117',
        },
      },
    },
  },

  plugins: [forms],
};
