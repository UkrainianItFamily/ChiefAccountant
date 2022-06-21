const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/news/axios.js', 'public/js/news')
    .js('resources/js/news/axios-tag.js', 'public/js/news')
    .js('resources/js/currencyRates/axios.js', 'public/js/currencyRates')
    .js('resources/js/published/axios.js', 'public/js/published')
    .js('resources/js/published/adminAxios.js', 'public/js/published')
    .js('resources/js/report/lightbox/fslightbox.js', 'public/js/report/lightbox')
    .js('resources/js/report/report.js', 'public/js/report/')
    .js('resources/js/usefulLink/adminEditModal.js', 'public/js/usefulLink/')
    .js('resources/js/mainSlider/adminEditModal.js', 'public/js/mainSlider/')
    .js('resources/js/ckeditor/textareaToCkeditor.js', 'public/ckeditor5/')
    .js('resources/js/modalWindows.js', 'public/js/')
    .js('resources/js/reportRedactions/sendCreateForm.js', 'public/js/reportRedactions')
    .js('resources/js/report/createReport.js', 'public/js/report/')
    .js('resources/js/report/reportCategories.js', 'public/js/report/')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
