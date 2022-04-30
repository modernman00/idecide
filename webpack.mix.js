const mix = require('laravel-mix');

mix.js('resources/asset/js/index.js', 'assets/js/index.js')
.sass("resources/asset/sass/main.scss", "assets/css/index.css")
.setPublicPath("public");