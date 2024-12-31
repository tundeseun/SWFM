const mix = require('laravel-mix');
<<<<<<< HEAD
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
=======


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

const MomentLocalesPlugin = require('moment-locales-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');


mix.js('resources/src/main.js', 'public').js('resources/src/login.js', 'public')
    .vue();

    mix.webpackConfig({
        output: {
          
            filename:'js/[name].min.js',
            chunkFilename: 'js/bundle/[name].[hash].js',
          },
        plugins: [
            new MomentLocalesPlugin(),
            new CleanWebpackPlugin({
                cleanOnceBeforeBuildPatterns: ['./js/*']
              }),
        ]
    });

>>>>>>> origin/main
