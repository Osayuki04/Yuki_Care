/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{html,php,js}",
    "./src/**/*.{html,php,js}",
    "./public/**/*.{html,php,js}",
    "./pages/**/*.{html,php,js}",
    "./components/**/*.{html,php,js}",
    "./home/**/*.{html,php,js}",
    "./about/**/*.{html,php,js}",
    "./contact/**/*.{html,php,js}",
    "./services/**/*.{html,php,js}",
    "./utility/**/*.{html,php,js}",
    "./admin/**/*.{html,php,js}",
    "./auth/**/*.{html,php,js}"
  ],
  darkMode: 'class',
  theme: {
    extend: {
      // Custom Color Palettes - Based on Logo Colors
      colors: {
        // Primary Color - Logo Teal/Green rgb(0,111,106) = #006f6a
        'primary': {
          50:  '#f0fdfc',   // Very light teal       ▓▓▓▓▓
          100: '#ccfbf1',   // Light teal            ▓▓▓▓▓
          200: '#99f6e4',   // Soft teal             ▓▓▓▓▓
          300: '#5eead4',   // Light medium teal     ▓▓▓▓▓
          400: '#2dd4bf',   // Medium teal           ▓▓▓▓▓
          500: '#006f6a',   // Logo teal (main)      ▓▓▓▓▓
          600: '#005d58',   // Darker teal           ▓▓▓▓▓
          700: '#004b46',   // Dark teal             ▓▓▓▓▓
          800: '#003934',   // Very dark teal        ▓▓▓▓▓
          900: '#002722',   // Darkest teal          ▓▓▓▓▓
        },

        // Secondary Color - Logo Gold rgb(231,168,42) = #e7a82a
        'secondary': {
          50:  '#fffbeb',   // Very light gold       ▓▓▓▓▓
          100: '#fef3c7',   // Light gold            ▓▓▓▓▓
          200: '#fde68a',   // Soft gold             ▓▓▓▓▓
          300: '#fcd34d',   // Light medium gold     ▓▓▓▓▓
          400: '#fbbf24',   // Medium gold           ▓▓▓▓▓
          500: '#e7a82a',   // Logo gold (main)      ▓▓▓▓▓
          600: '#d97706',   // Darker gold           ▓▓▓▓▓
          700: '#b45309',   // Dark gold             ▓▓▓▓▓
          800: '#92400e',   // Very dark gold        ▓▓▓▓▓
          900: '#78350f',   // Darkest gold          ▓▓▓▓▓
        },

        // Accent Color - Medical Blue (complementary to teal/gold)
        'accent': {
          50:  '#eff6ff',   // Very light blue       ▓▓▓▓▓
          100: '#dbeafe',   // Light blue            ▓▓▓▓▓
          200: '#bfdbfe',   // Soft blue             ▓▓▓▓▓
          300: '#93c5fd',   // Light medium blue     ▓▓▓▓▓
          400: '#60a5fa',   // Medium blue           ▓▓▓▓▓
          500: '#3b82f6',   // Accent blue           ▓▓▓▓▓
          600: '#2563eb',   // Darker blue           ▓▓▓▓▓
          700: '#1d4ed8',   // Dark blue             ▓▓▓▓▓
          800: '#1e40af',   // Very dark blue        ▓▓▓▓▓
          900: '#1e3a8a',   // Darkest blue          ▓▓▓▓▓
        },

        // Legacy color aliases for backward compatibility
        'yuki': {
          50:  '#f0fdfc',   // Maps to primary-50 (teal)
          100: '#ccfbf1',   // Maps to primary-100
          200: '#99f6e4',   // Maps to primary-200
          300: '#5eead4',   // Maps to primary-300
          400: '#2dd4bf',   // Maps to primary-400
          500: '#006f6a',   // Maps to primary-500 (logo teal)
          600: '#005d58',   // Maps to primary-600
          700: '#004b46',   // Maps to primary-700
          800: '#003934',   // Maps to primary-800
          900: '#002722',   // Maps to primary-900
        },

        'carte': {
          50:  '#fffbeb',   // Maps to secondary-50 (gold)
          100: '#fef3c7',   // Maps to secondary-100
          200: '#fde68a',   // Maps to secondary-200
          300: '#fcd34d',   // Maps to secondary-300
          400: '#fbbf24',   // Maps to secondary-400
          500: '#e7a82a',   // Maps to secondary-500 (logo gold)
          600: '#d97706',   // Maps to secondary-600
          700: '#b45309',   // Maps to secondary-700
          800: '#92400e',   // Maps to secondary-800
          900: '#78350f',   // Maps to secondary-900
        },

        'medical': {
          50:  '#eff6ff',   // Maps to accent-50 (blue)
          100: '#dbeafe',   // Maps to accent-100
          200: '#bfdbfe',   // Maps to accent-200
          300: '#93c5fd',   // Maps to accent-300
          400: '#60a5fa',   // Maps to accent-400
          500: '#3b82f6',   // Maps to accent-500
          600: '#2563eb',   // Maps to accent-600
          700: '#1d4ed8',   // Maps to accent-700
          800: '#1e40af',   // Maps to accent-800
          900: '#1e3a8a',   // Maps to accent-900
        }

      },

      // Custom Font Families
      fontFamily: {
        'sans': ['Poppins', 'Inter', 'system-ui', 'sans-serif'],
        'display': ['Montserrat', 'sans-serif'],
      },

      // Custom Animations
      animation: {
        'float': 'float 3s ease-in-out infinite',
        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
        'gradient': 'gradient 8s ease infinite',
        'slide-down': 'slideDown 0.3s ease-out',
      },

      // Custom Background Images
      backgroundImage: {
        'logo': "url('./image.png')",
        'hero-pattern': "url('./assets/hero-bg.jpg')",
        'medical-pattern': "url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23f0f9ff\" fill-opacity=\"0.4\"%3E%3Ccircle cx=\"30\" cy=\"30\" r=\"2\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')",
      },

      // Custom Keyframes
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-10px)' },
        },
        gradient: {
          '0%, 100%': { 'background-position': '0% 50%' },
          '50%': { 'background-position': '100% 50%' },
        },
        slideDown: {
          '0%': { opacity: '0', transform: 'translateY(-10px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
      },
    },
  },
  plugins: [],
}

