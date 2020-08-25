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
mix.webpackConfig({
    watchOptions: {
        ignored: /node_modules/
    }
})

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/master.js', 'public/js')
    .js('resources/js/drag&drop.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/page_elements1.scss', 'public/css')
    .sass('resources/sass/page_elements2.scss', 'public/css')
    .sass('resources/sass/registration.scss', 'public/css')
    .sass('resources/sass/drag&drop.scss', 'public/css')
    .sass('resources/sass/master.scss', 'public/css');
