const mix = require('laravel-mix');

mix.disableSuccessNotifications();
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.options({
    processCssUrls: false,
})
.sourceMaps(false, 'source-map');

mix.js('resources/js/app.js', 'public/js');
mix.sass('resources/scss/app/main.scss', 'public/css/app')
mix.sass('resources/scss/admin/main.scss', 'public/css/admin');
