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
        backgroundImage: {
            'indigo-block': "url('/public/images/indigo-block.png')",
            'green-block': "url('/public/images/green-block.png')",
            'yellow-block': "url('/public/images/yellow-block.png')",
        }
    },
  },
    plugins: [require("@tailwindcss/forms")],
}
