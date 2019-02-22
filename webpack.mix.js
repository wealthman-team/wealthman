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
	module: {
		rules: [
			{
				test: /\.font\.js/,
				use: [
					'css-loader',
					'webfonts-loader'
				]
			}
		]
	}
}).options({
    postCss: [
        require('autoprefixer')({
            browsers: [
                "last 10 version",
                "> 1%"
            ],
        })
    ]
});

mix.js('resources/js/app.js', 'public/js')
	.js('resources/js/admin.js', 'public/js')
	.js('resources/js/mobile.js', 'public/js/mobile')
	.sass('resources/sass/app.scss', 'public/css')
	.sass('resources/sass/admin.scss', 'public/css/admin')
	.sass('resources/sass/bootstrap.scss', 'public/css/admin')
	.sass('resources/sass/mobile.scss', 'public/css/mobile')
	.styles([
		'public/fonts/icons/icons.css'
	], 'public/css/icons.css')
	.version();

mix.copy('resources/images/', 'public/images/', false);
mix.copy('resources/svg/', 'public/svg/', false);
mix.copy('resources/fonts/', 'public/fonts/', false);

mix.disableNotifications();