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

                // Public

                'resources/js/publication/show.js',
                'resources/js/publication/index.js',

                // Admin

                'resources/js/user/admin/report/index.js',
                'resources/js/user/admin/user/index.js',
                'resources/js/user/admin/user/moderatorCreate.js',
            ],
            refresh: true,
        }),
    ],
});
