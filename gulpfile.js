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

// require('laravel-elixir-browser-sync');
var BrowserSync = require('laravel-elixir-browsersync');

elixir(function(mix) {
    mix.sass('app.scss');

    BrowserSync.init();
    mix.BrowserSync({
        proxy           : "dmca-app.local",
        logPrefix       : "BS",
        // tunnel          : true,
        logConnections  : true,
        logFileChanges  : true,
        reloadOnRestart : true,
        notify          : false
    });

    // mix.styles([
    //  'vendor/bootstrap.css',
    //  'app.css'
    // ], null, 'public/css');

});
