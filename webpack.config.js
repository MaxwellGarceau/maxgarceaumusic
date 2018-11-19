const path = require('path'),
settings = require('./settings');

// const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = () => {
  // const CSSExtract = new ExtractTextPlugin('styles.css');
  return {
    entry: {
      App: settings.themeLocation + "js/scripts.js"
    },
    output: {
      path: path.resolve(__dirname, settings.themeLocation + "js"),
      filename: "scripts-bundled.js"
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env']
            }
          },
        }
        // , {
        //   test: /\.s?css$/,
        //   use: CSSExtract.extract({
        //     use: [
        //       {
        //         loader: 'css-loader',
        //         options: {
        //           sourceMap: true
        //         }
        //       },
        //       {
        //         loader: 'sass-loader',
        //         options: {
        //           sourceMap: true
        //         }
        //       }
        //     ]
        //   })
        // }
      ]
    },
    mode: 'none',
    // plugins: [
    //   CSSExtract
    // ],
  }
}
