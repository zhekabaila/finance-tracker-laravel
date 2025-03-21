/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#8B5D33",
        matcha: "#01754F",
        mist: "#D9D9D9",
        heart: "#CA4D4D",
        cream: "#F4F2EE"
      }
    },
  },
  plugins: [],
}