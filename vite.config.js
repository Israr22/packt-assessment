import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/js/Config/app.js'
            ],
            refresh: true,
        }),
    ],

    // resolve: {
    //     alias: {
    //         '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
    //         '@': '/resources/js',
    //     }
    // },
});
