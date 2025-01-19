import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        host: '0.0.0.0', // Permitir acesso externo
        port: 3000,      // Porta padrão do Vite
        hmr: {
            host: 'localhost', // Substitua por 'vite' se você usar um serviço chamado 'vite' no Docker
            protocol: 'ws',
        },
        watch: {
            usePolling: true, // Necessário para sincronização em sistemas como Docker
        },
    },
});
