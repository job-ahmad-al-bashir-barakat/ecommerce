const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix
    .styles([
        'resources/control/fontawesome/css/all.css',
        'resources/control/bootstrap/css/bootstrap.css',
        'resources/control/datatables/dataTables.bootstrap4.min.css',
        'packages/Component/Form/src/Assets/Plugin/quill/quill.snow.css',
        'packages/Component/Autocomplete/src/Assets/plugin/select2/css/select2.css',
        'packages/Component/Autocomplete/src/Assets/plugin/select2-bootstrap-theme/select2-bootstrap4.css',
        'packages/Component/Autocomplete/src/Assets/plugin/select2-bootstrap-theme/custom-select2.css',
        'resources/control/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',
        'packages/Component/Form/src/Assets/Plugin/sweetalert/sweetalert.css',
        'resources/control/animate/animate.css',
        'resources/control/css/app.css',
    ], 'public/css/control.css')
    .options({
        postCss: [
            require('postcss-css-variables')()
        ]
    }).version();

mix.scripts([
    'resources/control/popper.js/popper.js',
    'resources/control/bootstrap/js/bootstrap.js',
    'resources/control/datatables/jquery.dataTables.min.js',
    'resources/control/datatables/dataTables.bootstrap4.min.js',
    'resources/control/jquery.nicescroll/jquery.nicescroll.js',
    'packages/Component/Form/src/Assets/Plugin/quill/quill.js',
    'packages/Component/Autocomplete/src/Assets/plugin/select2/js/select2.js',
    'packages/Component/Form/src/Assets/Plugin/jquery-validation/dist/jquery.validate.js',
    'packages/Component/Form/src/Assets/Plugin/bootstrap-notify/bootstrap-notify.js',
    'packages/Component/Form/src/Assets/Plugin/sweetalert/sweetalert.min.js',
    'resources/control/moment/moment-with-locales.min.js',
    'resources/control/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',
    'packages/Component/Autocomplete/src/Assets/js/autocomplete.js',
    'packages/Component/Form/src/Assets/js/form.js',
    'resources/control/js/app.js',
], 'public/js/control.js').version();

mix.copy('resources/control/jquery/jquery.js', 'public/js');
mix.copy('resources/control/fontawesome/webfonts', 'public/webfonts');
