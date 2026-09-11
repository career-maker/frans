<?php
/**
 * Search Results Template
 *
 * @package Franciscan_Society
 */

get_header();

global $wp_query;
$search_query = get_search_query();
$total_results = $wp_query->found_posts;
?>

<style>
    body { padding-top: 80px; }
    @media (max-width: 991px) { body { padding-top: 0; } }

    .search-page-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 3rem 1.5rem 5rem 1.5rem;
    }

    .search-header-card {
        background: linear-gradient(135deg, #4A2A18 0%, #6b3d28 100%);
        color: #ffffff;
        padding: clamp(2.5rem, 5vw, 4rem) clamp(1.8rem, 5vw, 3.5rem);
        border-radius: 24px;
        margin-bottom: 3rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(74,42,24,0.18);
    }

    .search-header-card .vine-corner-watermark {
        position: absolute;
        top: 0;
        right: 0;
        width: clamp(260px, 34vw, 520px);
        height: 100%;
        object-fit: contain;
        object-position: top right;
        pointer-events: none;
        opacity: 0.35;
        filter: brightness(1.6) contrast(1.1);
        z-index: 1;
    }

    .search-header-content {
        position: relative;
        z-index: 2;
        max-width: 780px;
    }

    .search-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: 'Instrument Sans', sans-serif;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #e6c888;
        margin-bottom: 0.8rem;
    }

    .search-title {
        font-family: 'Phudu', sans-serif;
        font-size: clamp(2rem, 4.5vw, 3.2rem);
        font-weight: 700;
        color: #ffffff;
        text-transform: uppercase;
        line-height: 1.15;
        margin: 0 0 1rem 0;
    }

    .search-form-wrap {
        margin-top: 1.8rem;
        position: relative;
        max-width: 640px;
    }

    .search-input-group {
        display: flex;
        align-items: center;
        background: #ffffff;
        border-radius: 50px;
        padding: 0.4rem 0.5rem 0.4rem 1.4rem;
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        border: 2px solid transparent;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .search-input-group:focus-within {
        border-color: #e6c888;
        box-shadow: 0 8px 28px rgba(230, 200, 136, 0.3);
    }

    .search-input-field {
        border: none;
        outline: none;
        background: transparent;
        font-family: 'Instrument Sans', sans-serif;
        font-size: 1rem;
        color: #1c1917;
        flex: 1;
        min-width: 0;
    }

    .search-submit-btn {
        background: #4A2A18;
        color: #ffffff;
        border: none;
        outline: none;
        border-radius: 50px;
        padding: 0.75rem 1.6rem;
        font-family: 'Instrument Sans', sans-serif;
        font-size: 0.9rem;
        font-weight: 700;
        cursor: pointer;
        transition: background-color 0.2s ease, transform 0.15s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .search-submit-btn:hover {
        background: #6b3d28;
        transform: scale(1.02);
    }

    .search-results-meta {
        font-family: 'Instrument Sans', sans-serif;
        font-size: 0.95rem;
        color: #57534e;
        margin-bottom: 2rem;
        padding-bottom: 0.8rem;
        border-bottom: 1px solid #ebe8e3;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.8rem;
    }

    .search-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
        margin-bottom: 3.5rem;
    }

    .search-card {
        background: #FAF7F0;
        border: 1px solid rgba(74,42,24,0.08);
        border-radius: 20px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 4px 18px rgba(74,42,24,0.04);
    }

    .search-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 36px rgba(74,42,24,0.1);
        border-color: rgba(230, 200, 136, 0.5);
    }

    .search-card-thumb-wrap {
        width: 100%;
        height: 200px;
        position: relative;
        overflow: hidden;
        background: #1c1917;
    }

    .search-card-thumb {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }

    .search-card:hover .search-card-thumb {
        transform: scale(1.04);
    }

    .search-card-body {
        padding: 1.6rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        justify-content: space-between;
    }

    .search-card-badge {
        display: inline-block;
        font-family: 'Instrument Sans', sans-serif;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        background: #4A2A18;
        color: #e6c888;
        padding: 0.25rem 0.65rem;
        border-radius: 4px;
        margin-bottom: 0.75rem;
        align-self: flex-start;
    }

    .search-card-title {
        font-family: 'Phudu', sans-serif;
        font-size: 1.22rem;
        font-weight: 700;
        color: #1c1917;
        line-height: 1.32;
        margin: 0 0 0.65rem 0;
    }

    .search-card-title a {
        color: inherit;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .search-card-title a:hover {
        color: #4A2A18;
    }

    .search-card-excerpt {
        font-family: 'Instrument Sans', sans-serif;
        font-size: 0.92rem;
        color: #57534e;
        line-height: 1.58;
        margin-bottom: 1.2rem;
    }

    .search-card-link {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-family: 'Instrument Sans', sans-serif;
        font-size: 0.88rem;
        font-weight: 700;
        color: #4A2A18;
        text-decoration: none;
        transition: gap 0.2s ease, color 0.2s ease;
        margin-top: auto;
    }

    .search-card-link:hover {
        gap: 0.6rem;
        color: #6b3d28;
    }

    /* Empty state card */
    .search-empty-card {
        background: #FAF7F0;
        border: 2px dashed rgba(74,42,24,0.15);
        border-radius: 24px;
        padding: clamp(3rem, 6vw, 4.5rem) 2rem;
        text-align: center;
        max-width: 800px;
        margin: 2rem auto 4rem auto;
    }

    .search-empty-icon {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: rgba(74,42,24,0.06);
        color: #4A2A18;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin-bottom: 1.5rem;
    }

    .search-empty-title {
        font-family: 'Phudu', sans-serif;
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 700;
        color: #1c1917;
        margin: 0 0 0.8rem 0;
    }

    .search-empty-desc {
        font-family: 'Instrument Sans', sans-serif;
        font-size: 1rem;
        color: #57534e;
        line-height: 1.6;
        max-width: 600px;
        margin: 0 auto 2rem auto;
    }

    .search-quick-links {
        display: flex;
        flex-wrap: wrap;
        gap: 0.6rem;
        justify-content: center;
        margin-top: 1.5rem;
    }

    .search-quick-link-btn {
        background: #ffffff;
        border: 1px solid rgba(74,42,24,0.12);
        color: #4A2A18;
        font-family: 'Instrument Sans', sans-serif;
        font-size: 0.84rem;
        font-weight: 700;
        padding: 0.5rem 1.1rem;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .search-quick-link-btn:hover {
        background: #4A2A18;
        color: #ffffff;
        border-color: #4A2A18;
        transform: translateY(-2px);
    }
</style>

<main id="main-content" style="background:#ffffff; min-height:80vh;">
    <div class="search-page-container">

        <!-- Search Header Card -->
        <section class="search-header-card">
            <img src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/shapes/vine-corner-watermark.png' ); ?>" class="vine-corner-watermark" alt="" aria-hidden="true">
            <div class="search-header-content">
                <div class="search-eyebrow">
                    <span style="width: 6px; height: 6px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                    <span>Search The Franciscan Society</span>
                </div>
                <h1 class="search-title">
                    <?php if ( ! empty( $search_query ) ) : ?>
                        Results for: “<?php echo esc_html( $search_query ); ?>”
                    <?php else : ?>
                        Search Our Website
                    <?php endif; ?>
                </h1>
                <p style="font-family:'Instrument Sans', sans-serif; color:rgba(255,255,255,0.9); font-size:1.05rem; line-height:1.55; margin:0;">
                    Search across our news chronicles, community history, friars directory, ministries, publications, and provincial resources.
                </p>

                <!-- Search Input Form -->
                <div class="search-form-wrap">
                    <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="search-input-group">
                            <input type="search" class="search-input-field" placeholder="Type keywords, names, or topics..." value="<?php echo esc_attr( $search_query ); ?>" name="s" required>
                            <button type="submit" class="search-submit-btn">
                                <svg style="width:16px; height:16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                <span>Search</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Search Results Section -->
        <?php if ( have_posts() && ! empty( $search_query ) ) : ?>

            <div class="search-results-meta">
                <span>Showing <strong><?php echo esc_html( (string) $total_results ); ?></strong> <?php echo _n( 'result', 'results', $total_results, 'franciscan' ); ?> for <em>“<?php echo esc_html( $search_query ); ?>”</em></span>
                <span style="font-size:0.85rem; color:#78716c;">Page <?php echo max( 1, get_query_var( 'paged' ) ); ?> of <?php echo max( 1, $wp_query->max_num_pages ); ?></span>
            </div>

            <div class="search-grid">
                <?php while ( have_posts() ) : the_post();
                    $post_type = get_post_type();
                    $categories = get_the_category();
                    $badge_label = ! empty( $categories ) ? $categories[0]->name : ( 'page' === $post_type ? 'Page' : 'Article' );
                    $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) : FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_24_08_PM.png';
                ?>
                    <article class="search-card">
                        <div class="search-card-thumb-wrap">
                            <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                                <img src="<?php echo esc_url( $thumb_url ); ?>" class="search-card-thumb" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                            </a>
                        </div>
                        <div class="search-card-body">
                            <div>
                                <span class="search-card-badge"><?php echo esc_html( $badge_label ); ?></span>
                                <h2 class="search-card-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <div class="search-card-excerpt">
                                    <?php echo wp_trim_words( get_the_excerpt(), 22, '…' ); ?>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="search-card-link">
                                <span>Read More</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div style="margin-top: 3rem; text-align: center;">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '&larr; Previous',
                    'next_text' => 'Next &rarr;',
                ) );
                ?>
            </div>

        <?php else : ?>

            <!-- Empty Search State -->
            <div class="search-empty-card">
                <div class="search-empty-icon">🔍</div>
                <h2 class="search-empty-title">
                    <?php if ( ! empty( $search_query ) ) : ?>
                        No Results Found for “<?php echo esc_html( $search_query ); ?>”
                    <?php else : ?>
                        Please Enter a Search Term
                    <?php endif; ?>
                </h2>
                <p class="search-empty-desc">
                    We couldn't find any articles, pages, or records matching your query. Please verify your spelling, try broader keywords, or navigate using our popular community links below.
                </p>

                <div style="font-family:'Instrument Sans', sans-serif; font-size:0.85rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#78716c; margin-bottom:0.8rem;">
                    Popular Sections &amp; Resources
                </div>
                <div class="search-quick-links">
                    <a href="<?php echo esc_url( home_url( '/community-friars/' ) ); ?>" class="search-quick-link-btn">👥 Our Friars</a>
                    <a href="<?php echo esc_url( home_url( '/community-friaries/' ) ); ?>" class="search-quick-link-btn">🏘️ Our Friaries</a>
                    <a href="<?php echo esc_url( home_url( '/community-leadership/' ) ); ?>" class="search-quick-link-btn">👑 Leadership</a>
                    <a href="<?php echo esc_url( home_url( '/ministries/' ) ); ?>" class="search-quick-link-btn">✝️ Ministries</a>
                    <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="search-quick-link-btn">📰 News &amp; Events</a>
                    <a href="<?php echo esc_url( home_url( '/publications/' ) ); ?>" class="search-quick-link-btn">📚 Publications</a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="search-quick-link-btn">📞 Contact Us</a>
                </div>
            </div>

        <?php endif; ?>

    </div>
</main>

<?php
get_footer();
