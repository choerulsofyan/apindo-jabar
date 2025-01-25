import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "node_modules/admin-lte/dist/js/adminlte.min.js",
                "node_modules/admin-lte/dist/css/adminlte.min.css",
                "resources/css/public.css", // New entry point for public pages
            ],
            refresh: true,
        }),
    ],
    css: {
        postcss: {}, // Vite will automatically pick up `postcss.config.js`
    },
});
