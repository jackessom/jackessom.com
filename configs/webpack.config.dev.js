var path = require('path');
var webpack = require('webpack');
var HtmlWebpackPlugin = require('html-webpack-plugin');
var Dotenv = require('dotenv-webpack');

module.exports = {
  devtool: 'cheap-module-source-map',
  entry: [
    path.join(process.cwd(), 'src/index.jsx'),
  ],
  output: {
    path: path.resolve(process.cwd(), 'build'),
    filename: 'bundle.js',
    publicPath: '/'
  },
  module: {
    noParse: /node_modules\/ajv\/dist\/ajv.bundle.js/,
    preLoaders: [
      {
        test: /\.(js|jsx)$/,
        loader: 'eslint',
        include: /src/,
      }
    ],
    loaders: [
      {
        test: /\.(js|jsx)$/,
        loaders: ['react-hot', 'babel'],
        include: /src/
      },
      {
        test: /\.css$/,
        loaders: ['style', 'css?modules', 'postcss-loader']
      },
      {
        test: /\.json$/,
        loader: 'json-loader'
      },
      {
        test: /\.(jpg|png|gif|svg)$/,
        loader: 'file',
        query: {
          name: 'assets/images/[name].[hash:8].[ext]'
        }
      },
      {
        test: /\.(ttf|eot|woff|woff2)$/,
        loader: 'file-loader',
        query: {
          name: 'assets/fonts/[name].[ext]',
        },
      },
    ]
  },
  plugins: [
    new webpack.HotModuleReplacementPlugin(),
    new HtmlWebpackPlugin({
      template: 'public/index.html'
    }),
    new Dotenv()
  ],
  postcss: function (webpack) {
    return [
      require("stylelint")(),
      require("postcss-cssnext")()
    ]
  },
  eslint: {
    failOnWarning: false,
    failOnError: true,
  },
  resolve: {
    root: [
      path.resolve(__dirname, '../src')
    ],
    extensions: ['', '.js', '.jsx']
  },
  node: {
    net: "empty",
    tls: "empty",
    fs: "empty"
  }
};
