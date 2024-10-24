import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import preset from './vendor/filament/support/tailwind.config.preset'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
});
