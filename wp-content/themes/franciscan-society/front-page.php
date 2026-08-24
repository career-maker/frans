<?php
/**
 * Front Page Template
 *
 * @package Franciscan_Society
 */

get_header();
?>

<main id="main-content" style="padding-top: 0; background-color: #FFFFFF;">

        <!-- 1. Hero Section (Rounded Card Container on Cream Canvas) -->
    <section class="hero-section" style="position: relative; background-color: #FFFFFF; box-sizing: border-box;">
        
        <!-- Rounded Card Container -->
        <div class="hero-container" style="position: relative; width: 100%; display: flex; flex-direction: column; justify-content: flex-end; box-sizing: border-box;">
            
            <!-- Background Image inside Rounded Card -->
            <img id="hero-bg-video" src="<?php echo esc_url( franciscan_get_page_field( 'home', 'hero_image', FRANCISCAN_THEME_URI . '/assets/images/new_uploads/hero-banner-aug20.jpeg' ) ); ?>" alt="Franciscan Friars Hero" style="z-index: 1;">
            <!-- Black Overlay (Soft Opacity) -->
            <div class="video-overlay" style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(12, 11, 10, 0.35) 0%, rgba(12, 11, 10, 0.58) 100%); z-index: 2; pointer-events: none; border-radius: 24px;"></div>

                <!-- Content Grid (Exact Reference Screenshot 1 Parallel Alignment & Spacing) -->
                <div class="hero-grid hero-grid-layout" style="position: relative; z-index: 10;">
                    
                    <!-- Left Column: Eyebrow, Title & Buttons -->
                    <div class="js-hero-text" style="display: flex; flex-direction: column; justify-content: flex-end;">
                        <!-- Eyebrow Pill Tag -->
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.4rem; width: fit-content;">
                            <span style="width: 6px; height: 6px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                            <span class="eyebrow-text" style="color: #ffffff; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; font-family: 'Instrument Sans', sans-serif;">THIRD ORDER REGULAR OF ST. FRANCIS</span>
                        </div>

                        <!-- Main Title: Phudu, 600 weight, 62px size, 62px line height -->
                        <h1 class="hero-title" style="font-family: 'Phudu', sans-serif !important; font-size: clamp(2.6rem, 5.5vw, 4.8rem) !important; font-weight: 600 !important; color: #ffffff; text-transform: uppercase; line-height: 1.05; letter-spacing: -0.01em; margin-bottom: 2.2rem; text-shadow: none !important;">
                            <?php echo nl2br( esc_html( franciscan_get_page_field( 'home', 'hero_title', "WALKING IN PEACE
SERVED IN GOD'S LOVE" ) ) ); ?>
                        </h1>

                        <!-- Buttons Row -->
                        <div class="hero-buttons-row" style="display: flex; gap: 1.25rem; align-items: center; flex-wrap: wrap;">
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>#enquiry" class="btn-fill-animation">
                                <span>JOIN OUR CHURCH</span> <span class="btn-arrow"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn-fill-outline">
                                <span>GET STARTED</span> <span class="btn-arrow"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Column: Subtitle Paragraph & Stats Counter Strip -->
                    <div class="js-hero-text" style="display: flex; flex-direction: column; justify-content: flex-end;">
                        <!-- Subtitle paragraph parallel horizontally across from line 2 of title -->
                        <p style="font-family: 'Instrument Sans', sans-serif !important; font-size: 16px !important; font-weight: 600 !important; color: #ffffff; line-height: 26px !important; margin-bottom: 2.2rem; max-width: 490px; text-shadow: 0 2px 14px rgba(0,0,0,0.9);">
                            Conversion, contemplation, poverty, and humility lie at the heart of Franciscan identity. Walking together in penance, peace, and service across Ranchi, Jharkhand, and global missions.
                        </p>

                        <!-- Stats Counter Strip -->
                        <div class="responsive-grid-3" style="position: relative; z-index: 20; display: grid; border-top: 1px solid rgba(255, 255, 255, 0.25); padding-top: 1.25rem;">
                            <div style="border-right: 1px solid rgba(255, 255, 255, 0.18); padding-right: 1rem;">
                                <div style="font-size: 2.2rem; font-weight: 900; color: #ffffff; line-height: 1; font-family: 'Phudu', sans-serif; text-shadow: 0 2px 10px rgba(0,0,0,0.8);"><?php echo esc_html( franciscan_get_page_field( 'home', 'hero_stat_1_num', '104+' ) ); ?></div>
                                <div style="font-size: 0.7rem; color: rgba(255, 255, 255, 0.85); text-transform: uppercase; letter-spacing: 0.08em; margin-top: 0.4rem; font-weight: 700; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( 'home', 'hero_stat_1_lbl', 'Professed Friars' ) ); ?></div>
                            </div>
                            <div style="border-right: 1px solid rgba(255, 255, 255, 0.18); padding-left: 1.25rem; padding-right: 1rem;">
                                <div style="font-size: 2.2rem; font-weight: 900; color: #ffffff; line-height: 1; font-family: 'Phudu', sans-serif; text-shadow: 0 2px 10px rgba(0,0,0,0.8);"><?php echo esc_html( franciscan_get_page_field( 'home', 'hero_stat_2_num', '14+' ) ); ?></div>
                                <div style="font-size: 0.7rem; color: rgba(255, 255, 255, 0.85); text-transform: uppercase; letter-spacing: 0.08em; margin-top: 0.4rem; font-weight: 700; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( 'home', 'hero_stat_2_lbl', 'Parishes Served' ) ); ?></div>
                            </div>
                            <div style="padding-left: 1.25rem;">
                                <div style="font-size: 2.2rem; font-weight: 900; color: #ffffff; line-height: 1; font-family: 'Phudu', sans-serif; text-shadow: 0 2px 10px rgba(0,0,0,0.8);"><?php echo esc_html( franciscan_get_page_field( 'home', 'hero_stat_3_num', '800+' ) ); ?></div>
                                <div style="font-size: 0.7rem; color: rgba(255, 255, 255, 0.85); text-transform: uppercase; letter-spacing: 0.08em; margin-top: 0.4rem; font-weight: 700; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( 'home', 'hero_stat_3_lbl', 'Years of Grace' ) ); ?></div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Holy Bible PNG Aligned 100% Directly Over Watermark Icon inside Rounded Hero Card -->
                                <!-- Holy Bible PNG Positioned in Exact Center of Hero Card Container -->
                                <!-- Holy Bible PNG Positioned at Center-Right of Hero Container with Smaller Size (95px) -->
                                <!-- Holy Bible PNG Positioned Upward Above Paragraph (No Overlap) -->

                <img  loading="lazy" decoding="async"src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/bible.png' ); ?>" alt="Holy Bible" class="hero-bible-img" style="position: absolute !important; top: 28% !important; right: 9% !important; width: 90px !important; height: auto !important; z-index: 2 !important; filter: drop-shadow(0 12px 28px rgba(0,0,0,0.85)) !important; pointer-events: none !important;">
            </div>
        </section>

        <!-- 2. Welcome Message Section (Pure White Canvas #FFFFFF & Panoramic Bottom Sketch Illustration) -->
        <!-- Unclippable Flying Bible PNG Container (Flies in front of eyes on scroll) -->
<div id="welcome-scroll-bible-container" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 99999; display: none;">
    <img loading="lazy" decoding="async" id="welcome-scroll-bible-img" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/bible.png' ); ?>" alt="Flying Bible" style="position: absolute; width: 90px; height: auto; filter: drop-shadow(0 15px 30px rgba(0,0,0,0.5)); transform-origin: center center;">
</div>

<section id="welcome-section" style="position: relative; padding: clamp(2rem, 4vw, 3.5rem) 2rem clamp(2rem, 3.5vw, 3rem) 2rem; background-color: #FFFFFF; color: #1c1917; overflow: hidden; box-sizing: border-box;">

            <div class="welcome-grid" style="position: relative; z-index: 10; max-width: 1320px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: clamp(2rem, 4vw, 4.5rem); align-items: center;">

                <!-- Left Column: Copy -->
                <div class="welcome-copy">

                    <!-- Eyebrow Tag -->
                    <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.4rem;">
                        <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                        <span style="color: #4A2A18; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( 'home', 'welcome_eyebrow', 'WELCOME TO THE FRANCISCAN SOCIETY' ) ); ?></span>
                    </div>

                    <!-- Section Heading in Phudu 600 -->
                    <h2 class="gsap-reveal-h2" style="font-family: 'Phudu', sans-serif !important; font-size: clamp(2.1rem, 3.4vw, 3.2rem) !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.15; letter-spacing: -0.01em; margin-bottom: 1.6rem;">
                        <?php echo esc_html( franciscan_get_page_field( 'home', 'welcome_section_heading', 'WALKING TOGETHER IN FAITH, PENANCE, AND SERVICE' ) ); ?>
                    </h2>

                    <!-- Welcome Message Text in Instrument Sans 600 -->
                    <p class="gsap-reveal-p" style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.95rem !important; font-weight: 500 !important; color: #44403c !important; line-height: 1.8 !important; margin: 0;">
                        <?php echo esc_html( franciscan_get_page_field( 'home', 'welcome_section_text', 'We warmly welcome you to the official digital portal of the Franciscan Society, Third Order Regular (TOR), Province of St. Francis, Ranchi.' ) ); ?>
                    </p>

                </div>

                <!-- Right Column: Mosaic Photograph -->
                <div class="welcome-media">
                    <?php
                    $welcome_mosaic = franciscan_get_page_field( 'home', 'welcome_mosaic_img', '' );
                    if ( empty( $welcome_mosaic ) ) {
                        $welcome_mosaic = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_24_08_PM.png';
                    }
                    ?>
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( $welcome_mosaic ); ?>" alt="Mosaic frescoes covering the vaulted ceiling of a church">
                </div>

            </div>

            <!-- Panoramic Bottom Church Sketch Line-Art (Matching Reference Screenshot) -->
            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/sketch-bg.png' ); ?>" alt="Church Line Art Panorama" style="position: absolute; bottom: 0; left: 0; width: 100%; height: auto; max-height: 220px; object-fit: contain; object-position: bottom center; filter: opacity(0.3) drop-shadow(0 0 12px rgba(255, 255, 255, 1)) drop-shadow(0 0 24px rgba(255, 255, 255, 0.8)) contrast(110%); pointer-events: none; z-index: 1;">
        </section>

        <!-- 3. About Us Section (Exact Match to Reference Screenshot) -->
        <section id="about-section" style="position: relative; padding: clamp(2rem, 4vw, 3.5rem) 0 0 0; background-color: #FFFFFF; color: #1c1917; overflow: hidden;">
            <div class="responsive-grid-about" style="max-width: 1320px; margin: 0 auto; padding: 0 clamp(1rem, 5vw, 3rem); display: grid; gap: 4.5rem; align-items: center;">
                
                <!-- Left Column: Main Image with Working Video Card Overlay -->
                <?php
                $about_img = franciscan_get_page_field( 'home', 'about_section_img', '' );
                if ( empty( $about_img ) ) {
                    $about_img = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_48_39_PM.png';
                }
                $about_video = franciscan_get_page_field( 'home', 'about_video_url', '' );
                if ( empty( $about_video ) ) {
                    $about_video = FRANCISCAN_THEME_URI . '/assets/videos/hero-bg.mp4';
                }
                ?>
                <div style="position: relative; border-radius: 24px;">
                    <div class="about-img-container" style="position: relative; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 45px rgba(0, 0, 0, 0.08);">
                        <img loading="lazy" decoding="async" src="<?php echo esc_url( $about_img ); ?>" style="width: 100%; height: 460px; object-fit: cover; border-radius: 24px; display: block;" alt="Franciscan Rosary & Prayer">
                    </div>
                    
                    <!-- Inset Video Overlay Card (Positioned inside bottom-right corner) -->
                    <div class="about-video-card" style="position: absolute; bottom: 20px; right: 20px; background: #ffffff; padding: 10px; border-radius: 16px; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.18); width: 185px; text-align: center; z-index: 10;">
                        <div style="position: relative; border-radius: 12px; overflow: hidden; height: 95px; background-color: #1c1917;">
                            <video src="<?php echo esc_url( $about_video ); ?>" style="width: 100%; height: 100%; object-fit: cover; pointer-events: none;" autoplay loop muted playsinline></video>
                            <a rel="noopener noreferrer" href="https://youtube.com/@tormediaranchi3804?si=UPTCSJUSj9tbcjeB" target="_blank" class="video-play-btn" aria-label="Watch our video on YouTube">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16" aria-hidden="true">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </a>
                        </div>
                        <span style="display: block; margin-top: 8px; font-weight: 800; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; color: #1c1917; font-family: 'Instrument Sans', sans-serif;">WATCH OUR VIDEO</span>
                    </div>
                </div>

                <!-- Right Column: Text Content & Mission/Vision Grid -->
                <div>
                    <!-- Eyebrow Tag -->
                    <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                        <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                        <span style="color: #4A2A18; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( 'home', 'about_eyebrow', 'ABOUT US' ) ); ?></span>
                    </div>

                    <!-- Main Section Title in Phudu 600 -->
                    <h2 style="font-family: 'Phudu', sans-serif !important; font-size: clamp(2.2rem, 3.2vw, 2.9rem) !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.1; letter-spacing: -0.01em; margin-bottom: 1.4rem;">
                        <?php echo esc_html( franciscan_get_page_field( 'home', 'about_section_heading', 'OUR STORY FAITH MISSION AND VISION TOGETHER' ) ); ?>
                    </h2>

                    <!-- Body Description in Instrument Sans -->
                    <p style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.95rem; color: #57534e; line-height: 1.65; margin-bottom: 2rem;">
                        <?php echo esc_html( franciscan_get_page_field( 'home', 'about_section_text', 'The Third Order Regular (TOR) of St. Francis traces its origins to the ancient Order of Penance from the 4th century. Established in Ranchi in 1996 and elevated to a full Province on 20 March 2006.' ) ); ?>
                    </p>

                    <!-- Mission & Vision 2-Column Grid -->
                    <div class="responsive-grid-2" style="display: grid; gap: 1.8rem; border-bottom: 1px solid rgba(0, 0, 0, 0.1); padding-bottom: 2rem; margin-bottom: 2rem;">
                        <div style="display: flex; gap: 1rem; align-items: flex-start;">
                            <div style="width: 38px; height: 38px; background: #4A2A18; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 0.9rem; flex-shrink: 0; box-shadow: 0 4px 10px rgba(74,42,24,0.3);">&#10013;</div>
                            <div>
                                <h4 style="font-family: 'Phudu', sans-serif !important; font-size: 0.92rem; font-weight: 600; text-transform: uppercase; margin-bottom: 0.3rem; color: #1c1917;"><?php echo esc_html( franciscan_get_page_field( 'home', 'about_mission_title', 'OUR MISSION' ) ); ?></h4>
                                <p style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.8rem; color: #78716c; line-height: 1.45; margin: 0;"><?php echo esc_html( franciscan_get_page_field( 'home', 'about_mission_text', 'Serving 15 parishes & 22 schools across Ranchi and global mission fields.' ) ); ?></p>
                            </div>
                        </div>
                        <div style="display: flex; gap: 1rem; align-items: flex-start;">
                            <div style="width: 38px; height: 38px; background: #4A2A18; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 0.9rem; flex-shrink: 0; box-shadow: 0 4px 10px rgba(74,42,24,0.3);">&#10013;</div>
                            <div>
                                <h4 style="font-family: 'Phudu', sans-serif !important; font-size: 0.92rem; font-weight: 600; text-transform: uppercase; margin-bottom: 0.3rem; color: #1c1917;"><?php echo esc_html( franciscan_get_page_field( 'home', 'about_vision_title', 'OUR VISION' ) ); ?></h4>
                                <p style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.8rem; color: #78716c; line-height: 1.45; margin: 0;"><?php echo esc_html( franciscan_get_page_field( 'home', 'about_vision_text', 'Promoting peace, joy, and dignity under "Peace and Joy to the World".' ) ); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button & Minister Provincial Avatar Row -->
                    <div style="display: flex; align-items: center; gap: 2rem; flex-wrap: wrap;">
                        <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn-fill-animation">
                            <span>LEARN MORE ABOUT</span> <span class="btn-arrow"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                        </a>

                        <?php
                        $provincial_avatar = franciscan_get_page_field( 'home', 'about_provincial_avatar', '' );
                        if ( empty( $provincial_avatar ) ) {
                            $provincial_avatar = FRANCISCAN_THEME_URI . '/assets/images/fr-manoj-vengathanam.png';
                        }
                        ?>
                        <div style="display: flex; align-items: center; gap: 0.85rem;">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url( $provincial_avatar ); ?>" style="width: 44px; height: 44px; border-radius: 50%; object-fit: cover;" alt="<?php echo esc_attr( franciscan_get_page_field( 'home', 'about_provincial_name', 'Fr. Manoj Vengathanam, TOR' ) ); ?>">
                            <div>
                                <div style="font-family: 'Phudu', sans-serif !important; font-weight: 600; font-size: 0.85rem; text-transform: uppercase; color: #1c1917;"><?php echo esc_html( franciscan_get_page_field( 'home', 'about_provincial_name', 'FR. MANOJ VENGATHANAM, TOR' ) ); ?></div>
                                <div style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.75rem; color: #78716c;"><?php echo esc_html( franciscan_get_page_field( 'home', 'about_provincial_title', 'Minister Provincial' ) ); ?></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Large Watermark Medium Speed Marquee Text -->
            <style>
                @keyframes marquee-scroll {
                    0% { transform: translateX(0); }
                    100% { transform: translateX(-50%); }
                }
                .marquee-track-scroll {
                    display: flex !important;
                    width: max-content !important;
                    white-space: nowrap !important;
                    animation: marquee-scroll 22s linear infinite !important;
                    will-change: transform;
                }
            </style>
            <div style="width: 100% !important; max-width: 100% !important; overflow-x: hidden !important; overflow-y: hidden !important; white-space: nowrap !important; padding: 1.5rem 0 0.5rem 0 !important; margin-top: 1rem !important; pointer-events: none !important; user-select: none !important; position: relative !important;">
                <div class="marquee-track-scroll">
                    <span style="font-family: 'Phudu', sans-serif !important; font-size: clamp(3.5rem, 6vw, 5.5rem) !important; font-weight: 700 !important; text-transform: uppercase !important; color: transparent !important; -webkit-text-stroke: 1.5px rgba(0, 0, 0, 0.15) !important; letter-spacing: 0.04em !important; white-space: nowrap !important; padding-right: 4rem !important; display: inline-block !important;">
                        &#10013; PEACE AND JOY TO THE WORLD &#10013; CONVERSION, CONTEMPLATION, POVERTY &amp; HUMILITY &#10013; THE LORD IS MY SHEPHERD &#10013; ST. FRANCIS OF ASSISI &#10013; PROVINCE OF ST. FRANCIS RANCHI &nbsp;
                    </span>
                    <span style="font-family: 'Phudu', sans-serif !important; font-size: clamp(3.5rem, 6vw, 5.5rem) !important; font-weight: 700 !important; text-transform: uppercase !important; color: transparent !important; -webkit-text-stroke: 1.5px rgba(0, 0, 0, 0.15) !important; letter-spacing: 0.04em !important; white-space: nowrap !important; padding-right: 4rem !important; display: inline-block !important;">
                        &#10013; PEACE AND JOY TO THE WORLD &#10013; CONVERSION, CONTEMPLATION, POVERTY &amp; HUMILITY &#10013; THE LORD IS MY SHEPHERD &#10013; ST. FRANCIS OF ASSISI &#10013; PROVINCE OF ST. FRANCIS RANCHI &nbsp;
                    </span>

                </div>
            </div>
        </section>

        <!-- Our Mission Section -->
        <section id="mission-section" style="padding: clamp(2rem, 4vw, 3.5rem) 0; background-color: #ffffff; color: #1c1917; box-sizing: border-box; overflow: hidden;">
            <div class="responsive-grid-2" style="max-width: 1320px; margin: 0 auto; padding: 0 clamp(1rem, 5vw, 3rem); display: grid; gap: 5rem; align-items: center;">
                
                <!-- Left Content -->
                <?php
                $contact_phone    = franciscan_get_option( 'contact_phone', '+91 651 234 5678' );
                $tel_href         = 'tel:+' . preg_replace( '/[^0-9]/', '', $contact_phone );
                ?>
                <div class="gsap-fade-up">
                    <div style="display: inline-flex; align-items: center; gap: 0.6rem; margin-bottom: 1.5rem;">
                        <span style="width: 8px; height: 8px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                        <span style="color: #1c1917; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( 'home', 'mission_eyebrow', 'Our Values' ) ); ?></span>
                    </div>

                    <h2 style="font-family: 'Phudu', sans-serif !important; font-size: clamp(2.5rem, 4vw, 3.8rem) !important; font-weight: 700 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.1; letter-spacing: -0.01em; margin-bottom: 1.5rem;">
                        <?php echo esc_html( franciscan_get_page_field( 'home', 'mission_values_heading', 'OUR CHRISTIAN VALUES THAT LEAD OUR MINISTRY' ) ); ?>
                    </h2>

                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.6; margin-bottom: 3rem; max-width: 90%;">
                        <?php echo esc_html( franciscan_get_page_field( 'home', 'mission_values_text', 'Our Christian values are the foundation of everything we do as a church. Guided by faith, love, compassion, and integrity, we are committed to serving God.' ) ); ?>
                    </p>

                    <!-- Split Info Box -->
                    <div style="border-radius: 16px; padding: 2.5rem; display: flex; gap: 2rem; position: relative; margin-bottom: 3rem;">
                        <!-- Red Left Border Accent -->
                        <div style="position: absolute; left: 0; top: 15%; bottom: 15%; width: 4px; background-color: #4A2A18; border-radius: 0 4px 4px 0;"></div>
                        
                        <div style="flex: 1; padding-left: 1rem;">
                            <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.3rem; font-weight: 700; text-transform: uppercase; margin-bottom: 0.8rem; color: #1c1917;"><?php echo esc_html( franciscan_get_page_field( 'home', 'prayer_support_title', 'PRAYER SUPPORT' ) ); ?></h4>
                            <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #78716c; line-height: 1.5; margin: 0;"><?php echo esc_html( franciscan_get_page_field( 'home', 'prayer_support_desc', 'Our Prayer Support accompanies you in faith during every stage of life.' ) ); ?></p>
                        </div>
                        <div style="width: 1px; background-color: #e7e5e4;"></div>
                        <div style="flex: 1;">
                            <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.3rem; font-weight: 700; text-transform: uppercase; margin-bottom: 0.8rem; color: #1c1917;"><?php echo esc_html( franciscan_get_page_field( 'home', 'fellowship_title', 'FELLOWSHIP GROUPS' ) ); ?></h4>
                            <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #78716c; line-height: 1.5; margin: 0;"><?php echo esc_html( franciscan_get_page_field( 'home', 'fellowship_desc', 'Join our vibrant fellowship groups and grow together in faith and community.' ) ); ?></p>
                        </div>
                    </div>

                    <!-- Call to Action Row -->
                    <div style="display: flex; align-items: center; gap: 2.5rem;">
                        <a href="<?php echo esc_url( $tel_href ); ?>" style="display: flex; align-items: center; gap: 1rem; text-decoration: none;">
                            <div style="width: 54px; height: 54px; background-color: #1c1917; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #ffffff; font-size: 1.3rem;">
                                &#128222;
                            </div>
                            <div>
                                <div style="font-family: 'Phudu', sans-serif; font-weight: 700; font-size: 1.2rem; text-transform: uppercase; color: #1c1917; margin-bottom: 0.2rem;"><?php echo esc_html( franciscan_get_page_field( 'home', 'call_us_label', 'CALL US!' ) ); ?></div>
                                <div style="font-family: 'Instrument Sans', sans-serif; font-size: 1.05rem; color: #78716c;"><?php echo esc_html( $contact_phone ); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Right Images -->
                <?php
                $mission_church = franciscan_get_page_field( 'home', 'mission_church_img', '' );
                if ( empty( $mission_church ) ) {
                    $mission_church = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_51_30_PM.png';
                }
                $mission_priest = franciscan_get_page_field( 'home', 'mission_priest_img', '' );
                if ( empty( $mission_priest ) ) {
                    $mission_priest = FRANCISCAN_THEME_URI . '/assets/images/mission-father.png';
                }
                ?>
                <div class="gsap-fade-left hover-trigger" style="position: relative; height: 650px;">
                    <!-- Left Church Image -->
                    <div class="about-img-container mission-church-img">
                        <img loading="lazy" decoding="async" src="<?php echo esc_url( $mission_church ); ?>" alt="Church Interior" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    
                    <!-- Right Father Image -->
                    <div class="mission-priest-container">
                        <img loading="lazy" decoding="async" class="priest-zoom" src="<?php echo esc_url( $mission_priest ); ?>" alt="Priest" style="width: 100%; height: auto; object-fit: contain; object-position: bottom center; max-height: 100%;">
                    </div>
                </div>

            </div>
        </section>

        <!-- 4. News & Events Section (Exact Reference Center-Aligned Header & Scroll Track) -->
        
          <!-- 3.5 Bible Quote Section -->
          <section id="bible-quote-section" style="padding: clamp(2rem, 4vw, 3.5rem) 0; background-color: #0a0a0a; background-image: url('<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/word-of-god-bg.jpg' ); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; color: #ffffff; text-align: center; border-radius: 32px; margin: 0 clamp(1rem, 3vw, 3rem) clamp(1.5rem, 3vw, 2.5rem) clamp(1rem, 3vw, 3rem); position: relative; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.2);">
              <!-- Black overlay so the verse stays legible over the photograph -->
              <div aria-hidden="true" style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(8,7,6,0.86) 0%, rgba(8,7,6,0.78) 50%, rgba(8,7,6,0.88) 100%); z-index: 1; pointer-events: none;"></div>
              <div style="position: relative; z-index: 2; max-width: 800px; margin: 0 auto; padding: 0 2rem;">
                  <div style="display: inline-flex; align-items: center; gap: 0.6rem; margin-bottom: 2.5rem;">
                      <span style="width: 6px; height: 6px; background-color: #ffffff; border-radius: 50%; display: inline-block;"></span>
                      <span style="color: #ffffff; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; font-family: 'Instrument Sans', sans-serif;">WORD OF GOD</span>
                  </div>
                  
                  <h2 style="font-family: 'Phudu', sans-serif !important; font-size: clamp(2.8rem, 6vw, 4.5rem) !important; font-weight: 700 !important; color: #ffffff !important; text-transform: uppercase; line-height: 1.05; letter-spacing: -0.02em; margin-bottom: 1.5rem;">
                      &ldquo;BE STILL AND<br><span style="color: #4A2A18 !important; -webkit-text-fill-color: #4A2A18 !important; -webkit-text-stroke: 1.5px #ffffff !important; display: inline-block;">KNOW</span> THAT I AM GOD.&rdquo;
                  </h2>
                  
                  <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #a8a29e; margin: 0; display: inline-flex; align-items: center; justify-content: center; gap: 0.8rem;">
                      <span style="display: inline-block; width: 35px; height: 1px; background-color: #a8a29e;"></span> Book of Psalms
                  </p>
              </div>
          </section>

          <section id="news-section" class="has-vine-watermark" style="position: relative; padding: clamp(2rem, 4vw, 3.5rem) 0; background-color: #F5F3EC; color: #1c1917; box-sizing: border-box; overflow: hidden;">
            <img src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/shapes/vine-corner-watermark.png' ); ?>" class="vine-corner-watermark" alt="" aria-hidden="true">
            <div style="max-width: 1320px; margin: 0 auto; padding: 0 clamp(1rem, 5vw, 3rem);">
                
                <!-- Section Header (100% Center-Aligned Eyebrow, 2-Line Title & Scroll Navigation Arrows) -->
                <div style="text-align: center; max-width: 900px; margin: 0 auto 2.2rem auto;">
                    
                    <!-- Eyebrow Tag -->
                    <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.4rem;">
                        <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                        <span style="color: #4A2A18; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;">NEWS &amp; EVENTS</span>
                    </div>

                    <!-- Main Section Title in Phudu 600 (Centered 2 Lines) -->
                    <h2 style="font-family: 'Phudu', sans-serif !important; font-size: clamp(2.3rem, 3.8vw, 3.2rem) !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.15; letter-spacing: -0.01em; margin: 0 0 2rem 0; text-align: center;">
                        INSIGHTS AND INSPIRATION FROM<br>OUR LATEST NEWS
                    </h2>

                    <!-- Centered Scroll Navigation Arrow Buttons -->
                    <div style="display: flex; gap: 0.85rem; align-items: center; justify-content: center;">
                        <button class="slider-btn slider-btn--prev" onclick="document.getElementById('news-scroll-track').scrollBy({left: -380, behavior: 'smooth'})" aria-label="Scroll Left">
                            &#8592;
                        </button>
                        <button class="slider-btn slider-btn--next" onclick="document.getElementById('news-scroll-track').scrollBy({left: 380, behavior: 'smooth'})" aria-label="Scroll Right">
                            &#8594;
                        </button>
                    </div>

                </div>

                <div id="news-scroll-track" style="display: flex; gap: 2.2rem; overflow-x: auto; scroll-snap-type: x mandatory; padding-bottom: 1.5rem; scrollbar-width: none; -ms-overflow-style: none;">
                    
                    <!-- Item 1 -->
                    <div class="blog-card" style="flex: 0 0 380px; scroll-snap-align: start; display: flex; flex-direction: column; background: transparent;">
                        <div style="border-radius: 20px; overflow: hidden; height: 260px; margin-bottom: 1.6rem; box-shadow: 0 10px 25px rgba(0,0,0,0.06); background-color: #d6ccc2;">
                            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/news-blog/IMG20230215103348.jpg.jpeg' ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease;" alt="Daily Prayer Life" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <h3 style="font-family: 'Phudu', sans-serif !important; font-size: 1.2rem !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.35; margin-bottom: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 1.5rem;">
                            STRENGTHENING YOUR FAITH THROUGH CONSISTENT DAILY PRAYER LIFE
                        </h3>
                        <div>
                            <a href="<?php echo esc_url( get_permalink( 42 ) ); ?>" class="news-text-link" style="font-family: �Instrument Sans�, sans-serif !important; font-weight: 800 !important; font-size: 0.88rem !important; color: #1c1917 !important; text-transform: uppercase !important; letter-spacing: 0.06em !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; transition: color 0.3s ease !important;">
                                <span>READ MORE</span> <span class="btn-arrow" style="font-size: 1rem; transition: transform 0.3s ease;"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="blog-card" style="flex: 0 0 380px; scroll-snap-align: start; display: flex; flex-direction: column; background: transparent;">
                        <div style="border-radius: 20px; overflow: hidden; height: 260px; margin-bottom: 1.6rem; box-shadow: 0 10px 25px rgba(0,0,0,0.06); background-color: #d6ccc2;">
                            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/news-blog/WhatsApp Image 2025-02-15 at 9.44.56 AM (1).jpeg' ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease;" alt="Trusting God" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <h3 style="font-family: 'Phudu', sans-serif !important; font-size: 1.2rem !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.35; margin-bottom: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 1.5rem;">
                            TRUSTING GOD FULLY DURING LIFE'S DIFFICULT AND UNCERTAIN TIMES
                        </h3>
                        <div>
                            <a href="<?php echo esc_url( get_permalink( 43 ) ); ?>" class="news-text-link" style="font-family: 'Instrument Sans', sans-serif !important; font-weight: 800 !important; font-size: 0.88rem !important; color: #1c1917 !important; text-transform: uppercase !important; letter-spacing: 0.06em !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; transition: color 0.3s ease !important;">
                                <span>READ MORE</span> <span class="btn-arrow" style="font-size: 1rem; transition: transform 0.3s ease;"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="blog-card" style="flex: 0 0 380px; scroll-snap-align: start; display: flex; flex-direction: column; background: transparent;">
                        <div style="border-radius: 20px; overflow: hidden; height: 260px; margin-bottom: 1.6rem; box-shadow: 0 10px 25px rgba(0,0,0,0.06); background-color: #d6ccc2;">
                            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/news-blog/WhatsApp Image 2025-02-15 at 9.44.56 AM.jpeg' ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease;" alt="Spiritually Strong" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <h3 style="font-family: 'Phudu', sans-serif !important; font-size: 1.2rem !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.35; margin-bottom: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 1.5rem;">
                            STAYING SPIRITUALLY STRONG THROUGH FAITH AND DAILY PRAYER
                        </h3>
                        <div>
                            <a href="<?php echo esc_url( get_permalink( 44 ) ); ?>" class="news-text-link" style="font-family: 'Instrument Sans', sans-serif !important; font-weight: 800 !important; font-size: 0.88rem !important; color: #1c1917 !important; text-transform: uppercase !important; letter-spacing: 0.06em !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; transition: color 0.3s ease !important;">
                                <span>READ MORE</span> <span class="btn-arrow" style="font-size: 1rem; transition: transform 0.3s ease;"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="blog-card" style="flex: 0 0 380px; scroll-snap-align: start; display: flex; flex-direction: column; background: transparent;">
                        <div style="border-radius: 20px; overflow: hidden; height: 260px; margin-bottom: 1.6rem; box-shadow: 0 10px 25px rgba(0,0,0,0.06); background-color: #d6ccc2;">
                            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/news-blog/WhatsApp Image 2025-03-29 at 5.41.00 AM.jpeg' ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease;" alt="Franciscan Mission" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <h3 style="font-family: 'Phudu', sans-serif !important; font-size: 1.2rem !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.35; margin-bottom: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 1.5rem;">
                            EXPANDING FRANCISCAN EDUCATIONAL &amp; SOCIAL MISSIONS IN RANCHI
                        </h3>
                        <div>
                            <a href="<?php echo esc_url( get_permalink( 44 ) ); ?>" class="news-text-link" style="font-family: 'Instrument Sans', sans-serif !important; font-weight: 800 !important; font-size: 0.88rem !important; color: #1c1917 !important; text-transform: uppercase !important; letter-spacing: 0.06em !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; transition: color 0.3s ease !important;">
                                <span>READ MORE</span> <span class="btn-arrow" style="font-size: 1rem; transition: transform 0.3s ease;"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="blog-card" style="flex: 0 0 380px; scroll-snap-align: start; display: flex; flex-direction: column; background: transparent;">
                        <div style="border-radius: 20px; overflow: hidden; height: 260px; margin-bottom: 1.6rem; box-shadow: 0 10px 25px rgba(0,0,0,0.06); background-color: #d6ccc2;">
                            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/news-blog/WhatsApp Image 2025-04-04 at 11.06.38 AM.jpeg' ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease;" alt="Youth Ministry" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <h3 style="font-family: 'Phudu', sans-serif !important; font-size: 1.2rem !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.35; margin-bottom: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 1.5rem;">
                            YOUTH SPIRITUAL RETREAT &amp; COMMUNITY FELLOWSHIP GATHERING
                        </h3>
                        <div>
                            <a href="<?php echo esc_url( get_permalink( 44 ) ); ?>" class="news-text-link" style="font-family: 'Instrument Sans', sans-serif !important; font-weight: 800 !important; font-size: 0.88rem !important; color: #1c1917 !important; text-transform: uppercase !important; letter-spacing: 0.06em !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; transition: color 0.3s ease !important;">
                                <span>READ MORE</span> <span class="btn-arrow" style="font-size: 1rem; transition: transform 0.3s ease;"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                        </div>
                    </div>

                    <!-- Item 6 -->
                    <div class="blog-card" style="flex: 0 0 380px; scroll-snap-align: start; display: flex; flex-direction: column; background: transparent;">
                        <div style="border-radius: 20px; overflow: hidden; height: 260px; margin-bottom: 1.6rem; box-shadow: 0 10px 25px rgba(0,0,0,0.06); background-color: #d6ccc2;">
                            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/news-blog/WhatsApp Image 2025-08-02 at 10.29.49 AM.jpeg' ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease;" alt="Parish Feast" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <h3 style="font-family: 'Phudu', sans-serif !important; font-size: 1.2rem !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.35; margin-bottom: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 1.5rem;">
                            CELEBRATING THE ANNUAL ST. FRANCIS PROVINCIA FEAST DAY
                        </h3>
                        <div>
                            <a href="<?php echo esc_url( get_permalink( 44 ) ); ?>" class="news-text-link" style="font-family: 'Instrument Sans', sans-serif !important; font-weight: 800 !important; font-size: 0.88rem !important; color: #1c1917 !important; text-transform: uppercase !important; letter-spacing: 0.06em !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; transition: color 0.3s ease !important;">
                                <span>READ MORE</span> <span class="btn-arrow" style="font-size: 1rem; transition: transform 0.3s ease;"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- View All News & Events Button -->
                <div class="gsap-fade-up" style="text-align: center; margin-top: 3rem;">
                    <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="btn-fill-animation">
                        <span>VIEW ALL NEWS & EVENTS</span> <span class="btn-arrow"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                    </a>
                </div>

            </div>
        </section>


        <!-- 4.5 Inquiry Form Section (Fixed Background + Praying Woman Image + Glassmorphic Form) -->
        
        <!-- 4.5 Inquiry Form Section (Exact Reference Screenshot Inset Rounded Card Container) -->
        


        <!-- 5. Our Ministries Section (Exact Match to Reference Screenshots) -->
        
        <!-- 5. Blogs Section (White Container Cards with Generous Inner Padding) -->
        
<style>
.blog-padded-card:hover .news-text-link .btn-arrow {
    transform: rotate(45deg) !important;
}
</style>
<section id="blogs-section" style="padding: clamp(2rem, 4vw, 3.5rem) 0; background-color: #FFFFFF; color: #1c1917; box-sizing: border-box; overflow: hidden;">
            <div style="max-width: 1320px; margin: 0 auto; padding: 0 clamp(1rem, 5vw, 3rem);">
                
                <!-- Section Header (Centered Eyebrow & 2-Line Title, No Pill) -->
                <div style="text-align: center; max-width: 900px; margin: 0 auto 2.2rem auto;">
                    
                    <!-- Eyebrow Tag (No Pill) -->
                    <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.4rem;">
                        <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                        <span style="color: #4A2A18; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;">OUR BLOGS</span>
                    </div>

                    <!-- Main Section Title in Phudu 600 -->
                    <h2 style="font-family: 'Phudu', sans-serif !important; font-size: clamp(2.3rem, 3.8vw, 3.2rem) !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.15; letter-spacing: -0.01em; margin: 0 0 2rem 0; text-align: center;">
                        OUR MINISTRIES FOR WORSHIP<br>GROWTH AND SERVICE
                    </h2>

                    <!-- Centered Scroll Navigation Arrow Buttons (matches News &amp; Events) -->
                    <div style="display: flex; gap: 0.85rem; align-items: center; justify-content: center;">
                        <button class="slider-btn slider-btn--prev" onclick="document.getElementById('blogs-scroll-track').scrollBy({left: -380, behavior: 'smooth'})" aria-label="Scroll Left">
                            &#8592;
                        </button>
                        <button class="slider-btn slider-btn--next" onclick="document.getElementById('blogs-scroll-track').scrollBy({left: 380, behavior: 'smooth'})" aria-label="Scroll Right">
                            &#8594;
                        </button>
                    </div>
                </div>

                <!-- Blog Cards Scroll Track -->
                <div id="blogs-scroll-track" style="display: flex; gap: 2.2rem; overflow-x: auto; scroll-snap-type: x mandatory; padding: 0.5rem 0 1.5rem 0; margin-bottom: 2rem; scrollbar-width: none; -ms-overflow-style: none;">
                    
                    <!-- Card 1: Children's Ministry -->
                    <div class="blog-padded-card" style="flex: 0 0 380px; scroll-snap-align: start; background: #ffffff; border-radius: 24px; padding: 1.8rem; box-shadow: 0 15px 35px rgba(0,0,0,0.06); display: flex; flex-direction: column; transition: transform 0.4s ease, box-shadow 0.4s ease;">
                        <div style="border-radius: 16px; overflow: hidden; height: 260px; margin-bottom: 1.6rem; background-color: #d6ccc2;">
                            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/news-blog/WhatsApp Image 2025-09-10 at 4.28.51 AM.jpeg' ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease;" alt="Children's Ministry" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <h3 style="font-family: 'Phudu', sans-serif !important; font-size: 1.25rem !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; margin-bottom: 0.8rem; letter-spacing: 0.01em; line-height: 1.3;">
                            EXPLORING THE FRANCISCAN WAY
                        </h3>
                        <p style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.88rem; color: #57534e; line-height: 1.6; margin-bottom: 1.6rem;">
                            An inspiring reflection on exploring the franciscan way.
                        </p>
                        <div style="margin-top: auto;">
                            <a href="<?php echo esc_url( get_permalink( 48 ) ); ?>" class="news-text-link" style="font-family: 'Instrument Sans', sans-serif !important; font-weight: 800 !important; font-size: 0.88rem !important; color: #1c1917 !important; text-transform: uppercase !important; letter-spacing: 0.06em !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; transition: color 0.3s ease !important;">
                                <span>READ MORE</span> <span class="btn-arrow" style="font-size: 1rem; transition: transform 0.3s ease;"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                        </div>
                    </div>

                    <!-- Card 2: Youth Ministry -->
                    <div class="blog-padded-card" style="flex: 0 0 380px; scroll-snap-align: start; background: #ffffff; border-radius: 24px; padding: 1.8rem; box-shadow: 0 15px 35px rgba(0,0,0,0.06); display: flex; flex-direction: column; transition: transform 0.4s ease, box-shadow 0.4s ease;">
                        <div style="border-radius: 16px; overflow: hidden; height: 260px; margin-bottom: 1.6rem; background-color: #d6ccc2;">
                            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/news-blog/WhatsApp Image 2025-09-10 at 4.28.52 AM.jpeg' ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease;" alt="Youth Ministry" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <h3 style="font-family: 'Phudu', sans-serif !important; font-size: 1.25rem !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; margin-bottom: 0.8rem; letter-spacing: 0.01em; line-height: 1.3;">
                            FINDING PEACE IN DAILY LIFE
                        </h3>
                        <p style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.88rem; color: #57534e; line-height: 1.6; margin-bottom: 1.6rem;">
                            An inspiring reflection on finding peace in daily life.
                        </p>
                        <div style="margin-top: auto;">
                            <a href="<?php echo esc_url( get_permalink( 49 ) ); ?>" class="news-text-link" style="font-family: 'Instrument Sans', sans-serif !important; font-weight: 800 !important; font-size: 0.88rem !important; color: #1c1917 !important; text-transform: uppercase !important; letter-spacing: 0.06em !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; transition: color 0.3s ease !important;">
                                <span>READ MORE</span> <span class="btn-arrow" style="font-size: 1rem; transition: transform 0.3s ease;"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                        </div>
                    </div>

                    <!-- Card 3: Women's Ministry -->
                    <div class="blog-padded-card" style="flex: 0 0 380px; scroll-snap-align: start; background: #ffffff; border-radius: 24px; padding: 1.8rem; box-shadow: 0 15px 35px rgba(0,0,0,0.06); display: flex; flex-direction: column; transition: transform 0.4s ease, box-shadow 0.4s ease;">
                        <div style="border-radius: 16px; overflow: hidden; height: 260px; margin-bottom: 1.6rem; background-color: #d6ccc2;">
                            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/news-blog/WhatsApp Image 2025-09-17 at 11.30.24 AM.jpeg' ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease;" alt="Women's Ministry" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <h3 style="font-family: 'Phudu', sans-serif !important; font-size: 1.25rem !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; margin-bottom: 0.8rem; letter-spacing: 0.01em; line-height: 1.3;">
                            THE SPIRIT OF COMMUNITY SERVICE
                        </h3>
                        <p style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.88rem; color: #57534e; line-height: 1.6; margin-bottom: 1.6rem;">
                            An inspiring reflection on the spirit of community service.
                        </p>
                        <div style="margin-top: auto;">
                            <a href="<?php echo esc_url( get_permalink( 50 ) ); ?>" class="news-text-link" style="font-family: 'Instrument Sans', sans-serif !important; font-weight: 800 !important; font-size: 0.88rem !important; color: #1c1917 !important; text-transform: uppercase !important; letter-spacing: 0.06em !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; transition: color 0.3s ease !important;">
                                <span>READ MORE</span> <span class="btn-arrow" style="font-size: 1rem; transition: transform 0.3s ease;"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                        </div>
                    </div>


                    <!-- Card 4: Prayer & Intercession -->
                    <div class="blog-padded-card" style="flex: 0 0 380px; scroll-snap-align: start; background: #ffffff; border-radius: 24px; padding: 1.8rem; box-shadow: 0 15px 35px rgba(0,0,0,0.06); display: flex; flex-direction: column; transition: transform 0.4s ease, box-shadow 0.4s ease;">
                        <div style="border-radius: 16px; overflow: hidden; height: 260px; margin-bottom: 1.6rem; background-color: #d6ccc2;">
                            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery_2_1785739478020.png' ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease;" alt="Prayer and Intercession" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <h3 style="font-family: 'Phudu', sans-serif !important; font-size: 1.25rem !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; margin-bottom: 0.8rem; letter-spacing: 0.01em; line-height: 1.3;">
                            REFLECTIONS ON MORNING PRAYER
                        </h3>
                        <p style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.88rem; color: #57534e; line-height: 1.6; margin-bottom: 1.6rem;">
                            PRAYER &amp; INTERCESSION HOME MEETING<br>TIMES Thursdays, 6:00pm [...]
                        </p>
                        <div style="margin-top: auto;">
                            <a href="<?php echo esc_url( get_permalink( 51 ) ); ?>" class="news-text-link" style="font-family: 'Instrument Sans', sans-serif !important; font-weight: 800 !important; font-size: 0.88rem !important; color: #1c1917 !important; text-transform: uppercase !important; letter-spacing: 0.06em !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; transition: color 0.3s ease !important;">
                                <span>READ MORE</span> <span class="btn-arrow" style="font-size: 1rem; transition: transform 0.3s ease;"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                        </div>
                    </div>

                    <!-- Card 5: Liturgy & Worship -->
                    <div class="blog-padded-card" style="flex: 0 0 380px; scroll-snap-align: start; background: #ffffff; border-radius: 24px; padding: 1.8rem; box-shadow: 0 15px 35px rgba(0,0,0,0.06); display: flex; flex-direction: column; transition: transform 0.4s ease, box-shadow 0.4s ease;">
                        <div style="border-radius: 16px; overflow: hidden; height: 260px; margin-bottom: 1.6rem; background-color: #d6ccc2;">
                            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_24_08_PM.png' ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease;" alt="Liturgy and Worship" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <h3 style="font-family: 'Phudu', sans-serif !important; font-size: 1.25rem !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; margin-bottom: 0.8rem; letter-spacing: 0.01em; line-height: 1.3;">
                            BRINGING HOPE TO THE MARGINS
                        </h3>
                        <p style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.88rem; color: #57534e; line-height: 1.6; margin-bottom: 1.6rem;">
                            LITURGY &amp; WORSHIP HOME MEETING<br>TIMES Sundays, 7:00am [...]
                        </p>
                        <div style="margin-top: auto;">
                            <a href="<?php echo esc_url( get_permalink( 52 ) ); ?>" class="news-text-link" style="font-family: 'Instrument Sans', sans-serif !important; font-weight: 800 !important; font-size: 0.88rem !important; color: #1c1917 !important; text-transform: uppercase !important; letter-spacing: 0.06em !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; transition: color 0.3s ease !important;">
                                <span>READ MORE</span> <span class="btn-arrow" style="font-size: 1rem; transition: transform 0.3s ease;"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                        </div>
                    </div>

                    <!-- Card 6: Outreach & Charity -->
                    <div class="blog-padded-card" style="flex: 0 0 380px; scroll-snap-align: start; background: #ffffff; border-radius: 24px; padding: 1.8rem; box-shadow: 0 15px 35px rgba(0,0,0,0.06); display: flex; flex-direction: column; transition: transform 0.4s ease, box-shadow 0.4s ease;">
                        <div style="border-radius: 16px; overflow: hidden; height: 260px; margin-bottom: 1.6rem; background-color: #d6ccc2;">
                            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery_4_1785739507745.png' ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease;" alt="Outreach and Charity" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <h3 style="font-family: 'Phudu', sans-serif !important; font-size: 1.25rem !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; margin-bottom: 0.8rem; letter-spacing: 0.01em; line-height: 1.3;">
                            A JOURNEY OF FAITH AND FELLOWSHIP
                        </h3>
                        <p style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.88rem; color: #57534e; line-height: 1.6; margin-bottom: 1.6rem;">
                            OUTREACH &amp; CHARITY HOME MEETING<br>TIMES Saturdays, 9:00am [...]
                        </p>
                        <div style="margin-top: auto;">
                            <a href="<?php echo esc_url( get_permalink( 53 ) ); ?>" class="news-text-link" style="font-family: 'Instrument Sans', sans-serif !important; font-weight: 800 !important; font-size: 0.88rem !important; color: #1c1917 !important; text-transform: uppercase !important; letter-spacing: 0.06em !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; transition: color 0.3s ease !important;">
                                <span>READ MORE</span> <span class="btn-arrow" style="font-size: 1rem; transition: transform 0.3s ease;"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- View All Blogs Button -->
                <div class="gsap-fade-up" style="text-align: center; margin-top: 3rem;">
                    <a href="<?php echo esc_url( home_url( '/blogs/' ) ); ?>" class="btn-fill-animation">
                        <span>VIEW ALL BLOGS</span> <span class="btn-arrow"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                    </a>
                </div>

            </div>
        </section>


    
        <!-- 6. Gallery Section -->
        <section id="gallery-grid" style="padding: clamp(1.5rem, 3vw, 2.5rem) 0 clamp(2rem, 3vw, 2.5rem) 0; background-color: #FFFFFF; box-sizing: border-box;">
            <div style="max-width: 1320px; margin: 0 auto; padding: 0 clamp(1rem, 5vw, 3rem);">

                <!-- Section Header -->
                <div style="text-align: center; max-width: 900px; margin: 0 auto 2.2rem auto;">
                    <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.4rem;">
                        <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                        <span style="color: #4A2A18; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;">IMAGE GALLERY</span>
                    </div>
                    <h2 style="font-family: 'Phudu', sans-serif !important; font-size: clamp(2.3rem, 3.8vw, 3.2rem) !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.15; letter-spacing: -0.01em; margin: 0; text-align: center;">
                        EXPLORE OUR BEAUTIFUL CHURCH
                    </h2>
                </div>

                <!-- Dynamic Gallery Grid (populated via JavaScript) -->
                <div id="home-gallery-container" class="gallery-grid-layout responsive-grid-3" style="display: grid; gap: 2.2rem; margin-bottom: 2rem;">
                    <!-- Images will be populated by JavaScript -->
                </div>
                <!-- View All Gallery Button -->
                <div class="gsap-fade-up" style="text-align: center; margin-top: 1rem;">
                    <a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" class="btn-fill-animation">
                        <span>VIEW ALL PHOTOS</span> <span class="btn-arrow"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                    </a>
                </div>
            </div>
        </section>

                <!-- Gallery Data & Initialization Script -->
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const galleryData = <?php 
                $g_items = franciscan_get_gallery_items();
                $home_g = array_slice( $g_items, 0, 6 );
                $formatted = array();
                foreach ( $home_g as $it ) {
                    $formatted[] = array(
                        'src' => $it['src'],
                        'alt' => $it['alt'] ?? 'Franciscan Ministry'
                    );
                }
                echo json_encode( $formatted );
            ?>;

            const container = document.getElementById('home-gallery-container');
            if (container && galleryData && galleryData.length > 0) {
                container.innerHTML = '';
                galleryData.forEach(img => {
                    const div = document.createElement('div');
                    div.style.cssText = 'overflow: hidden; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); transition: transform 0.4s ease;';
                    div.innerHTML = `<img loading="lazy" decoding="async" src="${img.src}" alt="${img.alt}" style="width: 100%; height: 100%; object-fit: cover; aspect-ratio: 4/3; display: block; transition: transform 0.6s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">`;
                    container.appendChild(div);
                });
            }
        });
        </script>

    <section id="inquiry-section" style="padding: clamp(1.5rem, 3vw, 2.5rem) 0 clamp(2rem, 4vw, 3.5rem) 0; background-color: #FFFFFF; color: #ffffff; box-sizing: border-box;">
            <div style="max-width: 1320px; margin: 0 auto; padding: 0 clamp(1rem, 5vw, 3rem);">
                
                <!-- Main Inset Card Container with 32px Rounded Corners & Background Image -->
                <div style="position: relative; border-radius: 32px; overflow: hidden; background: url('<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_51_30_PM.png' ); ?>') no-repeat center center / cover fixed !important; background-attachment: fixed !important; box-shadow: 0 20px 50px rgba(0,0,0,0.15); min-height: 520px;">
                    
                    <!-- Dark Vignette Overlay -->
                    <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(15,10,6,0.75) 0%, rgba(15,10,6,0.85) 60%, rgba(15,10,6,0.92) 100%); z-index: 1;"></div>

                    <!-- Layout Grid: Left Image & Right Form -->
                    <div class="responsive-grid-contact" style="position: relative; z-index: 2; display: grid; gap: 3rem; align-items: stretch; min-height: 520px; padding: 0 1.5rem;">
                        
                        <!-- Left Side: Praying Woman PNG Image (Pinned directly to bottom edge) -->
                        <div style="position: relative; display: flex; align-items: flex-end; justify-content: flex-start; min-height: 480px;">
                            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_56_24_PM.png' ); ?>" alt="Praying Sister" style="position: absolute; bottom: 0; left: 0; height: 100%; max-height: 500px; width: auto; object-fit: contain; object-position: bottom left; filter: drop-shadow(0 15px 30px rgba(0,0,0,0.8)); display: block; pointer-events: none; ">
                        </div>

                        <!-- Right Side: Inquiry Form Content -->
                        <div style="padding: 3.5rem 0; display: flex; flex-direction: column; justify-content: center;">
                            
                            <!-- Eyebrow Tag -->
                            <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.2rem;">
                                <span style="width: 6px; height: 6px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                                <span style="color: #e6c888; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;">SUBMIT AN INQUIRY</span>
                            </div>

                            <!-- Heading in Phudu 600 -->
                            <h2 style="font-family: 'Phudu', sans-serif !important; font-size: clamp(2rem, 3vw, 2.5rem) !important; font-weight: 600 !important; color: #ffffff !important; text-transform: uppercase; line-height: 1.18; letter-spacing: -0.01em; margin-bottom: 1.8rem;">
                                HAVE A QUESTION OR NEED PRAYER? REACH OUT TO US
                            </h2>

                            <!-- Inquiry Form -->
                            <!-- Inquiry Form (Hardened AJAX & Security) -->
                            <form id="home-quick-inquiry-form" method="post" novalidate style="display: flex; flex-direction: column; gap: 1.1rem;">
                                <input type="hidden" name="action" value="franciscan_submit_contact">
                                <?php wp_nonce_field( 'franciscan_nonce', 'security' ); ?>
                                <!-- Anti-Spam Honeypot -->
                                <input type="text" name="website_hp" style="display:none !important; position:absolute; left:-9999px;" tabindex="-1" autocomplete="off" aria-hidden="true">
                                
                                <div class="responsive-grid-2" style="display: grid; gap: 1rem;">
                                    <div class="input-wrap">
                                        <input type="text" name="name" placeholder="Your Full Name *" required minlength="2" maxlength="100" autocomplete="name" style="width: 100%; padding: 1rem 1.3rem; background: rgba(255, 255, 255, 0.08); border: 1.5px solid rgba(255, 255, 255, 0.18); border-radius: 12px; color: #ffffff; font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem; outline: none;" onfocus="this.style.borderColor='#e6c888'" onblur="this.style.borderColor='rgba(255, 255, 255, 0.18)'">
                                    </div>
                                    <div class="input-wrap">
                                        <input type="email" name="email" placeholder="Your Email Address *" required maxlength="120" autocomplete="email" style="width: 100%; padding: 1rem 1.3rem; background: rgba(255, 255, 255, 0.08); border: 1.5px solid rgba(255, 255, 255, 0.18); border-radius: 12px; color: #ffffff; font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem; outline: none;" onfocus="this.style.borderColor='#e6c888'" onblur="this.style.borderColor='rgba(255, 255, 255, 0.18)'">
                                    </div>
                                </div>

                                <div class="input-wrap">
                                    <select name="subject" required style="width: 100%; padding: 1rem 1.3rem; background: rgba(28, 25, 23, 0.95); border: 1.5px solid rgba(255, 255, 255, 0.18); border-radius: 12px; color: #ffffff; font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem; outline: none; cursor: pointer;" onfocus="this.style.borderColor='#e6c888'" onblur="this.style.borderColor='rgba(255, 255, 255, 0.18)'">
                                        <option value="General Inquiries">General Inquiry</option>
                                        <option value="Prayer Request / Intercession">Prayer Request &amp; Intentions</option>
                                        <option value="Vocation Guidance">Vocational &amp; Priesthood Guidance</option>
                                        <option value="Holy Mass Intention">Holy Mass Intention</option>
                                        <option value="Donation &amp; Contribution Support">Donation &amp; Mission Support</option>
                                    </select>
                                </div>

                                <div class="input-wrap">
                                    <textarea name="message" rows="3" placeholder="Write your message or prayer request here... *" required minlength="5" maxlength="2000" style="width: 100%; padding: 1rem 1.3rem; background: rgba(255, 255, 255, 0.08); border: 1.5px solid rgba(255, 255, 255, 0.18); border-radius: 12px; color: #ffffff; font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem; outline: none; resize: none;" onfocus="this.style.borderColor='#e6c888'" onblur="this.style.borderColor='rgba(255, 255, 255, 0.18)'"></textarea>
                                </div>

                                <div style="margin-top: 0.4rem;">
                                    <button type="submit" class="btn-fill-animation" style="width: 100%; justify-content: center; background: #4A2A18; border: 1.5px solid #4A2A18; color: #ffffff;">
                                        <span>SUBMIT INQUIRY</span> <span class="btn-arrow"><svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: text-bottom;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></span>
                                    </button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>
        </section>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    if (window.innerWidth > 768) {
        let dot = document.createElement("div");
        dot.className = "custom-cursor-dot";
        let follower = document.createElement("div");
        follower.className = "custom-cursor-follower";
        document.body.appendChild(dot);
        document.body.appendChild(follower);

        let mouseX = -100, mouseY = -100;
        let followerX = -100, followerY = -100;

        document.addEventListener("mousemove", function(e) {
            mouseX = e.clientX;
            mouseY = e.clientY;
            dot.style.left = mouseX + "px";
            dot.style.top = mouseY + "px";
        });

        // Add interactive hover state for clickable elements
        const interactiveElements = document.querySelectorAll('a, button, input, select, textarea, .hover-target, .card-link');
        interactiveElements.forEach(el => {
            el.addEventListener('mouseenter', () => {
                follower.classList.add('cursor-hovering');
                dot.classList.add('cursor-hovering');
            });
            el.addEventListener('mouseleave', () => {
                follower.classList.remove('cursor-hovering');
                dot.classList.remove('cursor-hovering');
            });
        });

        function animateFollower() {
            followerX += (mouseX - followerX) * 0.15;
            followerY += (mouseY - followerY) * 0.15;
            follower.style.left = followerX + "px";
            follower.style.top = followerY + "px";
            requestAnimationFrame(animateFollower);
        }
        animateFollower();
    }
});
</script>

