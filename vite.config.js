import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: 'localhost',
        port: 5173, // ✅ Port par défaut de Vite
        strictPort: true, 
        https: false, // ✅ Désactive HTTPS en local pour éviter les erreurs SSL
        hmr: {
            protocol: 'ws', // ✅ Utilisation de WebSocket en HTTP
        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
