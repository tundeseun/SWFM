const mix = require('laravel-mix');
const MomentLocalesPlugin = require('moment-locales-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const path = require('path');

mix.js('resources/src/main.js', 'public')
    .js('resources/src/login.js', 'public')
    .vue();

mix.webpackConfig({
    output: {
        filename: 'js/[name].min.js',
        chunkFilename: 'js/bundle/[name].[hash].js',
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/src'), // Define alias for '@'
        },
        extensions: ['.js', '.vue', '.json'], // Ensure .vue files are resolved
    },
    plugins: [
        new MomentLocalesPlugin(),
        new CleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: ['./js/*'],
        }),
    ],
});
