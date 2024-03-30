import { defineConfig } from "vite";
import { fileURLToPath, URL } from "node:url";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import path from "path";

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@": fileURLToPath(
                new URL("./resources/js/Pages", import.meta.url),
            ),
            "@dashboardCentralPageComponents": fileURLToPath(
                new URL(
                    "./resources/js/Pages/components/centralPages/dashboard",
                    import.meta.url,
                ),
            ),
            "ziggy-js": path.resolve("vendor/tightenco/ziggy"),
        },
    },
});
