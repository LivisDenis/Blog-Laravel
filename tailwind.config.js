/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  daisyui: {
      themes: [],
  },
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

