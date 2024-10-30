const UglifyJsPlugin = require('uglifyjs-webpack-plugin')

module.exports = {
  entry  : './assets/js/gutenberg/src/block.js',
  output : {
    path     : __dirname,
    filename : 'assets/js/gutenberg/scripts.js',
  },
  optimization : {
    minimizer: [new UglifyJsPlugin()]
  },
  module : {
    rules: [
      {
        test    : /\.jsx?$/,
        exclude : /(node_modules|bower_components)/,
        use     : {
          loader  : 'babel-loader',
          options : {  
            cacheDirectory : true  
          }
        },
      },
    ],
  },
}