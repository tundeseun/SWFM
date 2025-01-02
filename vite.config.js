// import { defineConfig } from 'vite';
// import vue from '@vitejs/plugin-vue';
// import laravel from 'laravel-vite-plugin';

// export default defineConfig({
//     plugins: [
//         vue(), // Vue plugin for handling .vue files
//         laravel({
//             input: ['resources/css/app.css', 'resources/js/app.js'], // Ensure these files are properly loaded
//             refresh: true, // This allows automatic page reload on changes
//         }),
//     ],
//     resolve: {
//         alias: {
//             '@': '/resources/js', // Ensure proper alias for JS files
//         },
//     },
//     build: {
//         outDir: 'dist', // Specify the output directory
//         chunkSizeWarningLimit: 500, // Increase chunk size warning limit (default 500KB)
//     },
//     devServer: {
//         historyApiFallback: true, // Ensure the dev server works well
//       },
// });



import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { visualizer } from 'rollup-plugin-visualizer';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        visualizer({
            filename: './dist/stats.html', // Output file for the visualizer
            template: 'treemap', // Choose 'treemap', 'sunburst', or 'network' visualization
            open: true, // Automatically open the report after build
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
        },
    },
    build: {
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['vue'],
                },
            },
        },
        chunkSizeWarningLimit: 600,
        minify: 'esbuild',
        target: 'es2015',
        assetsInlineLimit: 4096,
    },
    server: {
        port: 3000,
        historyApiFallback: true,
    },
});
