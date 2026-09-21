# Theme build tools

Generated assets that the theme serves (`assets/css/theme.min.css`, `assets/css/critical-home.css`,
`assets/fonts/*`, `assets/images/**/*.webp`) come from these scripts. Re-run them after editing the
source files, then commit the outputs.

| Task | Command | Output |
| --- | --- | --- |
| Minified CSS bundle (fonts + design-system + styles + bible-widget) | `cd tools && npm i && node build-css.mjs` | `assets/css/theme.min.css` |
| Critical CSS for the home page (site must be running locally) | `node build-critical.mjs http://fransiscan.local/ critical-home.css` | `assets/css/critical-home.css` |
| WebP renditions (`x.webp`, and `x-sm.webp` for phones when wider than 1000px) | `python tools/optimize_images.py` (`--force` to redo all) | next to each PNG/JPEG in `assets/images` |
| Self-hosted Google Fonts (latin + latin-ext) | `python tools/fetch_fonts.py` | `assets/fonts/*.woff2`, `assets/css/fonts.css` |
| Shrink the embedded PNG in `logo.svg` | `python tools/optimize_logo.py` | `assets/images/logo.svg` |

Order matters: `build-css.mjs` first, then `build-critical.mjs` (it extracts from the bundle).

`theme.min.css` is only used while it is newer than the source stylesheets (see `inc/setup.php`);
otherwise the theme falls back to the readable sources, so a forgotten rebuild is slower, not broken.
`critical-home.css` is inlined by `inc/performance.php` and is *not* checked for staleness - rebuild it
whenever the home page markup or the stylesheets change materially.

Runtime pieces live in `inc/performance.php` (gzip, `.htaccess` cache/compress block, WebP swap,
lazy image loader, critical CSS wiring, full-page cache).
