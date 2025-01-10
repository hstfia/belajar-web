import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        '../system/vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        '../system/storage/framework/views/*.php',
        '../system/resources/**/*.blade.php',
        '../system/resources/**/*.js',
        '../system/resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
