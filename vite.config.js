import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/admin/admin-app.scss",
                "resources/js/admin/app.js",
                "node_modules/admin-lte/dist/js/adminlte.min.js",
                "node_modules/admin-lte/dist/css/adminlte.min.css",
                "resources/sass/public/public-app.scss",
                "resources/js/public/swiper.js",
                "resources/js/public/app.js",
            ],
            refresh: true,
        }),
    ],
    css: {
        postcss: {}, // Vite will automatically pick up `postcss.config.js`
    },
    resolve: {
        alias: {
            // "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
            // "~admin-lte": path.resolve(__dirname, "node_modules/admin-lte"),
            // "~quill": path.resolve(__dirname, "node_modules/quill"),
            "~swiper": path.resolve(__dirname, "node_modules/swiper"),
            "~lightbox2": path.resolve(__dirname, "node_modules/lightbox2"), // Add alias for lightbox2
        },
    },
});
