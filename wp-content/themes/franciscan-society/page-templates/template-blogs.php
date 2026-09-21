<?php
/**
 * Template Name: Blogs Archive
 *
 * @package Franciscan_Society
 */

$is_blogs_hidden = ( '1' === (string) franciscan_get_page_field( 'blogs', 'hide_blogs_page', '0' ) ) || ( '1' === (string) get_option( 'franciscan_hide_blogs_page', '0' ) );
if ( $is_blogs_hidden ) {
    wp_safe_redirect( home_url( '/' ) );
    exit;
}

get_header();

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );

// Query posts with category 'blogs' or all posts if not categorized
$blogs_query = new WP_Query( array(
    'category_name'  => 'blogs',
    'posts_per_page' => 6,
    'paged'          => $paged,
    'post_status'    => 'publish',
) );

if ( ! $blogs_query->have_posts() ) {
    $blogs_query = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'paged'          => $paged,
        'post_status'    => 'publish',
    ) );
}
?>

<main id="main-content" style="padding-top: 0; background-color: #FFFFFF;">
    <!-- Page Hero Banner -->
    <?php
    $blogs_hero_badge = franciscan_get_page_field( 'blogs', 'hero_badge', 'FRANCISCAN REFLECTIONS', true );
    $blogs_hero_title = franciscan_get_page_field( 'blogs', 'hero_title', 'BLOGS & ARTICLES', false );
    if ( empty( trim( $blogs_hero_title ) ) ) {
        $blogs_hero_title = 'BLOGS & ARTICLES';
    }
    $blogs_hero_sub   = franciscan_get_page_field( 'blogs', 'hero_subtitle', 'Spiritual reflections, theological essays, and Franciscan wisdom for daily Christian living.', true );
    ?>
    <section class="page-hero-banner" style="padding: 12rem 2rem 8rem 2rem; background-image: url('<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/hero-banner-aug20.jpeg' ); ?>'); background-size: cover; background-position: center; position: relative; overflow: hidden;">
        <div class="hero-overlay page-hero-overlay" style="position: absolute; inset: 0; background-color: rgba(12, 11, 10, 0.50);"></div>
        <div style="max-width: 1320px; margin: 0 auto; padding: 0 clamp(1rem, 5vw, 3rem); position: relative; z-index: 2; text-align: left;">
            <?php if ( ! empty( $blogs_hero_badge ) ) : ?>
            <div class="hero-badge" style="display: inline-flex; align-items: center; gap: 0.6rem; background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); padding: 0.5rem 1.2rem; border-radius: 50px; margin-bottom: 1.5rem; border: 1px solid rgba(255,255,255,0.25);">
                <span style="width: 8px; height: 8px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                <span style="color: #ffffff; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; font-family: 'Instrument Sans', sans-serif;">
                    <?php echo esc_html( $blogs_hero_badge ); ?>
                </span>
            </div>
            <?php endif; ?>
            <?php if ( ! empty( $blogs_hero_title ) ) : ?>
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.4rem, 2.6vw, 2.25rem); font-weight: 800; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.2; text-align: left;">
                <?php echo franciscan_render_rich_text( $blogs_hero_title ); ?>
            </h1>
            <?php endif; ?>
            <?php if ( ! empty( $blogs_hero_sub ) ) : ?>
            <p style="font-family: 'Instrument Sans', sans-serif; font-size: 1.05rem; color: rgba(255,255,255,0.85); line-height: 1.6; margin: 0; text-align: left; font-style: italic;">
                <?php echo franciscan_render_rich_text( $blogs_hero_sub ); ?>
            </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Blogs Grid Section -->
    <section style="padding: clamp(3rem, 5vw, 5rem) 2rem; background-color: #FAF8F5; max-width: 1320px; margin: 0 auto;">
        
        <?php if ( $blogs_query->have_posts() ) : ?>
            <div class="blogs-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 2.5rem;">
                <?php while ( $blogs_query->have_posts() ) : $blogs_query->the_post();
                    $cats = get_the_category();
                    $cat_label = ! empty( $cats ) ? $cats[0]->name : 'Reflection';
                    $thumb_url = has_post_thumbnail() 
                        ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) 
                        : esc_url( FRANCISCAN_THEME_URI . '/assets/images/news-blog/IMG20230215103348.jpg.jpeg' );
                    $excerpt = get_the_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 18, '...' );
                ?>
                    <article class="blog-card">
                        <div class="blog-thumb-wrap">
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
                        <h3 class="blog-card-title">
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
                'total'     => $blogs_query->max_num_pages,
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
                <h3 style="font-family:'Phudu', serif; font-size:1.8rem; color:#1c1917; margin-bottom:1rem;">No Blog Posts Found</h3>
                <p style="font-family:'Instrument Sans', sans-serif; color:#78716c;">New articles published from Franciscan Studio will appear here.</p>
            </div>
        <?php endif; ?>

    </section>
</main>

<?php
get_footer();

