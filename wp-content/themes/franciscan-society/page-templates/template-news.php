<?php
/**
 * Template Name: News Archive
 *
 * @package Franciscan_Society
 */

get_header();
?>

<style>
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
    .news-card:hover .news-thumb-wrap img {
        transform: scale(1.05);
    }
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
    .news-card:hover .news-card-title {
        color: #C5A963;
    }

    /* Luxury Pagination */
    .fs-pagination-wrapper {
        margin-top: 4rem;
        display: flex;
        justify-content: center;
    }
    .fs-pagination-nav {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
    }
    .fs-pagination-nav .page-numbers {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 44px;
        height: 44px;
        padding: 0 1rem;
        border-radius: 10px;
        background: #FAF8F5;
        border: 1.5px solid rgba(230, 200, 136, 0.35);
        color: #1c1917;
        font-family: 'Instrument Sans', sans-serif;
        font-weight: 700;
        font-size: 0.9rem;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .fs-pagination-nav .page-numbers:hover,
    .fs-pagination-nav .page-numbers.current {
        background: #4A2A18;
        border-color: #4A2A18;
        color: #FFFFFF;
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(74, 42, 24, 0.25);
    }
    .fs-pagination-nav .page-numbers.dots {
        background: transparent;
        border: none;
        cursor: default;
        transform: none;
        box-shadow: none;
    }
</style>

<main id="main-content" style="padding-top: 0; background-color: #FFFFFF;">
    <!-- Page Hero Banner -->
    <section class="page-hero-banner" style="padding: 12rem 2rem 8rem 2rem; background-image: url('<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/hero-banner-aug20.jpeg' ); ?>'); background-size: cover; background-position: center; position: relative; overflow: hidden;">
        <div style="position: absolute; inset: 0; background-color: rgba(12, 11, 10, 0.72);"></div>
        <div style="max-width: 800px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
            <div class="hero-badge" style="display: inline-flex; align-items: center; gap: 0.6rem; background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); padding: 0.5rem 1.2rem; border-radius: 50px; margin-bottom: 1.5rem; border: 1px solid rgba(255,255,255,0.25);">
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

    <!-- News Grid Section -->
    <section style="padding: clamp(3rem, 5vw, 5rem) 2rem; background-color: #FAF8F5; margin: 0 auto;">

        <div style="max-width: 1320px; margin: 0 auto; display: flex; justify-content: center;">

            <!-- Seminar on New Labour Code -->
            <article class="news-card" style="max-width: 620px; width: 100%;">
                <div class="news-thumb-wrap" style="height: 320px;">
                    <img loading="eager" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/seminar-labour-code.jpeg' ); ?>" alt="Seminar on New Labour Code at Hardag, Ranchi">
                </div>
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.8rem;">
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.75rem; color: #8b6f47; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; background: rgba(139,111,71,0.08); padding: 0.25rem 0.7rem; border-radius: 50px;">Province News</span>
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.78rem; color: #a8a29e;">📅 Aug 29, 2026</span>
                </div>
                <h3 class="news-card-title">Seminar on "New Labour Code" Held at Hardag, Ranchi</h3>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.97rem; color: #57534e; line-height: 1.75; margin-bottom: 1.2rem; flex-grow: 1;">
                    A one-day seminar on "New Labour Code" was organized by the St. Francis Province, Ranchi, on 29 August 2026 at Moments Resorts, Hardag, Ranchi. The seminar was attended by around fifty participants. Besides the TOR friars involved in the education ministry, the programme was attended by several principals from different parts of Jharkhand.
                </p>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.97rem; color: #57534e; line-height: 1.75; margin-bottom: 1.2rem;">
                    The programme was graced by the presence of Very Rev. Fr. Manoj Vengathanam, TOR, Minister Provincial of Ranchi Province.
                </p>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.97rem; color: #57534e; line-height: 1.75; margin-bottom: 1.2rem;">
                    Mr. Shammi Joseph Tigga, Welfare Commissioner (C), served as the resource person and led the two sessions of the seminar. The sessions offered a comprehensive introduction to the four Labour Codes, namely the Code on Wages, the Industrial Relations Code, the Code on Social Security, and the Occupational Safety, Health and Working Conditions Code. The presentations highlighted important provisions relating to minimum wages, timely payment of wages, social security, industrial relations, workplace safety, and the welfare and working conditions of employees.
                </p>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.97rem; color: #57534e; line-height: 1.75; margin-bottom: 1.2rem;">
                    The seminar provided the participants with a valuable opportunity for learning, dialogue, and reflection on the implications of the new Labour Codes, particularly in the context of educational institutions and employment practices.
                </p>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.97rem; color: #57534e; line-height: 1.75; margin-bottom: 1.6rem;">
                    The programme was coordinated by Fr. Manoj Kullu, TOR, and Fr. Shaji Alappurath, TOR.
                </p>
            </article>

        </div>

    </section>
</main>

<?php
get_footer();
