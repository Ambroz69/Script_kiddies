const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin/app.scss', 'public/css/admin')
    .sass('resources/sass/auth/app.scss', 'public/css/auth')
    .browserSync(process.env.APP_URL);