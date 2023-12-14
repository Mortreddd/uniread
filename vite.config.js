import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        host: "127.0.0.1",
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/tabs.js",
                "resources/js/page.js",
                "resources/js/voice.js",
                "resources/js/bookmarks.js",
                "resources/js/workspace.js",
            ],
            refresh: true,
        }),
    ],
});
