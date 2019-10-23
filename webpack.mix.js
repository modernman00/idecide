const mix = require('laravel-mix');

mix.js('resources/asset/js/index.js', 'public/js/alljs.js').sass("resource/asset/sass/main.scss", "public/css/index.css")
.setPublicPath("public")