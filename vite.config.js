// vite.config.js
const { defineConfig } = require('vite');
const path = require('path');
const { globSync } = require('glob');
const { viteStaticCopy } = require('vite-plugin-static-copy');

// Get all SCSS entry points (ignores partials starting with "_")
const scssEntries = globSync('src/scss/[^_]*.scss').map(file =>
    path.resolve(__dirname, file)
);

module.exports = defineConfig({
    appType: 'custom',
    base: './',
    root: path.resolve(__dirname),

    plugins: [
        viteStaticCopy({
            targets: [
                // Copy JS files directly into dist/js
                { src: 'src/js/*', dest: 'js' },

                // Copy images directly into dist/img
                { src: 'src/img/*', dest: 'img' },

                // Copy third-party CSS / assets into dist/css/thirdparty
                { src: 'src/thirdparty/*', dest: 'css/thirdparty' },

                // Copy all font files directly into dist/css/fonts
                //{ src: 'src/fonts/*', dest: 'css/fonts', flatten: true }
            ]
        })
    ],

    build: {
        outDir: 'dist',
        emptyOutDir: false,
        minify: true,
        sourcemap: false,

        rollupOptions: {
            input: scssEntries,
            output: {
                assetFileNames: asset => {
                    // SCSS → minified CSS
                    if (asset.name && asset.name.endsWith('.css')) {
                        return 'css/[name].min.css';
                    }

                    // Images
                    if (
                        asset.name &&
                        /\.(png|jpe?g|gif|svg|webp|avif)$/.test(asset.name)
                    ) {
                        return 'img/[name][extname]';
                    }

                    // Fallback
                    return 'assets/[name][extname]';
                }
            }
        }
    },

    css: {
        postcss: {
            plugins: [
                require('autoprefixer'),
                require('postcss-url')({
                    url: 'rebase' // ensures relative paths are fixed
                })
            ]
        }
    },

    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'src'), // src shortcut
            '@img': path.resolve(__dirname, 'src/img') // image shortcut
        }
    }
});