var gulp = require('gulp');
var elixir = require('laravel-elixir');

gulp.task('default', function() {

});

elixir(function(mix) {
    mix.version('css/app.min.css');
    mix.sass([
        'app.scss'
    ],'public/css/app.min.css');
});