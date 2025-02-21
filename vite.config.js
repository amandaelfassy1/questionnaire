import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: process.env.APP_ENV === 'local' ? { // 🔥 Condition pour local
        hmr: {
            host: 'localhost',
            protocol: 'ws', // ✅ WebSocket fonctionne bien en local (HTTP)
        }
    } : {
        https: true, // ✅ Active HTTPS en production
        hmr: {
            protocol: 'wss' // ✅ WebSocket sécurisé pour Heroku
        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
