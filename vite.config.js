import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import sass from 'sass';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    css: {
        postcss: {
            plugins: [
                require('tailwindcss')({
                    config: './tailwind.config.js'
                }),
             ],
        }
    },
});
