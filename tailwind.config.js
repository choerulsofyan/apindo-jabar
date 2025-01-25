/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/views/public/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                "font-color-primary": "#256090",
                "font-color-secondary": "#027EB6",
                "whatsapp-green": "#25D366",
                copyright: "#323232",
            },
        },
    },
    plugins: [],
};
