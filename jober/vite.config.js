// // import { defineConfig } from 'vite';
// // import laravel from 'laravel-vite-plugin';

// // export default defineConfig({
// //     plugins: [
// //         laravel({
// //             input: [
// //                 'resources/css/app.css',
// //                 'resources/js/app.js',
// //             ],
// //             refresh: true,
// //         }),
// //     ],
// // });
// import { defineConfig } from 'vite';
// import react from '@vitejs/plugin-react'; // or vue if using Vue

// export default defineConfig({
//   plugins: [react()],
//   css: {
//     postcss: {
//       plugins: [
//         require('tailwindcss'),
//         require('autoprefixer'),
//       ],
//     },
//   },
// });
import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react'; // Or vue if using Vue

export default defineConfig({
  plugins: [react()],
  build: {
    manifest: true, // Ensure manifest generation is enabled
    outDir: 'public/build', // Output directory for build assets
    rollupOptions: {
      input: {
        main: 'resources/js/app.js', // Entry point for JavaScript
        styles: 'resources/css/app.css', // Entry point for CSS
      },
    },
  },
  css: {
    postcss: {
      plugins: [
        require('tailwindcss'),
        require('autoprefixer'),
      ],
    },
  },
});

