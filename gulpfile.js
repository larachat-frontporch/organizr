var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app.scss');

    mix.browserify('app.js');

    mix.copy('node_modules/materialize-css/font/*', 'public/build/font');

    mix.version(['js/app.js', 'css/app.css']);

    mix.browserSync({proxy: 'organizr.app'});
});
