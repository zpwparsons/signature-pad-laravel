import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const host = 'signature-pad.test';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host,
        hmr: { host },
    },
});
