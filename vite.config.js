const path = require('path')

export default {
    plugins: [],
    build: {
        // generate manifest.json in outDir
        manifest: true,
        rollupOptions: {
            // overwrite default .html entry
            input: {
                app: './resources/js/app.js'
            },
        },
        outDir: 'public/build'
    },
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
}