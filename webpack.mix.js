let mix = require('laravel-mix').setPublicPath('/');

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

mix.js('themes/demo/assets/js/app.js', 'themes/demo/assets/javascript')
   .js('app/views/assets/js/dashboard.js', 'app/views/assets/javascript')
   .sass('themes/demo/assets/sass/app.scss', 'themes/demo/assets/css')
   .sass('app/views/assets/sass/dashboard.scss', 'app/views/assets/css');
