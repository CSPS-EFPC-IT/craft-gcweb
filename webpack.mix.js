let mix = require('laravel-mix');
let ImageminPlugin = require('imagemin-webpack-plugin').default;
let ImageminMozjpeg = require('imagemin-mozjpeg');
let CopyWebpackPlugin = require('copy-webpack-plugin');

mix.setPublicPath('web/');

// Copy WET/GCweb vendor to web root
mix.copyDirectory('src/GCWeb', 'web/dist/GCWeb')
    .copyDirectory('src/wet-boew', 'web/dist/wet-boew')
    .copyDirectory('src/site/ajax', 'web/dist/site/ajax');

// Build app sass
mix.sass('src/site/scss/main.scss', 'dist/site/css').options({ processCssUrls: false }).sourceMaps();

// Build app js
mix.js('src/site/js/main.js', 'dist/site/js');

// Optimize assets and copy to web root
mix.webpackConfig({
    plugins: [
        new CopyWebpackPlugin([{
            from: 'src/site/img',
            to: 'dist/site/img'
        }]),
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif|svg)$/i,
            plugins: [
                ImageminMozjpeg({
                    quality: 80
                })
            ]
        })
    ]
});

// Versioning
if (mix.inProduction()) {
    mix.version();
}