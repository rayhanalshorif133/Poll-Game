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

mix.browserSync("http://localhost:8000");

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/admin/poll/index.js', 'public/js/admin/poll')
    .js('resources/js/admin/reports/player.js', 'public/js/admin/reports')
    .js('resources/js/admin/reports/tournament.js', 'public/js/admin/reports')
    .sourceMaps();
