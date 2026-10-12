import jigsaw from '@tighten/jigsaw-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        jigsaw({
            input: [
                'source/_assets/js/main.js',
                'source/_assets/css/main.css'
            ],
            refresh: true,
        }),
    ],
    server: {
        host: 'localhost',
        port: 3000,
        cors: true,
        origin: 'http://localhost:3000',
    },
});
