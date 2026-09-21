// Extracts the CSS rules that are actually used by a page out of assets/css/theme.min.css
// and writes them to assets/css/<out>. inc/performance.php inlines that file in <head> and
// loads the full bundle without blocking rendering.
//
//   node tools/build-critical.mjs [url] [out-file]
//   node tools/build-critical.mjs http://fransiscan.local/ critical-home.css
//
// Needs the site running locally and Chrome (set CHROME_PATH if it is not in the default place).
// Run `node tools/build-css.mjs` first whenever the source stylesheets change.
import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';
import puppeteer from 'puppeteer-core';
import { transform } from 'lightningcss';

const here = path.dirname(fileURLToPath(import.meta.url));
const cssDir = path.join(here, '..', 'assets', 'css');
const url = process.argv[2] || 'http://fransiscan.local/';
const outName = process.argv[3] || 'critical-home.css';
const chrome = process.env.CHROME_PATH || 'C:/Program Files/Google/Chrome/Application/chrome.exe';

const browser = await puppeteer.launch({ executablePath: chrome, headless: true, args: ['--no-sandbox'] });
try {
  const page = await browser.newPage();
  await page.setViewport({ width: 1350, height: 940 });
  await page.goto(`${url}${url.includes('?') ? '&' : '?'}fs_nocritical=1`, { waitUntil: 'networkidle2', timeout: 120000 });
  // Scroll through the page so lazily created / observed elements exist, then wait for animations.
  await page.evaluate(async () => {
    const h = document.documentElement.scrollHeight;
    for (let y = 0; y < h; y += 700) {
      window.scrollTo(0, y);
      await new Promise((r) => setTimeout(r, 60));
    }
    window.scrollTo(0, 0);
    await new Promise((r) => setTimeout(r, 1500));
  });

  const css = await page.evaluate(() => {
    const DYNAMIC = /:(hover|focus|focus-within|focus-visible|active|visited|target|checked|disabled|enabled|invalid|valid|required|optional|read-only|placeholder-shown|fullscreen)\b/;
    const PSEUDO_EL = /::?(before|after|first-line|first-letter|selection|placeholder|marker|backdrop|file-selector-button|cue|-webkit-[\w-]+|-moz-[\w-]+|-ms-[\w-]+)(\([^)]*\))?/gi;

    function splitSelectors(sel) {
      const out = [];
      let depth = 0;
      let cur = '';
      for (const ch of sel) {
        if (ch === '(' || ch === '[') depth++;
        else if (ch === ')' || ch === ']') depth--;
        if (ch === ',' && depth === 0) {
          out.push(cur);
          cur = '';
        } else cur += ch;
      }
      if (cur.trim()) out.push(cur);
      return out.map((s) => s.trim()).filter(Boolean);
    }
    function matches(sel) {
      // Rules keyed on the lazy-loading attributes describe the state *before* JS runs, so keep them.
      if (sel.includes('[data-fs-')) return true;
      if (DYNAMIC.test(sel)) return false;
      const base = sel.replace(PSEUDO_EL, '').trim() || '*';
      try {
        return document.querySelector(base) !== null;
      } catch (e) {
        return true;
      }
    }

    const keyframes = [];
    function walk(rules) {
      let out = '';
      for (const r of rules) {
        const ctor = r.constructor.name;
        if (ctor === 'CSSStyleRule') {
          if (splitSelectors(r.selectorText).some(matches)) out += r.cssText;
        } else if (ctor === 'CSSMediaRule') {
          const inner = walk(r.cssRules);
          if (inner) out += `@media ${r.conditionText}{${inner}}`;
        } else if (ctor === 'CSSSupportsRule') {
          const inner = walk(r.cssRules);
          if (inner) out += `@supports ${r.conditionText}{${inner}}`;
        } else if (ctor === 'CSSFontFaceRule') {
          // Italic faces are not needed for the first paint: they arrive with the full stylesheet,
          // so their download does not compete with the LCP window.
          if (!/font-style:\s*italic/.test(r.cssText)) out += r.cssText;
        } else if (ctor === 'CSSKeyframesRule') {
          keyframes.push(r);
        } else if (ctor === 'CSSImportRule') {
          /* none expected */
        } else {
          out += r.cssText;
        }
      }
      return out;
    }

    let out = '';
    for (const sheet of document.styleSheets) {
      if (!sheet.href || !sheet.href.includes('theme.min.css')) continue;
      out += walk(sheet.cssRules);
    }
    for (const k of keyframes) if (out.includes(k.name)) out += k.cssText;
    return out;
  });

  if (!css || css.length < 5000) throw new Error('critical CSS looks empty - is theme.min.css loading on ' + url + '?');

  // Make asset urls portable: inc/performance.php swaps {{T}} for the theme's /assets URL.
  let portable = css
    .replace(/url\((['"]?)(?:https?:)?\/\/[^)'"]*?\/franciscan-society\/assets\//g, 'url($1{{T}}/')
    .replace(/url\((['"]?)\.\.\//g, 'url($1{{T}}/');

  const min = transform({ filename: 'critical.css', code: Buffer.from(portable), minify: true, errorRecovery: true }).code;
  fs.writeFileSync(path.join(cssDir, outName), min);
  console.log(`${outName}: ${(css.length / 1024).toFixed(0)} KB raw -> ${(min.length / 1024).toFixed(0)} KB minified`);
} finally {
  await browser.close();
}
