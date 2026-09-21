"""Shrink assets/images/logo.svg (an SVG wrapper around a 1026x1196 PNG, ~300 KB).

Re-embeds the emblem as a 270px, 64-colour PNG (visually identical for the flat
line-art emblem) so the file used by the preloader, header and footer is ~17 KB.
Idempotent: skips when the embedded PNG is already small.
"""
import base64, io, os, re
from PIL import Image

path = os.path.join(os.path.dirname(os.path.dirname(os.path.abspath(__file__))), "assets", "images", "logo.svg")
svg = open(path, encoding="utf8").read()
m = re.search(r'xlink:href="data:image/png;base64,([^"]+)"', svg)
if not m:
    raise SystemExit("logo.svg has no embedded PNG (already optimised?)")
raw = base64.b64decode(m.group(1))
if len(raw) < 60_000:
    raise SystemExit("already optimised")
im = Image.open(io.BytesIO(raw)).convert("RGBA")
w = 270
im = im.resize((w, round(im.height * w / im.width)), Image.LANCZOS)
im = im.quantize(colors=64, method=Image.Quantize.FASTOCTREE, dither=Image.Dither.NONE)
buf = io.BytesIO()
im.save(buf, "PNG", optimize=True)
new = base64.b64encode(buf.getvalue()).decode()
svg = svg.replace(m.group(1), new)
open(path, "w", encoding="utf8").write(svg)
print("logo.svg ->", len(svg), "bytes")
