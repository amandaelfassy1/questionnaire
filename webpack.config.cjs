const path = require('path');

module.exports = {
  entry: './resources/js/app.js', // Le point d'entrée JavaScript de votre projet
  output: {
    filename: 'bundle.js',  // Le fichier JavaScript compilé
    path: path.resolve(__dirname, 'public/build'), // Le dossier où Webpack placera les fichiers compilés
  },
  module: {
    rules: [
      {
        test: /\.css$/,  // Cibler les fichiers CSS
        use: [
          'style-loader',  // Injecte le CSS dans le DOM
          'css-loader',    // Permet à Webpack de comprendre le CSS
          'postcss-loader', // Utilise PostCSS pour traiter le CSS avec Tailwind
        ],
      },
    ],
  },
  mode: 'production',  // Utilisez 'development' en mode développement
};
