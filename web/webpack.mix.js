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

mix.webpackConfig({
    devServer: {
        host: '0.0.0.0',
        port: 3000,
        proxy: {
            '*': 'http://0.0.0.0:8081'
        },
        // Windows（Docker for windows）の場合は下記を追加する
        watchOptions:{
            aggregateTimeout:200,
            poll:5000
        },
    }
});

mix.browserSync({
    proxy: '0.0.0.0:8081', // アプリの起動アドレス
    open: false // ブラウザを自動で開かない
    })
    .js('resources/js/app.js', 'public/js')
    .version()
