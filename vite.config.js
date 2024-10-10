import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/pages/approval.js',
                'resources/js/pages/pengajuan.js',
            ],
            // refresh: true,
            refresh: ["resources/views/**", "resources/css/**", "app/Http/**"],
        }),
    ],
    resolve: {
        alias: {
            '$': 'jQuery',
        },
    }
});
