/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            'primary': '#339b96',
            'secondary': '#edbd58',
            'pink': '#D95975',
            'white': 'white',
            'gray': '#999999',

          },
      extend: {},
    },
    plugins: [],
  }
