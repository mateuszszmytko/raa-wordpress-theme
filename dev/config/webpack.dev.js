const webpackMerge = require('webpack-merge'),
	ExtractTextPlugin = require('extract-text-webpack-plugin'),
	HtmlWebpackPlugin = require('html-webpack-plugin'),
	commonConfig = require('./webpack.comm.js'),
	path = require('path');

module.exports = webpackMerge(commonConfig, {
	devtool: 'cheap-module-eval-source-map',

	output: {
		path: path.resolve(__dirname, '..'),
		publicPath: '/',
		filename: '[name].js',
		chunkFilename: '[id].chunk.js'
	},

	plugins: [
		new ExtractTextPlugin('[name].css'),
		new HtmlWebpackPlugin({
			template: 'index.html'
		})
	],

	devServer: {
		historyApiFallback: true,
		stats: 'minimal'
	}

});