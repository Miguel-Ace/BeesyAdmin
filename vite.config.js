import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/pantalla_de_carga.scss',
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/menutoggle.js',
                'resources/js/filtro.js',
                'resources/js/exportSoporte.js',
                'resources/js/graficoRespuesta.js',
                'resources/js/exportRespuesta.js',
                'resources/js/soporte.js',
            ],
            refresh: true,
        }),
    ],
});
