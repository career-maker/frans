"""Generate WebP siblings for every PNG/JPEG under assets/images.

  name.webp     full-size rendition (longest side capped at 1920px)
  name-sm.webp  900px-wide rendition for phones, only for images wider than 1000px;
                inc/performance.php serves it to mobile user agents

The theme rewrites *.png|jpg|jpeg asset URLs to the .webp sibling at output time
(see inc/performance.php) and the CSS build does the same for url() references,
so originals stay untouched as fallbacks / editing sources.

Usage:  python tools/optimize_images.py [--force]
"""
import os, sys
from PIL import Image, ImageOps

ROOT = os.path.join(os.path.dirname(os.path.dirname(os.path.abspath(__file__))), "assets", "images")
FORCE = "--force" in sys.argv
MAX_SIDE = 1920          # longest side cap for anything larger (full-bleed banners)
QUALITY = 78
# Decorative / small-display files that can be shrunk far below their source size.
MAX_SIDE_OVERRIDE = {
    "shapes/vine-corner-watermark.png": 800,
}

# Extra small renditions for images that are displayed tiny somewhere (name -> longest side, px).
# Written as "<name>-avatar.webp"; templates reference these explicitly.
AVATARS = {"fr-manoj-vengathanam.png": 128}

saved = 0
count = 0
for rel, side in AVATARS.items():
    src = os.path.join(ROOT, rel)
    dst = os.path.splitext(src)[0] + "-avatar.webp"
    if os.path.exists(src) and (FORCE or not os.path.exists(dst)):
        im = Image.open(src).convert("RGBA")
        im.thumbnail((side, side), Image.LANCZOS)
        im.save(dst, "WEBP", quality=82, method=6, alpha_quality=90)
        print("avatar", os.path.basename(dst), os.path.getsize(dst), "bytes")
for base, _dirs, files in os.walk(ROOT):
    for name in files:
        low = name.lower()
        if not low.endswith((".png", ".jpg", ".jpeg")):
            continue
        src = os.path.join(base, name)
        rel = os.path.relpath(src, ROOT).replace("\\", "/")
        dst = os.path.splitext(src)[0] + ".webp"
        dst_sm = os.path.splitext(src)[0] + "-sm.webp"
        fresh = lambda f: os.path.exists(f) and os.path.getmtime(f) >= os.path.getmtime(src)
        try:
            im = Image.open(src)
            im = ImageOps.exif_transpose(im)
            has_alpha = im.mode in ("RGBA", "LA") or (im.mode == "P" and "transparency" in im.info)
            im = im.convert("RGBA" if has_alpha else "RGB")
            if FORCE or not fresh(dst):
                full = im
                cap = MAX_SIDE_OVERRIDE.get(rel, MAX_SIDE)
                if max(full.size) > cap:
                    r = cap / max(full.size)
                    full = full.resize((max(1, round(full.width * r)), max(1, round(full.height * r))), Image.LANCZOS)
                full.save(dst, "WEBP", quality=72 if full.width > 1400 else QUALITY, method=6, alpha_quality=90)
                o, n = os.path.getsize(src), os.path.getsize(dst)
                if n >= o:            # never ship a bigger file than the original
                    os.remove(dst)
                    continue
                saved += o - n
                count += 1
            if os.path.exists(dst) and im.width > 1000 and (FORCE or not fresh(dst_sm)):
                sm = im.resize((900, max(1, round(im.height * 900 / im.width))), Image.LANCZOS)
                sm.save(dst_sm, "WEBP", quality=74, method=6, alpha_quality=85)
                if os.path.getsize(dst_sm) >= os.path.getsize(dst):
                    os.remove(dst_sm)
        except Exception as exc:  # keep going, report at the end
            print("SKIP", rel, exc)
            continue
print(f"webp written: {count}, saved {saved/1e6:.1f} MB")
