import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { viteStaticCopy } from "vite-plugin-static-copy";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/assets/scss/app.scss",
                "resources/assets/ts/app.ts",
            ],
            refresh: true,
        }),

        viteStaticCopy({
            targets: [
                {
                    src: "resources/assets/img/**/*",
                    dest: "assets/img",
                    
                    rename: { stripBase: true },
                },
            ],
        }),
    ],

    css: {
        preprocessorOptions: {
            scss: {
                quietDeps: true,
            },
        },
    },
});
