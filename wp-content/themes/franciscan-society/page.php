<?php
/**
 * Standard Page Template
 *
 * @package Franciscan_Society
 */

get_header();
?>
<main id="main-content" style="padding: 100px 20px 80px 20px; max-width: 1200px; margin: 0 auto; min-height: 60vh;">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header style="margin-bottom: 30px; text-align: center;">
                <h1 style="font-family: 'Cormorant Garamond', serif; font-size: clamp(2.2rem, 4vw, 3.5rem); color: #1c1917;"><?php the_title(); ?></h1>
            </header>
            <div class="entry-content" style="font-family: 'Instrument Sans', sans-serif; font-size: 1.1rem; line-height: 1.8; color: #444;">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>
<?php
get_footer();
