const mix = require('laravel-mix');

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

mix.js('resources/js/custom/calculator.js', 'public/js')
    .js('resources/js/app.js', 'public/js').sourceMaps()
    .sass('resources/sass/_custom.scss','public/css')
    .sass('resources/sass/app.scss', 'public/css');

