const mix = require('laravel-mix');

mix.js('resources/asset/js/index.js', 'public/js/index2.js')
.sass("resources/asset/sass/main.scss", "public/css/index2.css")
.setPublicPath("public")