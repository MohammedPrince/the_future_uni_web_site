/* Builds the CSS and JS of the public pages into public/client/dist.
 *
 *   npm install
 *   npm run build:client
 *
 * Run it after editing public/client/css/style.css, resources/client/* or
 * after using a new CSS class in a Blade file, then commit public/client/dist.
 */
import fs from 'node:fs';
import path from 'node:path';
import { createRequire } from 'node:module';
import { fileURLToPath } from 'node:url';

const root = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const require = createRequire(process.env.BUILD_MODULES ? process.env.BUILD_MODULES + '/package.json' : path.join(root, 'package.json'));
const { PurgeCSS } = require('purgecss');
const CleanCSS = require('clean-css');
const { minify } = require('terser');

const read = (f) => fs.readFileSync(path.join(root, f), 'utf8');
const out = path.join(root, 'public/client/dist');
fs.mkdirSync(out, { recursive: true });

// ---------- CSS: same files and order as before, in one file, unused rules removed
const font = (f) => 'url(data:font/woff2;base64,' + fs.readFileSync(path.join(root, 'resources/client/fonts', f)).toString('base64') + ') format("woff2")';
const icons = `@font-face{font-family:'FontAwesome';font-display:block;src:${font('fa-subset.woff2')};font-weight:normal;font-style:normal}
@font-face{font-family:'themify';font-display:block;src:${font('ti-subset.woff2')};font-weight:normal;font-style:normal}`;
const noFontFace = (css) => css.replace(/@font-face\s*\{[^}]*\}/g, '');

const css = [
    read('resources/client/vendor/bootstrap.min.css').replace(/\/\*# sourceMappingURL.*?\*\//g, ''),
    icons,
    noFontFace(read('public/client/css/font-awesome.min.css')),
    noFontFace(read('public/client/css/themify-icons.css')),
    read('public/client/css/owl.carousel.css'),
    read('public/client/css/style.css')
        .replace(/url\("\.\.\/img\/footer-bg\.png"\)/g, 'url("../img/footer-bg.png.webp")')
        .replace(/url\("\.\.\/img\/main_imgs\/general\/fu_img\.png"\)/g, 'url("../img/main_imgs/general/fu_img.png.webp")')
        .replace(/font-family:\s*'Ubuntu',\s*sans-serif/g, "font-family: 'Ubuntu', 'Ubuntu Fallback', sans-serif"),
    read('resources/client/extra.css'),
].join('\n');

const purged = await new PurgeCSS().purge({
    content: [
        path.join(root, 'resources/views/client/**/*.blade.php').replace(/\\/g, '/'),
        path.join(root, 'resources/views/components/client-*.blade.php').replace(/\\/g, '/'),
        path.join(root, 'resources/views/vendor/pagination/**/*.blade.php').replace(/\\/g, '/'),
        path.join(root, 'resources/views/errors/*.blade.php').replace(/\\/g, '/'),
        path.join(root, 'resources/client/site.js').replace(/\\/g, '/'),
        path.join(root, 'public/client/js/main.js').replace(/\\/g, '/'),
    ],
    css: [{ raw: css }],
    // Classes that only appear while the page runs, or in text written in the admin panel
    safelist: {
        standard: ['active', 'show', 'fixed', 'expanded', 'html', 'body', 'pagination', 'page-item', 'page-link', 'disabled', 'img-fluid'],
        deep: [/^owl-/, /^carousel/, /^table/, /^ts-/, /^hs-/, /^modal/, /^pagination/, /^page-/, /blockquote/],
    },
    keyframes: true,
    fontFace: false,
});

const small = new CleanCSS({ level: { 1: { specialComments: 0 }, 2: false }, rebase: false }).minify(purged[0].css);
if (small.errors.length) throw new Error(small.errors.join('\n'));
fs.writeFileSync(path.join(out, 'site.min.css'), small.styles);

// ---------- JS
const main = read('public/client/js/main.js').replace(/\r\n/g, '\n');
const pageFunctions = main.slice(main.indexOf('function openModal'), main.indexOf("document.addEventListener('DOMContentLoaded'"))
    + main.slice(main.indexOf('function openTab'), main.indexOf('var window_w'));
const js = await minify(pageFunctions + '\n' + read('resources/client/site.js'), { compress: true, mangle: true });
fs.writeFileSync(path.join(out, 'site.min.js'), js.code);

for (const f of ['site.min.css', 'site.min.js']) console.log(f, Math.round(fs.statSync(path.join(out, f)).size / 1024) + ' KB');
