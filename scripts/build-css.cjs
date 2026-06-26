// One-shot Tailwind v4 build via PostCSS (avoids the CLI's @parcel/watcher dependency).
const fs = require('node:fs');
const path = require('node:path');
const postcss = require('postcss');
const tailwind = require('@tailwindcss/postcss');

const root = path.resolve(__dirname, '..');
const inFile = path.join(root, 'src', 'input.css');
const outFile = path.join(root, 'dist', 'output.css');
const minify = process.argv.includes('--minify');

const css = fs.readFileSync(inFile, 'utf8');
const plugins = [tailwind()];
if (minify) plugins.push(require('cssnano') ? require('cssnano')() : null);

postcss(plugins.filter(Boolean))
  .process(css, { from: inFile, to: outFile })
  .then((res) => {
    fs.writeFileSync(outFile, res.css);
    console.log('Built ' + outFile + ' (' + res.css.length + ' bytes)');
  })
  .catch((err) => { console.error(err); process.exit(1); });
