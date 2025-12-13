/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#5fcf86',
                    dark: '#4fb872',
                },
            },
            fontFamily: {
                'manrope': ['Manrope', 'sans-serif'],
                'roboto': ['Roboto', 'sans-serif'],
            },
        },
    },
    plugins: [],
}