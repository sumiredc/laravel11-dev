import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/scss/app.scss", "resources/ts/app.ts"],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@/": `${__dirname}/resources/ts/app/`,
            "@ex/": `${__dirname}/resources/ts/extensions/`,
        },
    },
});
