import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default ({ mode }) => {
    process.env = { ...process.env, ...loadEnv(mode, process.cwd()) };

    return defineConfig({
        server: {
            host: 'localhost',
            port:82,
            watch: {
                usePolling: true
            },
            include: 'resources/js/**/*.vue',
            rollupOptions: {
                input: 'resources/js/app.js',
            },
        },
        build: {
            rollupOptions: {
                input: 'resources/js/app.js',
            },
        },
        // watch: {
        //     // Enable hot reloading for Vue files
        //     usePolling: true,
        //     include: 'resources/js/**/*.vue',
        // },
        plugins: [
            laravel({
                input: ['resources/js/app.js','resources/css/filament.css'],
                ssr: 'resources/js/ssr.js',
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
    });
};
