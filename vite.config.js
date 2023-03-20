import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/addArtist.js', 'esources/js/editArtist.js'],
            refresh: true,
        }),
    ],
});
