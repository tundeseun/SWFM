import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        vue(), // Vue plugin for handling .vue files
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'], // Ensure these files are properly loaded
            refresh: true, // This allows automatic page reload on changes
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js', // Ensure proper alias for JS files
        },
    },
    build: {
        outDir: 'dist', // Specify the output directory
    },
});