</div>

<!-- Floating Contact Dock (Chat / Call / Email) -->
<div class="cta-dock" data-cta-dock>

    <ul class="cta-dock__menu" id="cta-dock-menu">
        <?php
        $dock_email    = franciscan_get_option( 'contact_email', 'info@franciscansociety.org' );
        $dock_phone    = franciscan_get_option( 'contact_phone', '+91 651 234 5678' );
        $dock_tel      = 'tel:+' . preg_replace( '/[^0-9]/', '', $dock_phone );
        $dock_wa       = franciscan_get_option( 'whatsapp_number', '917012649326' );
        $dock_wa_url   = 'https://wa.me/' . preg_replace( '/[^0-9]/', '', $dock_wa ) . '?text=Hello%2C%20I%27d%20like%20to%20know%20more%20about%20the%20Franciscan%20Society.';
        $dock_email_url = 'mailto:' . antispambot( $dock_email ) . '?subject=Enquiry%20%E2%80%93%20The%20Franciscan%20Society';
        ?>
        <li class="cta-dock__item">
            <a class="cta-dock__link" href="<?php echo esc_url( $dock_email_url ); ?>">
                <span class="cta-dock__item-icon">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                        <rect x="3.5" y="5.5" width="17" height="13" rx="2" stroke="currentColor" stroke-width="1.6"/>
                        <path d="M4.5 7l7.5 6 7.5-6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                <span class="cta-dock__item-label">Email Us</span>
            </a>
        </li>
        <li class="cta-dock__item">
            <a class="cta-dock__link" href="<?php echo esc_url( $dock_tel ); ?>">
                <span class="cta-dock__item-icon">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                        <path d="M6.6 10.8c1.4 2.8 3.8 5.2 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.4c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.4 0 .8-.2 1l-2.2 2.2Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="cta-dock__item-label">Call Us</span>
            </a>
        </li>
        <li class="cta-dock__item">
            <a rel="noopener noreferrer" class="cta-dock__link" href="<?php echo esc_url( $dock_wa_url ); ?>" target="_blank">
                <span class="cta-dock__item-icon">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                        <path d="M4 6.5A2.5 2.5 0 0 1 6.5 4h11A2.5 2.5 0 0 1 20 6.5v7A2.5 2.5 0 0 1 17.5 16H9.8L5.6 19.2a.6.6 0 0 1-.96-.48V16h-.14A2.5 2.5 0 0 1 4 13.5v-7Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
                        <circle cx="8.5" cy="10" r="0.9" fill="currentColor" stroke="none"/>
                        <circle cx="12" cy="10" r="0.9" fill="currentColor" stroke="none"/>
                        <circle cx="15.5" cy="10" r="0.9" fill="currentColor" stroke="none"/>
                    </svg>
                </span>
                <span class="cta-dock__item-label">Chat on WhatsApp</span>
            </a>
        </li>
    </ul>

    <button type="button" class="cta-dock__trigger" id="cta-dock-trigger" aria-expanded="false" aria-controls="cta-dock-menu" aria-label="Contact us">
        
        <span class="cta-dock__glyph cta-dock__glyph--tau" aria-hidden="true">
            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/christian-cross.png' ); ?>" alt="Christian Cross" style="width: 48px; height: 48px; object-fit: contain; filter: brightness(0) saturate(100%) invert(18%) sepia(21%) saturate(2311%) hue-rotate(341deg) brightness(95%) contrast(86%);" />
        </span>
        <span class="cta-dock__glyph cta-dock__glyph--close" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" focusable="false">
                <path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
            </svg>
        </span>
    </button>
