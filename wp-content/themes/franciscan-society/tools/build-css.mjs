// Combines + minifies the theme stylesheets into assets/css/theme.min.css.
//
//   node tools/build-css.mjs
//
// - keeps the original load order (fonts -> design-system -> styles -> bible-widget)
// - drops the render-blocking Google Fonts @import lines (fonts are self-hosted
//   via assets/css/fonts.css, see inc/performance.php)
// - points url(../images/x.png|jpg) at the .webp sibling when one exists
import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';
import { transform } from 'lightningcss';

const here = path.dirname(fileURLToPath(import.meta.url));
const cssDir = path.join(here, '..', 'assets', 'css');
const order = ['fonts.css', 'design-system.css', 'styles.css', 'bible-widget.css'];

let combined = '';
let rewrites = 0;
for (const file of order) {
  let css = fs.readFileSync(path.join(cssDir, file), 'utf8');
  css = css.replace(/@import\s+url\((['"]?)https:\/\/fonts\.googleapis\.com[^)]*\)\s*;?/g, '');
  css = css.replace(/url\((['"]?)(\.\.\/images\/[^)'"]+?)\.(png|jpe?g)\1\)/gi, (m, q, base, ext) => {
    if (fs.existsSync(path.join(cssDir, `${base}.webp`))) {
      rewrites++;
      return `url(${q}${base}.webp${q})`;
    }
    return m;
  });
  combined += `/* ${file} */\n${css}\n`;
}

const { code, warnings } = transform({
  filename: 'theme.css',
  code: Buffer.from(combined),
  minify: true,
  errorRecovery: true,
});
for (const w of warnings || []) console.warn('warn:', w.message, w.loc ? `(line ${w.loc.line})` : '');

const out = path.join(cssDir, 'theme.min.css');
fs.writeFileSync(out, code);
console.log(`theme.min.css: ${(combined.length / 1024).toFixed(0)} KB -> ${(code.length / 1024).toFixed(0)} KB, ${rewrites} url() -> webp`);
