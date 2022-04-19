/**
 * When passed a string, Glob will attempt to find each file that matches the
 * path given and return each path to the file as string[]
 */
 const glob = require('glob')

 /**
  * The Path API will be used to get the absolute path to the directory where we
  * plan to run Webpack
  */
 const path = require('path')

 const MiniCssExtractPlugin = require('mini-css-extract-plugin');
 const { CleanWebpackPlugin } = require('clean-webpack-plugin');
 const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts');
 /* ---------------
 * Main config
 * We will place here all the common settings
 * ---------------*/
var config = {
  
  devtool: 'source-map',
  externals: {
    jquery: 'jQuery',
  },
  module: {
    rules: [
    {
      test: /\.js$/,
      exclude: /node_modules/,
      use: ["babel-loader"]
    },
    {
      test: /\.(sa|sc|c)ss$/,
      use: [
        {
          loader: MiniCssExtractPlugin.loader,
          options: {
            publicPath: '',
          },
        },
        {
          loader: "css-loader",
          options: {
            sourceMap: true, // <-- !!IMPORTANT!!
          }
        },
        
        {
          loader: 'resolve-url-loader',
          options: {
            root: '',
            sourceMap: true, // <-- !!IMPORTANT!!
          }
        },
        {
          loader: 'sass-loader',
          options: {
            sourceMap: true, // <-- !!IMPORTANT!!
          }
        }
      ]
    },
    {
      test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
      generator: {
        filename: 'img/[name][ext]',
        emit: false,
      },
      use: {
        loader: 'file-loader',
        options: {
          name: '[name].[ext]',
          outputPath: "./img/"
        },
      },
    },
    {
      test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
      type: "asset/resource",
      generator: {
        filename: 'fonts/[name][ext]',
        emit: false,
      },
      exclude: [ /node_modules/ ],
      use: {
        loader: 'file-loader',
        options: {
          name: '[name].[ext]',
          outputPath: "./fonts/"
        }
      }
    }
    ]
  },
};

var configMain = Object.assign({}, config, {
  name: "configMain",
  entry: path.resolve( process.cwd(), 'src', 'index.js' ),
  output: {
    path: __dirname + "/build",
    publicPath: "/",
    filename: "main.js",
    // clean: true,
  },
  plugins: [
    // new RemoveEmptyScriptsPlugin(),
    // new CleanWebpackPlugin(),
    new MiniCssExtractPlugin({
      filename: "main.css"
    })
  ]
});

var configEditor = Object.assign({}, config, {
  name: "configEditor",
  entry: path.resolve( process.cwd(), 'src', 'editor.js' ),
  output: {
    path: __dirname + "/build",
    publicPath: "/",
    filename: "editor.js",
    // clean: true,
  },
  plugins: [
    new RemoveEmptyScriptsPlugin(),
    new CleanWebpackPlugin(),
    new MiniCssExtractPlugin({
      filename: "editor.css"
    })
  ]
});

var configBlocks = Object.assign({}, config, {
  name: "configBlocks",
  entry: glob.sync('./src/blocks/**.scss').reduce((acc, path) => {
    const entry =  path.substring(path.lastIndexOf("_") + 1, path.lastIndexOf("."));
    acc[entry] = path;
    return acc;
  }, {}),
  output: {
    path: __dirname + "/template-parts",
    publicPath: "/",
    // filename: "js/app.admin.min.js"
    filename: './blocks/[name]/[name].js',
  },
  plugins: [
    new RemoveEmptyScriptsPlugin(), 
      new MiniCssExtractPlugin({
          filename: './blocks/[name]/[name].css',
      })
  ]
});
 module.exports = [configMain, configBlocks, configEditor];