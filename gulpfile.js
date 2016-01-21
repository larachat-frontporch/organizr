var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app.scss');

    mix.browserify('app.js');

    mix.copy('node_modules/materialize-css/font/*', 'public/build/font');
    mix.copy('node_modules/jquery/dist/jquery.js', 'resources/assets/js');
    mix.copy('node_modules/materialize-css/bin/materialize.js', 'resources/assets/js');
    mix.copy('node_modules/sticky-table-headers/js/jquery.stickytableheaders.js', 'public/js');

    mix.scripts([
        'jquery.js',
        'materialize.js'
    ], 'public/build/js/vendor.js');

    mix.version(['js/app.js', 'css/app.css']);

    mix.browserSync({proxy: 'organizr.app'});
});
