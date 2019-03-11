var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// 27/10 gulp
elixir(function(mix) {
    mix.sass('app.scss')
    
            .styles([
                'blog-posts.css',
                'bootstrap.css',
                'font-awesome.css',
                'metisMenu.css',
                'sb-admin-2.css'
            ], './public/js/libs.css')
        
            .scripts([
                'jquery.js',
                'bootstrap.js',
                'metisMenu.js',
                'sb-admin-2.js',
                'bootstrap.min.js'
            ], './public/js/libs.js');
    
});
