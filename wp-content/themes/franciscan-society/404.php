<?php
/**
 * 404 Error Page Template
 *
 * @package Franciscan_Society
 */

get_header();
?>
<main id="main-content" style="padding: 140px 20px 120px 20px; text-align: center; max-width: 800px; margin: 0 auto;">
    <div style="font-family: 'Cormorant Garamond', serif; font-size: 7rem; font-weight: 300; color: #C5A963; line-height: 1;">404</div>
    <h1 style="font-family: 'Cormorant Garamond', serif; font-size: 2.8rem; color: #1c1917; margin: 16px 0 20px 0;">Page Not Found</h1>
    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #666; max-width: 500px; margin: 0 auto 36px auto; line-height: 1.6;">
        The sacred page or chronicle you are seeking may have been moved or is no longer available.
    </p>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: inline-block; padding: 14px 32px; background: #4A2A18; color: #FFFFFF; text-decoration: none; border-radius: 30px; font-weight: 600; font-family: 'Instrument Sans', sans-serif;">Return to Home</a>
</main>
<?php
get_footer();
