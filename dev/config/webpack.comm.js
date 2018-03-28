const	webpack = require('webpack'),
		HtmlWebpackPlugin = require('html-webpack-plugin'),
		ExtractTextPlugin = require('extract-text-webpack-plugin'),
		path = require('path'),
		autoprefixer = require('autoprefixer');

module.exports = {
	entry: {
		'app': path.resolve(__dirname, '../../') + '/dev/main.ts',
	},
	resolve: {
		extensions: ['.ts', '.js']
	},
	module: {
		rules: [
			{ test: /\.ts?$/, use: "awesome-typescript-loader"},
			{ test: /\.(png|jpe?g|gif|svg|ico)$/,
				loader: 'file-loader?name=images/[name].[ext]' },
			{ test: /\.(|woff|woff2|ttf|eot)$/,
			  loader: 'file-loader?name=fonts/[name].[ext]' },
			{ test: /\.css$/, use: ExtractTextPlugin.extract(
                [{loader: 'css-loader', options: {sourceMap: true, importLoaders: 1} },
                 {loader: 'postcss-loader', options: {sourceMap: true, ident: 'postcss', plugins: (loader) => [autoprefixer()]} } ])
            },
            { test: /\.scss$/, use: ExtractTextPlugin.extract(
                [{loader: 'css-loader', options: {sourceMap: true, importLoaders: 1} },
                 {loader: 'postcss-loader', options: {sourceMap: true, ident: 'postcss', plugins: (loader) => [autoprefixer()]} },
                 {loader: 'sass-loader', options: {sourceMap: true, importLoaders: 1} } ])
            },
			{ enforce: "pre", test: /\.js$/, loader: "source-map-loader" },
			{
				test: /\.html$/,
				loader: 'html-loader'
			},
		]
	},
	plugins: [
		new webpack.optimize.CommonsChunkPlugin({
			name: ['app']
		}),
		
	]
}