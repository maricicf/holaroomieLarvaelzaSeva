import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({

    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/app.scss'], // Include SCSS file here
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                // If you have global variables or mixins, import them here
                // additionalData: `@import "resources/css/app.scss";`,
            },
        },
    },
});
