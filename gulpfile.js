var gulp = require('gulp');
var shell = require('gulp-shell');
var elixir = require('laravel-elixir');

elixir.config.assetsPath = './resources/';
elixir.config.publicPath = './public/';
elixir.config.sourcemaps = false;
elixir.config.production = true;

elixir.extend('artisan', function (command, watcher) {
    new elixir.Task('artisan', function () {
        return gulp.src('').pipe(shell('php ../../../artisan ' + command));
    })
    .watch(watcher);
});

elixir(function (mix) {
    mix
        .sass('app.scss')
        .browserify('app.js')
        .version([
            elixir.config.publicPath + 'css/app.css',
            elixir.config.publicPath + 'js/app.js'
        ])
        .artisan(
            'vendor:publish --tag=public --force', 
            elixir.config.publicPath + 'build/rev-manifest.json'
        )
    ;
});