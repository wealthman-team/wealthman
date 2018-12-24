module.exports = {
	'files': [
		'../svg/*.svg'
	],
	'fontName': 'icons',
	'classPrefix': 'icon-',
	'baseSelector': '.icon',
	'types': ['eot', 'woff', 'woff2', 'ttf', 'svg'],
	'fileName': 'fonts/icons/[fontname].[ext]',
	'dest': path.resolve(__dirname, '../../public/fonts/icons'),
	'cssFontsUrl': '../../fonts/icons',
	'html': 'true',
	'css': 'true',
	'writeFiles': 'true',

};