<?php
/**
 * Template Name: News Archive
 *
 * @package Franciscan_Society
 */

get_header();

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );

// Query posts with category 'news' or all posts if not categorized
$news_query = new WP_Query( array(
    'category_name'  => 'news',
    'posts_per_page' => 6,
    'paged'          => $paged,
    'post_status'    => 'publish',
) );

if ( ! $news_query->have_posts() ) {
    $news_query = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'paged'          => $paged,
        'post_status'    => 'publish',
    ) );
}
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
    <section style="padding: clamp(3rem, 5vw, 5rem) 2rem; background-color: #FAF8F5; max-width: 1320px; margin: 0 auto;">
        
        <?php if ( $news_query->have_posts() ) : ?>
            <div class="news-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 2.5rem;">
                <?php while ( $news_query->have_posts() ) : $news_query->the_post();
                    $cats = get_the_category();
                    $cat_label = ! empty( $cats ) ? $cats[0]->name : 'News';
                    $thumb_url = has_post_thumbnail() 
                        ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) 
                        : esc_url( FRANCISCAN_THEME_URI . '/assets/images/news-blog/IMG20230215103348.jpg.jpeg' );
                    $excerpt = get_the_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 18, '...' );
                ?>
                    <article class="news-card">
                        <div class="news-thumb-wrap">
                            <img loading="lazy" src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>">
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.6rem;">
                            <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.78rem; color: #8b6f47; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em;">
                                <?php echo esc_html( $cat_label ); ?>
                            </span>
                            <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.78rem; color: #a8a29e;">
                                📅 <?php echo get_the_date( 'M j, Y' ); ?>
                            </span>
                        </div>
                        <h3 class="news-card-title">
                            <?php the_title(); ?>
                        </h3>
                        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.6; margin-bottom: 1.5rem; flex-grow: 1;">
                            <?php echo esc_html( $excerpt ); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" style="font-family: 'Instrument Sans', sans-serif; font-weight: 800; font-size: 0.88rem; color: #1c1917; text-transform: uppercase; letter-spacing: 0.06em; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem; transition: color 0.2s;">
                            <span>READ MORE</span> <span>&rarr;</span>
                        </a>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <!-- Pagination -->
            <?php
            $big = 999999999;
            $pagination_links = paginate_links( array(
                'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'    => '?paged=%#%',
                'current'   => max( 1, $paged ),
                'total'     => $news_query->max_num_pages,
                'prev_text' => '&larr; Previous',
                'next_text' => 'Next &rarr;',
                'type'      => 'array',
            ) );
            if ( ! empty( $pagination_links ) ) : ?>
                <div class="fs-pagination-wrapper">
                    <nav class="fs-pagination-nav">
                        <?php foreach ( $pagination_links as $link ) : ?>
                            <?php echo $link; ?>
                        <?php endforeach; ?>
                    </nav>
                </div>
            <?php endif; ?>

        <?php else : ?>
            <div style="text-align:center; padding:5rem 2rem;">
                <h3 style="font-family:'Phudu', serif; font-size:1.8rem; color:#1c1917; margin-bottom:1rem;">No News Posts Found</h3>
                <p style="font-family:'Instrument Sans', sans-serif; color:#78716c;">New articles published from Franciscan Studio will appear here.</p>
            </div>
        <?php endif; ?>

    </section>
</main>

<?php
get_footer();
