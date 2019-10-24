const mix = require('laravel-mix');

mix.js('resources/asset/js/index.js', 'public/js/index.js')
.sass("resources/asset/sass/main.scss", "public/css/index.css")
.setPublicPath("public")