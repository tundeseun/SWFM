/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php', // Make sure Blade views are included
    './resources/js/**/*.{vue,js}',     // Vue components and JS files
    './resources/css/**/*.css',         // Other CSS files
  ],
  theme: {
    extend: {
      colors: {
        primary: '#00ff99', // Custom color
      },
      fontFamily: {
        sans: ['Montserrat', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
