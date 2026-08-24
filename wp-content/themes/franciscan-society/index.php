<?php
/**
 * Archive Template (Categories, Dates, Tags)
 *
 * @package Franciscan_Society
 */

get_header();
?>

<style>
    body { padding-top: 80px; }
    @media (max-width: 991px) { body { padding-top: 0; } }

    .archive-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 3.5rem 2rem;
    }

    .archive-header-card {
        background: linear-gradient(135deg, #0c1727 0%, #16263d 100%);
        color: #fff;
        padding: 3rem 2.5rem;
        border-radius: 24px;
        margin-bottom: 3rem;
        border: 1px solid rgba(230, 200, 136, 0.2);
    }

    .archive-title {
        font-family: 'Phudu', sans-serif;
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 700;
        color: #e6c888;
        text-transform: uppercase;
        margin-bottom: 0.8rem;
    }

    .post-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 2rem;
    }

    .post-card {
        background: #FDFBF7;
        border: 1px solid rgba(230, 200, 136, 0.25);
        border-radius: 20px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .post-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 36px rgba(0,0,0,0.08);
    }

    .post-card-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
        display: block;
    }

    .post-card-body {
        padding: 1.8rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .post-card-title {
        font-family: 'Phudu', sans-serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: #1c1917;
        line-height: 1.3;
        margin-bottom: 0.8rem;
    }

    .post-card-excerpt {
        font-family: 'Instrument Sans', sans-serif;
        font-size: 0.92rem;
        color: #57534e;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }
</style>

<main id="main-content" style="background:#ffffff; min-height:80vh;">
    <div class="archive-container">
        <div class="archive-header-card">
            <span style="display:inline-block; font-family:'Instrument Sans', sans-serif; font-size:0.8rem; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#e6c888; margin-bottom:0.5rem;">Archive</span>
            <h1 class="archive-title"><?php the_archive_title(); ?></h1>
            <p style="font-family:'Instrument Sans', sans-serif; color:#d6d3d1; max-width:700px;"><?php the_archive_description(); ?></p>
        </div>

        <?php if ( have_posts() ) : ?>
            <div class="post-grid">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article class="post-card">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'medium_large', array( 'class' => 'post-card-image' ) ); ?>
                            </a>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_24_08_PM.png' ); ?>" class="post-card-image" alt="<?php the_title_attribute(); ?>">
                            </a>
                        <?php endif; ?>
                        <div class="post-card-body">
                            <span style="font-family:'Instrument Sans', sans-serif; font-size:0.8rem; font-weight:700; color:#8b6f47; margin-bottom:0.4rem; text-transform:uppercase;">
                                <?php echo get_the_date( 'M j, Y' ); ?>
                            </span>
                            <h2 class="post-card-title">
                                <a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="post-card-excerpt">
                                <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" style="color:#4A2A18; font-weight:700; text-decoration:none; font-family:'Instrument Sans', sans-serif; display:inline-flex; align-items:center; gap:0.4rem;">
                                Read Article &rarr;
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div style="margin-top:3rem; text-align:center;">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <p style="font-family:'Instrument Sans', sans-serif; color:#78716c;">No posts found in this archive.</p>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
