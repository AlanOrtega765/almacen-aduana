const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        colors: {
            primary: "#023373",
            secondary: "#3B5E8C",
            tertiary: "#EBEEF3",
            red: "#D91818",
            "dark-blue": "#172538",
            "soft-black": "#0D0D0D",
            gray: "#DDD",
            "dark-gray": "#AAAEB7",
            "light-gray": "#ECECEC",
            "very-light-gray": "#f8f8f8 ",
            "just-white": "#FFFFFF",
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
