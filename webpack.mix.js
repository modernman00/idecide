const mix = require('laravel-mix');

mix.js('resources/asset/js/index.js', 'js/index.js')
.sass("resources/asset/sass/main.scss", "css/index.css")
.setPublicPath("public");