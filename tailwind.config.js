const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#0ea5e9',
                heading: "#0f172a",
                paragraph: "#334155"
            },
        },
        container:{
            center: true,
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
