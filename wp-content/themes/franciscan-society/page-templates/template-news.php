<?php
/**
 * Template Name: News Archive
 *
 * @package Franciscan_Society
 */

get_header();
?>

<style>
    .news-article-body p {
        font-family: 'Instrument Sans', sans-serif;
        font-size: 1.05rem;
        color: #44403c;
        line-height: 1.85;
        margin-bottom: 1.4rem;
    }
    .news-article-body p:last-child {
        margin-bottom: 0;
    }
    .news-detail-hero-img {
        width: 100%;
        height: 480px;
        object-fit: cover;
        object-position: center top;
        display: block;
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.13);
    }
    @media (max-width: 768px) {
        .news-detail-hero-img { height: 260px; border-radius: 14px; }
    }
    .news-detail-divider {
        border: none;
        border-top: 1px solid rgba(74,42,24,0.12);
        margin: 2rem 0;
    }
</style>

<main id="main-content" style="padding-top: 0; background-color: #FFFFFF;">

    <!-- Article Hero Banner -->
    <section class="page-hero-banner" style="padding: 11rem 2rem 7rem 2rem; background-image: url('<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/seminar-labour-code.jpeg' ); ?>'); background-size: cover; background-position: center top; position: relative; overflow: hidden;">
        <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(12,11,10,0.55) 0%, rgba(12,11,10,0.80) 100%);"></div>
        <div style="max-width: 860px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
            <div style="display: inline-flex; align-items: center; gap: 0.6rem; background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); padding: 0.45rem 1.2rem; border-radius: 50px; margin-bottom: 1.5rem; border: 1px solid rgba(255,255,255,0.25);">
                <span style="width: 7px; height: 7px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                <span style="color: #ffffff; font-size: 0.82rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; font-family: 'Instrument Sans', sans-serif;">Province News &nbsp;·&nbsp; 29 August 2026</span>
            </div>
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.9rem, 4.5vw, 3.4rem); font-weight: 800; color: #ffffff; text-transform: uppercase; margin: 0; line-height: 1.15; letter-spacing: -0.01em; text-shadow: 0 4px 20px rgba(0,0,0,0.7);">
                Seminar on "New Labour Code"<br>Held at Hardag, Ranchi
            </h1>
        </div>
    </section>

    <!-- Article Body -->
    <section style="padding: clamp(3rem, 5vw, 5rem) 2rem; background-color: #FAF8F5;">
        <div style="max-width: 780px; margin: 0 auto;">

            <!-- Meta row -->
            <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 1rem; margin-bottom: 2.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid rgba(74,42,24,0.12);">
                <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.78rem; color: #8b6f47; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; background: rgba(139,111,71,0.09); padding: 0.3rem 0.85rem; border-radius: 50px;">Province News</span>
                <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; color: #a8a29e; display: flex; align-items: center; gap: 0.35rem;">📅 August 29, 2026</span>
                <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; color: #a8a29e; display: flex; align-items: center; gap: 0.35rem;">📍 Moments Resorts, Hardag, Ranchi</span>
            </div>

            <!-- Article text -->
            <div class="news-article-body">
                <p>
                    A one-day seminar on <strong>"New Labour Code"</strong> was organized by the St. Francis Province, Ranchi, on 29 August 2026 at Moments Resorts, Hardag, Ranchi. The seminar was attended by around fifty participants. Besides the TOR friars involved in the education ministry, the programme was attended by several principals from different parts of Jharkhand.
                </p>
                <p>
                    The programme was graced by the presence of Very Rev. Fr. <strong>Manoj Vengathanam, TOR</strong>, Minister Provincial of Ranchi Province.
                </p>
                <p>
                    Mr. <strong>Shammi Joseph Tigga</strong>, Welfare Commissioner (C), served as the resource person and led the two sessions of the seminar. The sessions offered a comprehensive introduction to the four Labour Codes, namely the <em>Code on Wages</em>, the <em>Industrial Relations Code</em>, the <em>Code on Social Security</em>, and the <em>Occupational Safety, Health and Working Conditions Code</em>. The presentations highlighted important provisions relating to minimum wages, timely payment of wages, social security, industrial relations, workplace safety, and the welfare and working conditions of employees.
                </p>
                <p>
                    The seminar provided the participants with a valuable opportunity for learning, dialogue, and reflection on the implications of the new Labour Codes, particularly in the context of educational institutions and employment practices.
                </p>
                <hr class="news-detail-divider">
                <p style="font-size: 0.95rem !important; color: #78716c !important;">
                    The programme was coordinated by <strong>Fr. Manoj Kullu, TOR</strong>, and <strong>Fr. Shaji Alappurath, TOR</strong>.
                </p>
            </div>

            <!-- Back link -->
            <div style="margin-top: 3rem;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="font-family: 'Instrument Sans', sans-serif; font-weight: 800; font-size: 0.88rem; color: #4A2A18; text-transform: uppercase; letter-spacing: 0.06em; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; border: 1.5px solid rgba(74,42,24,0.25); padding: 0.6rem 1.4rem; border-radius: 50px; transition: all 0.2s ease;" onmouseover="this.style.background='#4A2A18'; this.style.color='#fff';" onmouseout="this.style.background='transparent'; this.style.color='#4A2A18';">
                    ← Back to Home
                </a>
            </div>

        </div>
    </section>

</main>

<?php
get_footer();
