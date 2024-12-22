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
        sans: ['Inter', ...defaultTheme.fontFamily.sans],
      },

      screens: {
        xs: '480px',
        '3xl': '1920px',
      },

      colors: {
        primary: {
          50: '#fdf2e9',
          100: '#fcd5b4',
          200: '#fac880',
          300: '#f8bb4b',
          400: '#f5ad16',
          500: '#D97706',
          600: '#b66005',
          700: '#934904',
          800: '#703203',
          900: '#4d1b02',
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
