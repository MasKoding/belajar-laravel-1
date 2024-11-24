import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel(['resources/js/App.jsx']),
    ],
    resolve:{
        alias:{
            '@':'/resources/js'
        }
    }
});
