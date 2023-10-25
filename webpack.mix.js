const mix = require('laravel-mix');
require('laravel-mix-purgecss');


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

mix.js('resources/js/app.js', 'public/js').vue()
    .js('resources/js/charts/typeChart.js','public/js/charts')
    .js('resources/js/charts/monthlyCharts.js','public/js/charts')
    .js('resources/js/charts/compareChart.js','public/js/charts')
    .js('resources/js/OneSignalSDKWorker.js', 'public/OneSignalSDKWorker.js')
    .sass('resources/sass/app.scss', 'public/css')
    .purgeCss({
        enabled: true,
    })
    .version();