</div>

<script>
(function () {
    const dock = document.querySelector('[data-cta-dock]');
    if (!dock) return;
    const trigger = document.getElementById('cta-dock-trigger');
    const menu = document.getElementById('cta-dock-menu');

    function openDock() {
        dock.classList.add('is-open');
        trigger.setAttribute('aria-expanded', 'true');
        trigger.setAttribute('aria-label', 'Close contact options');
        menu.setAttribute('aria-hidden', 'false');
    }

    function closeDock(focusTrigger) {
        dock.classList.remove('is-open');
        trigger.setAttribute('aria-expanded', 'false');
        trigger.setAttribute('aria-label', 'Contact us');
        menu.setAttribute('aria-hidden', 'true');
        if (focusTrigger) trigger.focus();
    }

    trigger.addEventListener('click', () => {
        dock.classList.contains('is-open') ? closeDock(false) : openDock();
    });

    document.addEventListener('click', (e) => {
        if (dock.classList.contains('is-open') && !dock.contains(e.target)) {
            closeDock(false);
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && dock.classList.contains('is-open')) {
            closeDock(true);
        }
    });

    menu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => closeDock(false));
    });
})();
</script>

<!-- Master GSAP + ScrollTrigger Animation Engine -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    gsap.registerPlugin(ScrollTrigger);

    // 1. Navbar Slide Down Reveal
    if (document.querySelector(".fs-header")) { gsap.from(".fs-header", {
        y: -80,
        opacity: 0,
        duration: 1.2,
        ease: "power3.out"
    }); }

    // 2. Hero Content Reveal is owned by revealHeroTitle() in the preloader
    // script below, so it plays in sync with the circle expanding. The old
    // delay-based tweens here ran underneath the preloader (invisible) and
    // left the h1 parked at opacity 0 while the word stagger fought it.

    // 3. Section Titles (H2) Staggered Reveal
    gsap.utils.toArray("h2").forEach(h2 => {
        gsap.from(h2, {
            scrollTrigger: {
                trigger: h2,
                start: "top 85%",
                toggleActions: "play none none none"
            },
            y: 35,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        });
    });

    // 4. Paragraphs Fade Up Animation
    gsap.utils.toArray("p").forEach(p => {
        gsap.from(p, {
            scrollTrigger: {
                trigger: p,
                start: "top 88%",
                toggleActions: "play none none none"
            },
            y: 25,
            opacity: 0,
            duration: 0.9,
            ease: "power2.out"
        });
    });

    // Parallax Background Video
    gsap.to("#hero-bg-video", {
        scrollTrigger: {
            trigger: ".hero-section",
            start: "top top",
            end: "bottom top",
            scrub: true
        },
        yPercent: 20,
        ease: "none"
    });

    // 5. Images Fade + Scale Reveal
    gsap.utils.toArray(".about-img-container, .about-video-card").forEach(img => {
        gsap.from(img, {
            scrollTrigger: {
                trigger: img,
                start: "top 85%",
                toggleActions: "play none none none"
            },
            scale: 0.94,
            opacity: 0,
            duration: 1.1,
            ease: "power3.out"
        });
    });

    // 6. Floating Icon Animation
    gsap.to(".about-video-card span, .about-section div[style*='background: #c8102e']", {
        y: -6,
        repeat: -1,
        yoyo: true,
        duration: 2.2,
        ease: "power1.inOut"
    });

    // 7. Statistics Count-Up Animation
    const statElements = document.querySelectorAll(".hero-grid div[style*='font-size: 2.2rem']");
    statElements.forEach(el => {
        let text = el.innerText;
        let num = parseInt(text.replace(/[^0-9]/g, ""));
        if (!isNaN(num)) {
            ScrollTrigger.create({
                trigger: el,
                start: "top 90%",
                onEnter: () => {
                    let obj = { val: 0 };
                    gsap.to(obj, {
                        val: num,
                        duration: 2,
                        ease: "power2.out",
                        onUpdate: () => {
                            el.innerText = Math.floor(obj.val) + "+";
                        }
                    });
                }
            });
        }
    });

});
</script>


