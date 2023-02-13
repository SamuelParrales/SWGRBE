import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/components/helpers/LoaderMain.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/product/create.js',
                'resources/js/product/edit.js',
                'resources/js/product/index.js',
                'resources/js/product/show.js',
                'resources/js/user/offeror/myProducts.js',
                'resources/js/user/profile/edit.js',
                'resources/js/user/profile/show.js',
            ],
            refresh: true,
        }),
    ],
});
