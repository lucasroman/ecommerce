// The app is not using this file. It's working with "viteconfig.ts" not ".js"
// Maybe because the other file load tailwind css

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel(['resources/css/app.css', 'resources/js/app.jsx']),
        react(),
    ],
});
    