<!-- GSAP Word-by-Word Heading Split Animation Engine -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    gsap.registerPlugin(ScrollTrigger);

    // GSAP ScrollTrigger: Bible PNG flies to left side behind Welcome section title on scroll
    const heroBibleEl = document.querySelector(".hero-bible-img");
    const welcomeHeading = document.querySelector("#welcome-section h2");

    // Function to split headings (H1, H2, H3) into word spans for word-by-word stagger
    function splitHeadingsWordByWord() {
        const headings = document.querySelectorAll("h1, h2, h3");
        
        headings.forEach(heading => {
            // Avoid double splitting
            if (heading.dataset.wordSplit === "true") return;
            heading.dataset.wordSplit = "true";

            // Process inner HTML to preserve <br> tags while splitting text nodes into words
            const childNodes = Array.from(heading.childNodes);
            heading.innerHTML = ""; // Clear existing content

            childNodes.forEach(node => {
                if (node.nodeType === Node.TEXT_NODE) {
                    const words = node.textContent.trim().split(/\s+/);
                    words.forEach((word, index) => {
                        if (word.length > 0) {
                            const wordSpan = document.createElement("span");
                            wordSpan.className = "gsap-heading-word";
                            wordSpan.style.display = "inline-block";
                            wordSpan.style.whiteSpace = "pre";
                            wordSpan.style.opacity = "0";
                            wordSpan.style.transform = "translateY(25px)";
                            wordSpan.style.filter = "none";
                            wordSpan.style.willChange = "transform, opacity, filter";
                            wordSpan.textContent = word + (index < words.length - 1 ? " " : "");
                            heading.appendChild(wordSpan);
                        }
                    });
                } else if (node.nodeType === Node.ELEMENT_NODE) {
                    if (node.tagName.toLowerCase() === "br") {
                        heading.appendChild(document.createElement("br"));
                    } else {
                        // For nested elements (like <span>), split their inner text
                        const wordSpan = document.createElement("span");
                        wordSpan.className = "gsap-heading-word";
                        wordSpan.style.display = "inline-block";
                        wordSpan.style.whiteSpace = "pre";
                        wordSpan.style.opacity = "0";
                        wordSpan.style.transform = "translateY(25px)";
                        wordSpan.style.filter = "none";
                        wordSpan.style.willChange = "transform, opacity, filter";
                        // Preserve inline styles and classes
                        if (node.style.cssText) wordSpan.style.cssText += node.style.cssText;
                        if (node.className) wordSpan.classList.add(...node.className.split(' '));
                        wordSpan.textContent = node.textContent + " ";
                        heading.appendChild(wordSpan);
                    }
                }
            });

            // Animate word spans using GSAP ScrollTrigger with exact specifications
            const words = heading.querySelectorAll(".gsap-heading-word");
            if (words.length > 0) {
                if (heading.classList.contains("hero-title")) return; // handled by preloader
                gsap.to(words, {
                    scrollTrigger: {
                        trigger: heading,
                        start: "top 88%",
                        toggleActions: "play none none none"
                    },
                    opacity: 1,
                    y: 0,
                    
                    stagger: 0.08,
                    duration: 0.7,
                    ease: "power4.out"
                });
            }
        });
    }

    // Execute split and animation engine
    splitHeadingsWordByWord();
});
</script>


