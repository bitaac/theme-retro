const elixir = require('laravel-elixir');

elixir.config.assetsPath = './resources/';
elixir.config.publicPath = './public/';
elixir.config.sourcemaps = false;
elixir.config.production = false;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
       .webpack('app.js');
});
