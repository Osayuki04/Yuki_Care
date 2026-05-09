const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{php,html,js,jsx,ts,tsx}"],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        primary: colors.teal,
        secondary: colors.amber,
        accent: colors.rose,
        yuki: colors.emerald,
        carte: colors.orange,
        medical: colors.sky,
      },
    },
  },
  plugins: [],
};
