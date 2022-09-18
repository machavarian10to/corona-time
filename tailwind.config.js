/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        fontFamily: {
            'inter': ['Inter', 'sans-serif']
        },
        colors: {
            'custom-grey':'#808189',
            'custom-indigo':'#2029F3',
            'custom-green': '#0FBA68',
            'custom-yellow': '#EAD621',
            'table-header': '#F6F6F7'
        },
    },
  },
    plugins: [require("@tailwindcss/forms")],
}