<!-- Expanding Circle Preloader & Fast Hero Entrance Engine -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const preloader = document.getElementById("cinematic-preloader");
    const preloaderCircle = document.getElementById("preloader-circle");
    const preloaderLogo = document.getElementById("preloader-logo");
    const heroBible = document.querySelector(".hero-bible-img");
    const navLogoText = document.querySelector(".header__logo span");

    if (heroBible) heroBible.style.opacity = "1";
    if (navLogoText) navLogoText.style.opacity = "1";

    let heroRevealed = false;
    function revealHeroTitle(timeline, position) {
        if (heroRevealed) return;
        const heroWords = document.querySelectorAll(".hero-title .gsap-heading-word");
        if (!heroWords.length) return;
        heroRevealed = true;

        const eyebrow = document.querySelector(".js-hero-text > div:first-child");
        const rest = document.querySelectorAll(".hero-buttons-row, .js-hero-text p, .responsive-grid-3");
        const tween = { opacity: 1, y: 0, stagger: 0.04, duration: 0.5, ease: "power3.out" };

        if (timeline) {
            if (eyebrow) timeline.fromTo(eyebrow, { opacity: 0, y: 15 }, { opacity: 1, y: 0, duration: 0.4, ease: "power3.out" }, position || "-=0.2");
            timeline.fromTo(heroWords, { opacity: 0, y: 20 }, tween, "-=0.25");
            if (rest.length) timeline.fromTo(rest, { opacity: 0, y: 15 }, { opacity: 1, y: 0, stagger: 0.08, duration: 0.5, ease: "power3.out" }, "-=0.3");
        } else {
            if (eyebrow) gsap.to(eyebrow, { opacity: 1, y: 0, duration: 0.4, ease: "power3.out" });
            gsap.to(heroWords, tween);
            if (rest.length) gsap.to(rest, { opacity: 1, y: 0, stagger: 0.08, duration: 0.5, ease: "power3.out" });
        }
    }

    function runPreloaderExit() {
        if (!preloader || preloader.dataset.completed === "true") return;
        preloader.dataset.completed = "true";
        preloader.style.pointerEvents = "none";

        if (typeof gsap === "undefined") {
            preloader.style.display = "none";
            revealHeroTitle(null);
            return;
        }

        const timeline = gsap.timeline({
            onComplete: function() {
                preloader.style.display = "none";
            }
        });

        timeline.to(preloaderLogo, {
            opacity: 0,
            duration: 0.2,
            ease: "power2.inOut"
        })
        .to(preloaderCircle, {
            scale: 50,
            ease: "power3.inOut"
        }, "-=0.05")
        .to(preloader, {
            opacity: 0,
            duration: 0.35,
            ease: "power2.inOut"
        }, "-=0.35");

        revealHeroTitle(timeline, "-=0.4");
    }

    // Small pop in animation for the circle
    if (preloaderCircle && typeof gsap !== "undefined") {
        gsap.from(preloaderCircle, {
            scale: 0,
            opacity: 0,
            duration: 0.35,
            ease: "back.out(1.5)"
        });
    }

    // Launch immediately on window load or max 500ms after DOM ready
    window.addEventListener("load", runPreloaderExit);
    setTimeout(runPreloaderExit, 500);
    setTimeout(() => revealHeroTitle(null), 900);
});
</script>
<!-- GSAP Divine Golden Meteor & Celestial Sparkle Engine -->
<script>
document.addEventListener("DOMContentLoaded", function() {

    // 1. Bible Gentle Floating & Rotation Motion (3-5px float, +-2deg rotation)
    const heroBible = document.querySelector(".hero-bible-img");
    if (heroBible) {
        gsap.to(heroBible, {
            y: -5,
            rotation: 2,
            duration: 3.5,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });
    }

    // 2. Subtle Golden Aura Glow Pulse (Every 4-6 seconds)
    const auraGlow = document.getElementById("divine-aura-glow");
    if (auraGlow) {
        gsap.to(auraGlow, {
            scale: 1.35,
            opacity: 0.85,
            duration: 2.8,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });
    }

    // 3. Golden Meteor Streaks Generator (12-15 diagonal flying streaks)
    const streakContainer = document.getElementById("meteor-streaks-layer");
    if (streakContainer) {
        const colors = ["#FFD86B", "#FFC94A", "#FFE8A3", "#FFFFFF"];
        const streakCount = 14;

        for (let i = 0; i < streakCount; i++) {
            createMeteorStreak();
        }

        function createMeteorStreak() {
            const streak = document.createElement("div");
            streak.className = "meteor-streak";
            
            const isFront = Math.random() > 0.45; // 55% in front, 45% behind
            const length = gsap.utils.random(70, 150);
            const color = colors[Math.floor(Math.random() * colors.length)];
            const angle = gsap.utils.random(-38, -48); // Diagonal downward trajectory

            streak.style.cssText = `
                position: absolute;
                width: ${length}px;
                height: 2px;
                background: linear-gradient(90deg, ${color} 0%, rgba(255,201,74,0.5) 40%, rgba(255,216,107,0) 100%);
                border-radius: 50px;
                transform: rotate(${angle}deg);
                opacity: 0;
                pointer-events: none;
                z-index: 1;
                filter: drop-shadow(0 0 6px ${color});
            `;

            // Glowing Meteor Head
            const head = document.createElement("div");
            head.style.cssText = `
                position: absolute;
                left: 0;
                top: -1px;
                width: 4px;
                height: 4px;
                background: #ffffff;
                border-radius: 50%;
                box-shadow: 0 0 10px #FFFFFF, 0 0 15px ${color};
            `;
            streak.appendChild(head);
            streakContainer.appendChild(streak);

            // Randomize spawn position around Bible
            const startX = gsap.utils.random(-40, 180);
            const startY = gsap.utils.random(-50, 80);
            const moveX = gsap.utils.random(120, 220);
            const moveY = gsap.utils.random(120, 220);
            const duration = gsap.utils.random(1.4, 2.6);
            const delay = gsap.utils.random(0.1, 4.5);

            gsap.set(streak, { x: startX, y: startY, opacity: 0 });

            gsap.to(streak, {
                x: startX + moveX,
                y: startY + moveY,
                opacity: gsap.utils.random(0.65, 0.95),
                duration: duration,
                delay: delay,
                ease: "power1.in",
                onComplete: () => {
                    streak.remove();
                    createMeteorStreak(); // Continuous loop with randomized parameters
                }
            });
        }
    }

    // 4. Floating Gold Dust & Twinkling 4-Point Star Sparkles
    const sparklesLayer = document.getElementById("sparkles-layer");
    if (sparklesLayer) {
        const sparkleCount = 16;
        for (let j = 0; j < sparkleCount; j++) {
            createSparkle();
        }

        function createSparkle() {
            const isStar = Math.random() > 0.6; // 40% 4-point stars, 60% gold dust
            const sparkle = document.createElement("div");
            const x = gsap.utils.random(-20, 220);
            const y = gsap.utils.random(-30, 220);

            if (isStar) {
                // 4-point star using pure CSS (no text characters)
                const size = gsap.utils.random(6, 10);
                sparkle.style.cssText = `
                    position: absolute;
                    left: ${x}px;
                    top: ${y}px;
                    width: ${size}px;
                    height: ${size}px;
                    background: linear-gradient(90deg, #FFE8A3 50%, transparent 50%) center / 100% 30% no-repeat,
                                linear-gradient(0deg, #FFE8A3 50%, transparent 50%) center / 30% 100% no-repeat;
                    opacity: 0;
                    pointer-events: none;
                    z-index: 1;
                    filter: drop-shadow(0 0 4px #FFC94A);
                `;
            } else {
                const size = gsap.utils.random(2, 4);
                sparkle.style.cssText = `
                    position: absolute;
                    left: ${x}px;
                    top: ${y}px;
                    width: ${size}px;
                    height: ${size}px;
                    background: #FFD86B;
                    border-radius: 50%;
                    opacity: 0;
                    pointer-events: none;
                    z-index: 1;
                    box-shadow: 0 0 6px #FFE8A3;
                `;
            }

            sparklesLayer.appendChild(sparkle);

            const duration = gsap.utils.random(1.8, 3.5);
            const delay = gsap.utils.random(0.2, 5.0);

            gsap.timeline({
                delay: delay,
                onComplete: () => {
                    sparkle.remove();
                    createSparkle(); // Continuous loop
                }
            })
            .to(sparkle, { opacity: gsap.utils.random(0.5, 0.9), y: "-=12", duration: duration * 0.5, ease: "sine.in" })
            .to(sparkle, { opacity: 0, y: "-=12", duration: duration * 0.5, ease: "sine.out" });
        }
    }

});
</script>


