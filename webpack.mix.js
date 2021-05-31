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
const tailwindcss = require('tailwindcss')

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/alpine.min.js', 'public/js')
    .js('resources/js/admin-app.js', 'public/js');

mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/vuetify.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css');
mix.sass('resources/sass/tailwind.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('tailwind.config.js') ],
    })
