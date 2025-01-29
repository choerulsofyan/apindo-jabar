import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/admin/app.scss",
                "resources/js/admin/app.js",
                "node_modules/admin-lte/dist/js/adminlte.min.js",
                "node_modules/admin-lte/dist/css/adminlte.min.css",
                "resources/sass/public/app.scss",
            ],
            refresh: true,
        }),
    ],
    css: {
        postcss: {}, // Vite will automatically pick up `postcss.config.js`
    },
});