<!-- 100% Bulletproof Window Scroll Flight Engine for Bible PNG -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const heroBibleRef = document.querySelector(".hero-bible-img");
    const welcomeTitleRef = document.querySelector(".gsap-reveal-h2");
    const flyingContainer = document.getElementById("welcome-scroll-bible-container");
    const flyingImg = document.getElementById("welcome-scroll-bible-img");

    if (flyingContainer && flyingImg) {
        function updateBibleFlight() {
            const scrollY = window.scrollY;
            const heroSection = document.getElementById("hero-section");
            const heroHeight = heroSection ? heroSection.offsetHeight : 650;
            
            // Activate flight when scrolling down from Hero section into Welcome section
            if (scrollY > 10) {
                flyingContainer.style.display = "block";
                
                // Fly during the first 60% of the hero height scroll
                const progress = Math.min(1, (scrollY - 10) / (heroHeight * 0.6));
                
                // Z-index: Over everything during flight, behind text once landed
                flyingContainer.style.zIndex = (progress < 0.95) ? "99999" : "2";
                
                if (heroBibleRef) heroBibleRef.style.setProperty('visibility', 'hidden', 'important');

                // Starting position (Hero Bible top-right)
                const startX = window.innerWidth * 0.82;
                const startY = 160;

                // Target position: Exactly in the center of the screen, pinned to the Welcome section title
                let targetX = window.innerWidth / 2 - 45; // 45 is half of the 90px width
                let targetY = 300;
                
                if (welcomeTitleRef) {
                    const tRect = welcomeTitleRef.getBoundingClientRect();
                    targetX = tRect.left + (tRect.width / 2) - 45;
                    targetY = tRect.top + (tRect.height / 2) - 20; // Center vertically on title
                }

                if (progress < 1) {
                    // Flying state
                    const currentX = startX + (targetX - startX) * progress;
                    const currentY = startY + (targetY - startY) * Math.pow(progress, 0.8);
                    const rotation = -35 * progress;
                    const opacity = 1 - (progress * 0.85); // Fades down to 0.15 (watermark)

                    flyingImg.style.left = currentX + "px";
                    flyingImg.style.top = currentY + "px";
                    flyingImg.style.transform = `rotate(${rotation}deg) scale(${1 + progress * 2.5})`;
                    flyingImg.style.opacity = opacity;
                } else {
                    // Landed state: pinned to the Welcome section
                    flyingImg.style.left = targetX + "px";
                    flyingImg.style.top = targetY + "px";
                    flyingImg.style.transform = `rotate(-35deg) scale(3.5)`;
                    flyingImg.style.opacity = 0.15; // Very subtle watermark behind text
                }
            } else {
                // At top in Hero
                flyingContainer.style.display = "none";
                if (heroBibleRef) heroBibleRef.style.setProperty('visibility', 'visible', 'important');
            }
        }

        window.addEventListener("scroll", updateBibleFlight);
        window.addEventListener("resize", updateBibleFlight);
        updateBibleFlight();
    }
});
</script>


        
        <!-- Mass Intention in USA Section -->
        <section style="padding: clamp(2rem, 4vw, 3.5rem) 0 clamp(1.5rem, 3vw, 2.5rem) 0; background-color: #FAFAFA; box-sizing: border-box;">
            <!-- Rounded Card Container -->
            <div style="max-width: 1320px; margin: 0 auto; padding: 0 clamp(1rem, 5vw, 3rem);">
                <div style="position: relative; width: 100%; border-radius: 32px;  box-shadow: 0 25px 60px rgba(0,0,0,0.35); display: flex; align-items: center; justify-content: center; box-sizing: border-box;">
                
                <!-- Fixed Photo Background with Parallax -->
                <div style="position: absolute; inset: 0; width: 100%; height: 100%; background-image: url('https://images.unsplash.com/photo-1438032005730-c779502df39b?w=1600&q=80&auto=format&fit=crop'); background-attachment: fixed; background-position: center; background-size: cover; z-index: 1;"></div>
                
                <!-- Dark Overlay -->
                <div style="position: absolute; inset: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); z-index: 2;"></div>

                <!-- Content Grid -->
                <div class="gsap-fade-up responsive-grid-2" style="position: relative; z-index: 10; width: 100%; padding: 5rem 4rem; display: grid; gap: 4rem; align-items: center; box-sizing: border-box;">
                    
                    <!-- Left Column: Title & Text -->
                    <div>
                        <!-- Eyebrow -->
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.4rem; background: rgba(255,255,255,0.1); padding: 0.4rem 1rem; border-radius: 50px; backdrop-filter: blur(5px);">
                            <span style="width: 6px; height: 6px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                            <span style="color: #ffffff; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; font-family: 'Instrument Sans', sans-serif;">SUPPORT OUR MISSION</span>
                        </div>

                        <h2 class="gsap-reveal-h2" style="font-family: 'Phudu', sans-serif !important; font-size: clamp(2.4rem, 4vw, 3.6rem) !important; font-weight: 600 !important; color: #ffffff !important; text-transform: uppercase; line-height: 1.15; letter-spacing: -0.01em; margin-bottom: 1.5rem;">
                            FOR MASS INTENSION IN USA
                        </h2>
                        
                        <p class="gsap-reveal-p" style="font-family: 'Instrument Sans', sans-serif !important; font-size: 1.1rem !important; font-weight: 500 !important; color: rgba(255,255,255,0.9) !important; line-height: 1.8 !important; max-width: 500px; margin-bottom: 2.5rem;">
                            TOR FRANCISCANS OF ST.LOUIS PROVINCE
                        </p>

                        <!-- Note Box -->
                        <div style="background-color: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 1.25rem 1.5rem; border-radius: 8px; display: flex; align-items: flex-start; gap: 1rem; max-width: 500px;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#e6c888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0; margin-top: 2px;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            <div>
                                <div style="font-family: 'Instrument Sans', sans-serif; font-weight: 700; color: #ffffff; font-size: 0.95rem;">Important Note</div>
                                <div style="font-family: 'Instrument Sans', sans-serif; color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-top: 0.25rem;">This Account is used for the purposes of Donating Mass intension in the United States of America.</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Bank Details Card -->
                    <div class="bank-card">

                        <div class="bank-card__head">
                            <span class="bank-card__chip" aria-hidden="true">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21V10l7-5 7 5v11"/><path d="M9 21v-6h6v6"/></svg>
                            </span>
                            <div>
                                <h3 class="bank-card__title">Bank Account Details</h3>
                                <p class="bank-card__subtitle">Offerings &amp; mission support</p>
                            </div>
                        </div>

                        <div class="bank-card__holder">
                            <span class="bank-card__label">Account Holder Name</span>
                            <span class="bank-card__holder-value">TOR FRANCISCANS OF ST.LOUIS PROVINCE</span>
                        </div>

                        <div class="bank-card__grid">
                            <div class="bank-card__field">
                                <span class="bank-card__label">Bank Name</span>
                                <span class="bank-card__value">
                                    <span>CHASE BANK</span>
                                    <button type="button" class="bank-card__copy" onclick="copyToClipboard('CHASE BANK')" aria-label="Copy bank name">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                    </button>
                                </span>
                            </div>
                            <div class="bank-card__field">
                                <span class="bank-card__label">Account Number</span>
                                <span class="bank-card__value bank-card__value--mono">
                                    <span>726682563</span>
                                    <button type="button" class="bank-card__copy" onclick="copyToClipboard('726682563')" aria-label="Copy account number">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                    </button>
                                </span>
                            </div>
                            <div class="bank-card__field">
                                <span class="bank-card__label">Routing Number</span>
                                <span class="bank-card__value bank-card__value--mono">
                                    <span><em>Direct</em> 111000614</span>
                                    <button type="button" class="bank-card__copy" onclick="copyToClipboard('111000614')" aria-label="Copy direct routing number">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                    </button>
                                </span>
                                <span class="bank-card__value bank-card__value--mono">
                                    <span><em>Wire</em> 021000021</span>
                                    <button type="button" class="bank-card__copy" onclick="copyToClipboard('021000021')" aria-label="Copy wire routing number">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                    </button>
                                </span>
                            </div>
                            <div class="bank-card__field">
                                <span class="bank-card__label">Account Type</span>
                                <span class="bank-card__value">
                                    <span>CHECKING</span>
                                    <button type="button" class="bank-card__copy" onclick="copyToClipboard('CHECKING')" aria-label="Copy account type">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                    </button>
                                </span>
                            </div>
                        </div>

                        <div class="bank-card__branch">
                            <span class="bank-card__label">Branch</span>
                            <span class="bank-card__branch-value">2100 N Davis Drive, Arlington, TX &ndash; 76012</span>
                        </div>

                    </div>
                </div>
                <script>
                    if (typeof copyToClipboard === 'undefined') {
                        function copyToClipboard(text) {
                            navigator.clipboard.writeText(text).then(function() {
                                alert("Copied to clipboard: " + text);
                            }).catch(function(err) {
                                console.error('Could not copy text: ', err);
                            });
                        }
                    }
                </script>
            </div>
            </div>
        </section>
         <!-- 6. Footer (Exact Reference Screenshot Inset Rounded Card with Dark Texture, Links, Socials & Map) -->
        


<?php
get_footer();
