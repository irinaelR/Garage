/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./application/views/**/*.{html,js,php}",
    './node_modules/preline/dist/*.js'
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          '50': '#f0faff',
          '100': '#e0f4fe',
          '200': '#baebfd',
          '300': '#7cdcfd',
          '400': '#37cbf9',
          '500': '#0caadc', /* default */
          '600': '#0192c8',
          '700': '#0274a2',
          '800': '#066286',
          '900': '#0b516f',
          '950': '#083449'
        },
        secondary: '#0caadc',
        light: {DEFAULT:'#D7FFF1', 'transparent':'#D7FFF178'},
        dark: {DEFAULT: '#1d3354', 'transparent': '#1d335455'},
        accent: '#9381FF'
      }
    },
  },
  plugins: [
    require('preline/plugin')
  ],
}

