import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        hmr: {
            host: 'localhost',
            protocol: 'ws', // 🔥 Utilise WebSocket en HTTP pour éviter les erreurs en local
        }
    },
    build: {
        manifest: true, // 🔥 Génère un manifest pour que Laravel charge bien les assets en prod
        outDir: 'public/build', // 🔥 Stocke les fichiers compilés dans public/build pour Heroku
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
