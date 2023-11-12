import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'public/css/main.css',
        'public/css/media.css',
        'public/js/main.js',
      ],
      refresh: true,
    }),
  ],
});
