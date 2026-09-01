<?php
/**
 * Template Name: News Archive
 *
 * @package Franciscan_Society
 */

get_header();

$view = isset( $_GET['view'] ) ? sanitize_text_field( $_GET['view'] ) : 'list';

// For detail view — replicate single.php logic for our hardcoded article
$reading_time = 2; // approx
$banner_bg = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/hero-banner-aug20.jpeg';
?>

<?php if ( 'detail' === $view ) : ?>
<!-- Reading Progress Bar -->
<div id="reading-progress-bar" style="position:fixed; top:0; left:0; height:3px; width:0%; background:linear-gradient(90deg, #C5A963, #e6c888); z-index:10001; transition:width 0.1s ease;"></div>
<?php endif; ?>

<style>
    /* ── News Card (List View) ── */
    .news-card {
        display: flex;
        flex-direction: column;
        background: #FFFFFF;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid rgba(230, 200, 136, 0.2);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease, border-color 0.3s ease;
        padding: 1.5rem;
    }
    .news-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 45px rgba(74, 42, 24, 0.12);
        border-color: rgba(197, 169, 99, 0.4);
    }
    .news-thumb-wrap {
        border-radius: 14px;
        overflow: hidden;
        height: 240px;
        margin-bottom: 1.2rem;
        background-color: #d6ccc2;
        position: relative;
    }
    .news-thumb-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .news-card:hover .news-thumb-wrap img { transform: scale(1.05); }
    .news-card-title {
        font-family: 'Phudu', serif;
        font-size: 1.15rem;
        font-weight: 700;
        color: #1c1917;
        text-transform: uppercase;
        line-height: 1.35;
        margin-bottom: 0.8rem;
        border-bottom: 1px solid rgba(0,0,0,0.08);
        padding-bottom: 0.8rem;
        transition: color 0.2s ease;
    }
    .news-card:hover .news-card-title { color: #C5A963; }

    /* ── Detail View (matches single.php) ── */
    .article-hero-masthead {
        padding: 12rem 2rem 6.5rem 2rem;
        background-image: url('<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/seminar-labour-code.jpeg' ); ?>');
        background-size: cover;
        background-position: center top;
        position: relative;
        overflow: hidden;
        text-align: center;
    }
    .article-hero-overlay {
        position: absolute;
        inset: 0;
        background-color: rgba(12, 11, 10, 0.72);
        backdrop-filter: blur(2px);
        -webkit-backdrop-filter: blur(2px);
    }
    .article-hero-inner {
        max-width: 960px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
        text-align: center;
    }
    .article-breadcrumbs {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        font-family: 'Instrument Sans', sans-serif;
        font-size: 0.82rem;
        color: rgba(255,255,255,0.65);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 1.5rem;
    }
    .article-breadcrumbs a { color: rgba(255,255,255,0.75); text-decoration: none; transition: color 0.2s; }
    .article-breadcrumbs a:hover { color: #e6c888; }
    .article-cat-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(230,200,136,0.15);
        border: 1px solid rgba(230,200,136,0.4);
        color: #e6c888;
        padding: 0.45rem 1.2rem;
        border-radius: 30px;
        font-family: 'Instrument Sans', sans-serif;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 1.2rem;
    }
    .article-headline {
        font-family: 'Phudu', serif;
        font-size: clamp(2.2rem, 4.8vw, 3.6rem);
        font-weight: 800;
        color: #FFFFFF;
        line-height: 1.15;
        letter-spacing: -0.01em;
        margin-bottom: 1.8rem;
        text-transform: uppercase;
    }
    .article-meta-strip {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1.8rem;
        flex-wrap: wrap;
        font-family: 'Instrument Sans', sans-serif;
        font-size: 0.88rem;
        color: rgba(255,255,255,0.85);
    }
    .article-author-chip { display: flex; align-items: center; gap: 0.6rem; }
    .article-author-avatar { width: 34px; height: 34px; border-radius: 50%; border: 1px solid #e6c888; object-fit: cover; }
    .article-body-layout {
        max-width: 1200px;
        margin: -2.5rem auto 4rem auto;
        padding: 0 1.5rem;
        position: relative;
        z-index: 10;
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 3.5rem;
    }
    @media (max-width: 991px) {
        .article-body-layout { grid-template-columns: 1fr; margin-top: 2rem; gap: 2.5rem; }
    }
    .article-main-card {
        background: #FFFFFF;
        border-radius: 24px;
        padding: 3.5rem;
        box-shadow: 0 20px 60px rgba(0,0,0,0.08);
        border: 1px solid rgba(230,200,136,0.25);
    }
    @media (max-width: 768px) { .article-main-card { padding: 2rem 1.5rem; border-radius: 16px; } }
    .article-featured-wrapper {
        border-radius: 18px;
        overflow: hidden;
        margin-bottom: 3rem;
        border: 1px solid rgba(230,200,136,0.3);
        box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        max-height: 520px;
        background: #111;
    }
    .article-featured-wrapper img { width: 100%; height: 100%; max-height: 520px; object-fit: cover; display: block; transition: transform 0.6s cubic-bezier(0.16,1,0.3,1); }
    .article-featured-wrapper:hover img { transform: scale(1.03); }
    .article-prose { font-family: 'Instrument Sans', sans-serif; font-size: 1.05rem; line-height: 1.9; color: #292524; }
    .article-prose p { margin-bottom: 1.8rem; }
    .article-prose p:first-of-type::first-letter {
        font-family: 'Phudu', serif;
        font-size: 3.8rem;
        float: left;
        line-height: 0.8;
        margin: 0.15rem 0.8rem 0 0;
        color: #C5A963;
        font-weight: 800;
    }
    .article-share-strip {
        display: flex; align-items: center; justify-content: space-between;
        padding: 1.8rem 0; border-top: 1px solid rgba(0,0,0,0.08); border-bottom: 1px solid rgba(0,0,0,0.08);
        margin: 3rem 0; flex-wrap: wrap; gap: 1rem;
    }
    .share-label { font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; color: #78716c; font-family: 'Instrument Sans', sans-serif; }
    .share-buttons { display: flex; gap: 0.75rem; flex-wrap: wrap; }
    .share-btn { display: inline-flex; align-items: center; gap: 0.55rem; padding: 0.6rem 1.2rem; border-radius: 8px; font-size: 0.85rem; font-weight: 700; text-decoration: none; transition: all 0.25s ease; border: 1px solid transparent; cursor: pointer; font-family: 'Instrument Sans', sans-serif; }
    .share-btn-wa { background: rgba(37,211,102,0.12); color: #128C7E; border-color: rgba(37,211,102,0.35); }
    .share-btn-wa:hover { background: #25D366; color: #fff; border-color: #25D366; transform: translateY(-1px); }
    .share-btn-fb { background: rgba(24,119,242,0.1); color: #1877F2; border-color: rgba(24,119,242,0.35); }
    .share-btn-fb:hover { background: #1877F2; color: #fff; border-color: #1877F2; transform: translateY(-1px); }
    .share-btn-copy { background: #F5F5F4; color: #44403c; border-color: #E7E5E4; }
    .share-btn-copy:hover { background: #E7E5E4; color: #1c1917; transform: translateY(-1px); }
    .provincial-blessing-card {
        background: radial-gradient(circle at 50% 50%, #162238 0%, #0c1727 100%);
        border: 1px solid rgba(230,200,136,0.35);
        border-radius: 16px;
        padding: 2.2rem;
        color: #fff;
        text-align: center;
        margin: 3rem 0;
        position: relative;
        overflow: hidden;
    }
    .provincial-blessing-card h4 { font-family: 'Phudu', serif; color: #e6c888; font-size: 1.3rem; margin-bottom: 0.6rem; }
    .provincial-blessing-card p { font-family: 'Instrument Sans', sans-serif; font-size: 0.98rem; color: rgba(255,255,255,0.85); line-height: 1.7; margin: 0; }
    .luxury-sidebar-widget { background: #fff; border-radius: 18px; padding: 2rem; border: 1px solid rgba(230,200,136,0.25); box-shadow: 0 10px 30px rgba(0,0,0,0.05); margin-bottom: 2rem; }
    .luxury-sidebar-title { font-family: 'Phudu', serif; font-size: 1.2rem; font-weight: 700; color: #0c1727; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1.4rem; padding-bottom: 0.8rem; border-bottom: 2px solid #e6c888; display: flex; align-items: center; gap: 0.5rem; }
    .sidebar-prayer-box { background: radial-gradient(circle at 50% 50%, #162238 0%, #0c1727 100%) !important; border: 1px solid rgba(230,200,136,0.35); border-radius: 18px; padding: 2.2rem; color: #fff; box-shadow: 0 12px 35px rgba(0,0,0,0.15); }
    .sidebar-prayer-box h4 { font-family: 'Phudu', serif; color: #e6c888; font-size: 1.3rem; margin-bottom: 0.6rem; }
    .sidebar-prayer-box p { font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem; color: rgba(255,255,255,0.85); line-height: 1.65; margin-bottom: 1.5rem; }
</style>

<main id="main-content" style="background:#FBF9F5; min-height:100vh; padding-top:0;">

<?php if ( 'detail' === $view ) : ?>

    <!-- ── NEWS DETAIL VIEW (matches single.php style) ── -->
    <section class="article-hero-masthead">
        <div class="article-hero-overlay"></div>
        <div class="article-hero-inner">
            <nav class="article-breadcrumbs">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <span>/</span>
                <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">News &amp; Updates</a>
                <span>/</span>
                <span style="color:#e6c888;">New Labour Code Seminar</span>
            </nav>
            <div>
                <span class="article-cat-pill">
                    <span style="width:7px;height:7px;background-color:#c8102e;border-radius:50%;display:inline-block;"></span>
                    Province News
                </span>
            </div>
            <h1 class="article-headline">Seminar on "New Labour Code"<br>Held at Hardag, Ranchi</h1>
            <div class="article-meta-strip">
                <div class="article-author-chip">
                    <img src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/fr-manoj-vengathanam.png' ); ?>" class="article-author-avatar" alt="Franciscan Provincial" onerror="this.style.display='none'">
                    <span>Province of St. Francis of Assisi</span>
                </div>
                <span>&bull;</span>
                <div style="display:inline-flex;align-items:center;gap:0.4rem;">
                    <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity:0.85;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    August 29, 2026
                </div>
                <span>&bull;</span>
                <div style="display:inline-flex;align-items:center;gap:0.4rem;">
                    <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity:0.85;"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <?php echo $reading_time; ?> min read
                </div>
            </div>
        </div>
    </section>

    <div class="article-body-layout">
        <!-- Article Content Card -->
        <article class="article-main-card">
            <div class="article-featured-wrapper">
                <img src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/seminar-labour-code.jpeg' ); ?>" alt="Seminar on New Labour Code at Hardag, Ranchi">
            </div>

            <div class="article-prose">
                <p>A one-day seminar on <strong>"New Labour Code"</strong> was organized by the St. Francis Province, Ranchi, on 29 August 2026 at Moments Resorts, Hardag, Ranchi. The seminar was attended by around fifty participants. Besides the TOR friars involved in the education ministry, the programme was attended by several principals from different parts of Jharkhand.</p>
                <p>The programme was graced by the presence of Very Rev. Fr. <strong>Manoj Vengathanam, TOR</strong>, Minister Provincial of Ranchi Province.</p>
                <p>Mr. <strong>Shammi Joseph Tigga</strong>, Welfare Commissioner (C), served as the resource person and led the two sessions of the seminar. The sessions offered a comprehensive introduction to the four Labour Codes, namely the <em>Code on Wages</em>, the <em>Industrial Relations Code</em>, the <em>Code on Social Security</em>, and the <em>Occupational Safety, Health and Working Conditions Code</em>. The presentations highlighted important provisions relating to minimum wages, timely payment of wages, social security, industrial relations, workplace safety, and the welfare and working conditions of employees.</p>
                <p>The seminar provided the participants with a valuable opportunity for learning, dialogue, and reflection on the implications of the new Labour Codes, particularly in the context of educational institutions and employment practices.</p>
                <p>The programme was coordinated by <strong>Fr. Manoj Kullu, TOR</strong>, and <strong>Fr. Shaji Alappurath, TOR</strong>.</p>
            </div>

            <!-- Franciscan Blessing -->
            <div class="provincial-blessing-card">
                <div style="font-size:1.8rem;margin-bottom:0.4rem;color:#e6c888;"><svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="#e6c888" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;"><path d="M12 2v20M7 7h10"/></svg></div>
                <h4>Pax et Bonum &mdash; Peace and Good</h4>
                <p>&ldquo;The Lord bless you and keep you; the Lord make his face shine upon you and be gracious to you; the Lord turn his face toward you and give you peace.&rdquo; &mdash; Numbers 6:24-26</p>
            </div>

            <!-- Share Strip -->
            <div class="article-share-strip">
                <span class="share-label">Share this article:</span>
                <div class="share-buttons">
                    <a href="https://api.whatsapp.com/send?text=<?php echo urlencode( 'Seminar on "New Labour Code" Held at Hardag, Ranchi - ' . home_url( '/news/?view=detail' ) ); ?>" target="_blank" class="share-btn share-btn-wa">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm.01 1.67c4.54 0 8.24 3.7 8.24 8.24 0 2.2-.86 4.28-2.42 5.84a8.19 8.19 0 0 1-5.82 2.41h-.01c-1.46 0-2.89-.39-4.14-1.13l-.3-.18-3.08.81.82-3-.19-.31a8.17 8.17 0 0 1-1.25-4.44c0-4.54 3.7-8.24 8.24-8.24zm4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.25-1.5-1.4-1.75-.14-.25-.02-.39.11-.51.11-.11.25-.29.38-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.71 4.3 3.8.6.26 1.07.42 1.44.53.61.2 1.16.17 1.6.11.49-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.14-1.18-.06-.11-.23-.19-.48-.32z"/></svg>
                        <span>WhatsApp</span>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( home_url( '/news/?view=detail' ) ); ?>" target="_blank" class="share-btn share-btn-fb">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        <span>Facebook</span>
                    </a>
                    <button type="button" class="share-btn share-btn-copy" onclick="(function(btn){ const url='<?php echo esc_js( home_url( '/news/?view=detail' ) ); ?>'; if(navigator.clipboard&&window.isSecureContext){navigator.clipboard.writeText(url);}else{const ta=document.createElement('textarea');ta.value=url;ta.style.position='fixed';ta.style.left='-9999px';document.body.appendChild(ta);ta.select();document.execCommand('copy');ta.remove();} btn.querySelector('span').innerText='Link Copied!';setTimeout(()=>{btn.querySelector('span').innerText='Copy Link';},2500);})(this);">
                        <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        <span>Copy Link</span>
                    </button>
                </div>
            </div>

            <!-- Bottom Navigation -->
            <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem;">
                <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" style="display:inline-flex;align-items:center;gap:0.5rem;color:#C5A963;font-weight:700;text-decoration:none;font-family:'Instrument Sans',sans-serif;">
                    &larr; Back to All News &amp; Updates
                </a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="display:inline-flex;align-items:center;gap:0.5rem;color:#0c1727;font-weight:700;text-decoration:none;font-family:'Instrument Sans',sans-serif;">
                    Submit Prayer Request &rarr;
                </a>
            </div>
        </article>

        <!-- Sidebar -->
        <aside>
            <div class="luxury-sidebar-widget">
                <h3 class="luxury-sidebar-title">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#e6c888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                    Recent Chronicles
                </h3>
                <!-- Only one current news item — link back to list -->
                <a href="<?php echo esc_url( home_url( '/news/?view=detail' ) ); ?>" style="display:flex;gap:1rem;text-decoration:none;align-items:center;">
                    <img src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/seminar-labour-code.jpeg' ); ?>" style="width:78px;height:78px;border-radius:12px;object-fit:cover;flex-shrink:0;border:1px solid rgba(230,200,136,0.25);" alt="Seminar">
                    <div>
                        <h4 style="font-family:'Instrument Sans',sans-serif;font-weight:600;font-size:0.92rem;color:#1c1917;line-height:1.35;">Seminar on "New Labour Code" Held at Hardag</h4>
                        <span style="font-size:0.75rem;color:#78716c;font-family:'Instrument Sans',sans-serif;display:block;margin-top:0.3rem;">Aug 29, 2026</span>
                    </div>
                </a>
            </div>

            <div class="sidebar-prayer-box">
                <div style="font-size:2rem;margin-bottom:0.6rem;color:#e6c888;"><svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="#e6c888" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;"><path d="M12 2v20M7 7h10"/></svg></div>
                <h4>Request Prayer Support</h4>
                <p>Our Franciscan Friars remember all your intentions in our daily community Eucharistic celebrations and Morning Liturgy.</p>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="display:block;text-align:center;background:#e6c888;color:#0c1727;font-weight:700;padding:0.8rem 1.2rem;border-radius:10px;text-decoration:none;font-family:'Instrument Sans',sans-serif;transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                    Send Prayer Intention &rarr;
                </a>
            </div>
        </aside>
    </div>

    <script>
    document.addEventListener('scroll', function() {
        const docEl = document.documentElement;
        const scrollTotal = docEl.scrollHeight - docEl.clientHeight;
        const progress = (window.scrollY / scrollTotal) * 100;
        const bar = document.getElementById('reading-progress-bar');
        if (bar) bar.style.width = Math.min(100, Math.max(0, progress)) + '%';
    }, { passive: true });
    </script>

<?php else : ?>

    <!-- ── NEWS LIST VIEW ── -->
    <section class="page-hero-banner" style="padding: 12rem 2rem 8rem 2rem; background-image: url('<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/hero-banner-aug20.jpeg' ); ?>'); background-size: cover; background-position: center; position: relative; overflow: hidden;">
        <div style="position: absolute; inset: 0; background-color: rgba(12, 11, 10, 0.72);"></div>
        <div style="max-width: 800px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
            <div style="display: inline-flex; align-items: center; gap: 0.6rem; background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); padding: 0.5rem 1.2rem; border-radius: 50px; margin-bottom: 1.5rem; border: 1px solid rgba(255,255,255,0.25);">
                <span style="width: 8px; height: 8px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                <span style="color: #ffffff; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; font-family: 'Instrument Sans', sans-serif;">
                    <?php echo esc_html( franciscan_get_page_field( 'news', 'hero_badge', 'PROVINCE CHRONICLES' ) ); ?>
                </span>
            </div>
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.5rem, 5vw, 4.2rem); font-weight: 800; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.1;">
                <?php echo esc_html( franciscan_get_page_field( 'news', 'hero_title', 'NEWS & UPDATES' ) ); ?>
            </h1>
            <p style="font-family: 'Instrument Sans', sans-serif; font-size: 1.05rem; color: rgba(255,255,255,0.85); line-height: 1.6; margin: 0;">
                <?php echo esc_html( franciscan_get_page_field( 'news', 'hero_subtitle', 'Stay informed with the latest updates, jubilee celebrations, feast days, and missionary reports from Ranchi Province.' ) ); ?>
            </p>
        </div>
    </section>

    <section style="padding: clamp(3rem, 5vw, 5rem) 2rem; background-color: #FAF8F5; max-width: 1320px; margin: 0 auto;">
        <div style="display: flex; justify-content: center;">
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 2.5rem; width: 100%; max-width: 800px;">

                <!-- Seminar on New Labour Code -->
                <article class="news-card">
                    <div class="news-thumb-wrap">
                        <img loading="eager" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/seminar-labour-code.jpeg' ); ?>" alt="Seminar on New Labour Code at Hardag, Ranchi">
                    </div>
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.6rem;">
                        <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.78rem; color: #8b6f47; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em;">Province News</span>
                        <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.78rem; color: #a8a29e;">📅 Aug 29, 2026</span>
                    </div>
                    <h3 class="news-card-title">Seminar on "New Labour Code" Held at Hardag, Ranchi</h3>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.6; margin-bottom: 1.5rem; flex-grow: 1;">
                        A one-day seminar on "New Labour Code" was organized by the St. Francis Province, Ranchi, on 29 August 2026 at Moments Resorts, Hardag, Ranchi. Attended by around fifty participants including TOR friars and principals from across Jharkhand.
                    </p>
                    <a href="<?php echo esc_url( home_url( '/news/?view=detail' ) ); ?>" style="font-family: 'Instrument Sans', sans-serif; font-weight: 800; font-size: 0.88rem; color: #1c1917; text-transform: uppercase; letter-spacing: 0.06em; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem; transition: color 0.2s;">
                        <span>READ MORE</span> <span>&rarr;</span>
                    </a>
                </article>

            </div>
        </div>
    </section>

<?php endif; ?>

</main>

<?php
get_footer();
