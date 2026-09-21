"""Self-host the Google Fonts used by the theme (latin + latin-ext subsets only).

Usage:  python tools/fetch_fonts.py
Writes: assets/fonts/*.woff2 and assets/css/fonts.css
"""
import os, re, sys, urllib.request

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
UA = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36"
URL = ("https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,400"
       "&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Phudu:wght@400..900&display=swap")
KEEP = ("latin", "latin-ext")


def get(url):
    req = urllib.request.Request(url, headers={"User-Agent": UA})
    return urllib.request.urlopen(req, timeout=60).read()


css = get(URL).decode("utf8")
out, seen = [], {}
for subset, body in re.findall(r"/\*\s*([\w-]+)\s*\*/\s*@font-face\s*\{([^}]*)\}", css):
    if subset not in KEEP:
        continue
    fam = re.search(r"font-family:\s*'([^']+)'", body).group(1)
    style = re.search(r"font-style:\s*(\w+)", body).group(1)
    weight = re.search(r"font-weight:\s*([\d ]+)", body).group(1).strip()
    src = re.search(r"url\((https://[^)]+\.woff2)\)", body).group(1)
    rng = re.search(r"unicode-range:\s*([^;]+);", body).group(1)
    slug = re.sub(r"[^a-z0-9]+", "-", fam.lower()).strip("-")
    fname = f"{slug}-{style}-{weight.replace(' ', '-')}-{subset}.woff2"
    if fname not in seen:
        with open(os.path.join(ROOT, "assets", "fonts", fname), "wb") as fh:
            fh.write(get(src))
        seen[fname] = True
    out.append(
        "@font-face{font-family:'%s';font-style:%s;font-weight:%s;font-display:swap;"
        "src:url(../fonts/%s) format('woff2');unicode-range:%s}" % (fam, style, weight, fname, rng)
    )

with open(os.path.join(ROOT, "assets", "css", "fonts.css"), "w", encoding="utf8") as fh:
    fh.write("\n".join(out) + "\n")
print("fonts:", len(seen), "faces:", len(out))
for f in sorted(seen):
    print(f, os.path.getsize(os.path.join(ROOT, "assets", "fonts", f)))
