const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                montserrat: ['Montserrat']
            },

            colors : {
                purple: {
                    DEFAULT: '#4C33C7',
                    'dark': '#170088',
                    'light': '#F3F2F8',
                },
            },

            boxShadow : {
                DEFAULT: '6px 6px 15px rgba(0, 0, 0, 0.15)'
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
