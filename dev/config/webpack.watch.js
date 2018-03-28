const webpack = require('webpack'),
	webpackMerge = require('webpack-merge'),
	ExtractTextPlugin = require('extract-text-webpack-plugin'),
	commonConfig = require('./webpack.comm.js'),
	path = require('path'),
	ImageminPlugin = require('imagemin-webpack-plugin').default,
	CopyWebpackPlugin = require('copy-webpack-plugin');;

const ENV = process.env.NODE_ENV = process.env.ENV = 'production';

module.exports = webpackMerge(commonConfig, {
	devtool: 'source-map',

	output: {
		path: path.resolve(__dirname, '../../') + '/assets',
		publicPath: '',
		filename: '[name].js',
		chunkFilename: '[id].chunk.js'
	},

	plugins: [
		new webpack.optimize.UglifyJsPlugin({
			sourceMap: true,
			mangle: {
				keep_fnames: true
			}
		}),
		new ExtractTextPlugin('[name].css'),
		new webpack.DefinePlugin({
			'process.env': {
				'ENV': JSON.stringify(ENV)
			}
		}),
		new CopyWebpackPlugin([{
			from: path.resolve(__dirname, '../../') + '/dev/images',
			to: path.resolve(__dirname, '../../') + '/assets/images'
		}]),
		new ImageminPlugin({ test: /\.(jpe?g|png|gif|svg)$/i })

	]
});

