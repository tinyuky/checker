let mix = require('laravel-mix');
var path = require('path');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

//    mix.webpackConfig({
//        exports: {
//            module: {
//                rules: [{
//                    test: /\.js$/,
//                    loader: 'babel-loader',
//                    include: [path.resolve(__dirname, 'node_modules/vue2-datatable-component/')]
//                }]
//            }
//        }
//    });