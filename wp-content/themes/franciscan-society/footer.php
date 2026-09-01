<?php
/**
 * The Footer for Franciscan Society Theme
 *
 * @package Franciscan_Society
 */
?>
<footer style="padding: 0 0 2rem 0; background-color: #FAFAFA; color: #ffffff; box-sizing: border-box;">
            <div style="max-width: 1320px; margin: 0 auto; padding: 0 clamp(1rem, 5vw, 3rem);">
                
                <!-- Main Inset Card Container with 32px Rounded Corners & Dark Texture -->
                <div style="position: relative; border-radius: 32px; overflow: hidden; background-color: #0c0b0a; background-image: radial-gradient(rgba(255,255,255,0.06) 1px, transparent 1px); background-size: 18px 18px; padding: 4.5rem 4rem 2.5rem 4rem; box-shadow: 0 25px 60px rgba(0,0,0,0.35);">
                    
                    <!-- 4-Column Main Grid -->
                    <div class="responsive-grid-footer" style="display: grid; gap: 3.5rem; margin-bottom: 3.8rem; align-items: start;">
                        
                        <!-- Column 1: Logo & Contact Information -->
                        <div>
                            <div style="margin-bottom: 2rem;">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="text-decoration: none; display: inline-flex; align-items: center; gap: 0.75rem;">
                                    <img  loading="lazy" decoding="async"src="<?php echo esc_url( FRANCISCAN_THEME_URI . "/assets/images/logo.svg" ); ?>" alt="Franciscan Society Emblem" style="height: 48px; width: auto;" onerror="this.style.display='none'">
                                    <span style="font-family: 'DM Sans', sans-serif; font-weight: 900; font-size: 1.4rem; color: #ffffff; letter-spacing: 0.05em; text-transform: uppercase;">FRANCISCAN<span style="color: #4A2A18;">.</span></span>
                                </a>
                            </div>

                            <?php
                            $footer_phone   = franciscan_get_option( 'contact_phone', '+91 651 234 5678' );
                            $footer_tel_url = 'tel:+' . preg_replace( '/[^0-9]/', '', $footer_phone );
                            $footer_email   = franciscan_get_option( 'contact_email', 'info@franciscansociety.org' );
                            $footer_address = franciscan_get_option( 'address_text', 'TOR Provincialate, P.O. Box 14, Church Road, Ranchi, Jharkhand 834001, India' );
                            ?>
                            <div style="display: flex; flex-direction: column; gap: 1.1rem; font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem; color: #d6d3d1;">
                                <div style="display: flex; align-items: center; gap: 0.8rem;">
                                    <span style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; color: #ffffff; flex-shrink: 0;">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.18 2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.6a16 16 0 0 0 6.29 6.29l.97-.97a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                    </span>
                                    <a href="<?php echo esc_url( $footer_tel_url ); ?>" style="color: #d6d3d1; text-decoration: none;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#d6d3d1'"><?php echo esc_html( $footer_phone ); ?></a>
                                </div>

                                <div style="display: flex; align-items: center; gap: 0.8rem;">
                                    <span style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; color: #ffffff; flex-shrink: 0;">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                    </span>
                                    <a href="mailto:<?php echo esc_attr( $footer_email ); ?>" style="color: #d6d3d1; text-decoration: none;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#d6d3d1'"><?php echo esc_html( $footer_email ); ?></a>
                                </div>

                                <div style="display: flex; align-items: flex-start; gap: 0.8rem; margin-top: 0.3rem;">
                                    <span style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; color: #ffffff; flex-shrink: 0;">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    </span>
                                    <span style="line-height: 1.5; font-size: 0.88rem;"><?php echo esc_html( $footer_address ); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Column 2: Quick Links -->
                        <div>
                            <h4 class="footer-desktop-heading" style="font-family: 'Phudu', sans-serif !important; font-size: 1.15rem !important; font-weight: 600 !important; color: #ffffff !important; text-transform: uppercase; margin-bottom: 1.6rem; letter-spacing: 0.04em;">
                                QUICK LINKS
                            </h4>
                            <button class="footer-accordion-toggle" type="button" aria-expanded="false" aria-controls="footer-quick-links">QUICK LINKS</button>
                            <div class="footer-accordion-body" id="footer-quick-links">
                            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.95rem; font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem;">
                                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #a8a29e; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#a8a29e'">Home</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" style="color: #a8a29e; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#a8a29e'">About Us</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" style="color: #a8a29e; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#a8a29e'">Gallery</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/publications/' ) ); ?>" style="color: #a8a29e; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#a8a29e'">Publications</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" style="color: #a8a29e; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#a8a29e'">News &amp; Events</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>" style="color: #a8a29e; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#a8a29e'">Privacy Policy</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>" style="color: #a8a29e; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#a8a29e'">Terms &amp; Conditions</a></li>
                            </ul>
                            </div>
                        </div>

                        <!-- Column 3: Our Services -->
                        <div>
                            <h4 class="footer-desktop-heading" style="font-family: 'Phudu', sans-serif !important; font-size: 1.15rem !important; font-weight: 600 !important; color: #ffffff !important; text-transform: uppercase; margin-bottom: 1.6rem; letter-spacing: 0.04em;">
                                OUR SERVICES
                            </h4>
                            <button class="footer-accordion-toggle" type="button" aria-expanded="false" aria-controls="footer-services">OUR SERVICES</button>
                            <div class="footer-accordion-body" id="footer-services">
                            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.95rem; font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem;">
                                <li><a href="<?php echo esc_url( home_url( '/ministries-pastoral/' ) ); ?>" style="color: #a8a29e; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#a8a29e'">Pastoral Ministry</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/ministries-formation/' ) ); ?>" style="color: #a8a29e; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#a8a29e'">Formation Ministry</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/ministries-education/' ) ); ?>" style="color: #a8a29e; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#a8a29e'">Education Ministry</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/publications/' ) ); ?>" style="color: #a8a29e; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#a8a29e'">Publications</a></li>
                            </ul>
                            </div>
                        </div>

                        <!-- Column 4: Location Map & Social Media -->
                        <div>
                            <h4 style="font-family: 'Phudu', sans-serif !important; font-size: 1.15rem !important; font-weight: 600 !important; color: #ffffff !important; text-transform: uppercase; margin-bottom: 1.6rem; letter-spacing: 0.04em;">
                                OUR LOCATION
                            </h4>

                            <!-- Embedded Interactive Map -->
                            <div style="border-radius: 14px; overflow: hidden; height: 150px; border: 1px solid rgba(255,255,255,0.12); box-shadow: 0 6px 16px rgba(0,0,0,0.3); margin-bottom: 1.3rem;">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117223.76678229864!2d85.25055530739943!3d23.3432029707174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f4e104aa5db7dd%3A0xd409a380e2270921!2sRanchi%2C%20Jharkhand!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Franciscan Society Ranchi Location Map"></iframe>
                            </div>

                            <!-- Social Media Icons — SVG, white on dark -->
                            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                                <!-- Facebook -->
                                <a rel="noopener noreferrer" href="https://www.facebook.com/profile.php?id=61593681501900" target="_blank" rel="noopener" aria-label="Facebook" class="footer-social-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                                </a>
                                <!-- Instagram -->
                                <a rel="noopener noreferrer" href="https://www.instagram.com/torranchiprovince/" target="_blank" rel="noopener" aria-label="Instagram" class="footer-social-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                                </a>
                                <!-- YouTube -->
                                <a rel="noopener noreferrer" href="https://youtube.com/@tormediaranchi3804?si=UPTCSJUSj9tbcjeB" target="_blank" rel="noopener" aria-label="YouTube" class="footer-social-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/></svg>
                                </a>
                                <!-- WhatsApp -->
                                <a rel="noopener noreferrer" href="https://wa.me/<?php echo esc_attr( franciscan_get_option( 'whatsapp_number', '917012649326' ) ); ?>" target="_blank" rel="noopener" aria-label="WhatsApp" class="footer-social-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.570-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                                </a>
                            </div>
                        </div>

                    </div>

                    <!-- Bottom Divider & Copyright Row -->
                    <div style="border-top: 1px solid rgba(255, 255, 255, 0.08); padding-top: 2rem; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem; font-family: 'Instrument Sans', sans-serif; font-size: 0.88rem; color: #78716c;">
                        <p style="margin: 0;">Copyright &copy; 2026 Franciscan Society, TOR Province of St. Francis, Ranchi. All rights reserved.</p>
                        <div style="display: flex; gap: 1.25rem; align-items: center; justify-content: center; flex-wrap: wrap;">
                            <a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>" style="color: #a8a29e; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#a8a29e'">Privacy Policy</a>
                            <span style="color: rgba(255, 255, 255, 0.2);">|</span>
                            <a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>" style="color: #a8a29e; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#e6c888'" onmouseout="this.style.color='#a8a29e'">Terms &amp; Conditions</a>
                        </div>
                    </div>

                </div>

            </div>
        </footer>

        <!-- Footer Accordion for Mobile (<=768px only) -->
        <script>
        (function () {
            var lastWidth = window.innerWidth;

            function initFooterAccordion() {
                var isMobile = window.innerWidth <= 768;
                
                if (!isMobile) {
                    // Desktop: show bodies and desktop headings, hide toggle buttons
                    document.querySelectorAll('.footer-accordion-body').forEach(function(b) {
                        b.style.display = '';
                        b.classList.remove('is-open');
                    });
                    document.querySelectorAll('.footer-accordion-toggle').forEach(function(t) {
                        t.style.display = 'none';
                        t.classList.remove('is-open');
                        t.setAttribute('aria-expanded', 'false');
                    });
                    document.querySelectorAll('.footer-desktop-heading').forEach(function(h) {
                        h.style.display = '';
                    });
                    return;
                }

                // Mobile mode
                document.querySelectorAll('.footer-desktop-heading').forEach(function(h) {
                    h.style.display = 'none';
                });

                var toggles = document.querySelectorAll('.footer-accordion-toggle');
                toggles.forEach(function(btn) {
                    btn.style.display = 'flex';
                    if (btn._hasAccordionBound) return;
                    btn._hasAccordionBound = true;

                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        var targetId = btn.getAttribute('aria-controls');
                        var targetBody = document.getElementById(targetId);
                        if (!targetBody) return;

                        var isCurrentlyOpen = btn.classList.contains('is-open');

                        // Mutually exclusive: Close all other accordion sections first
                        toggles.forEach(function(otherBtn) {
                            otherBtn.classList.remove('is-open');
                            otherBtn.setAttribute('aria-expanded', 'false');
                            var otherId = otherBtn.getAttribute('aria-controls');
                            var otherBody = document.getElementById(otherId);
                            if (otherBody) {
                                otherBody.classList.remove('is-open');
                            }
                        });

                        // Toggle current section if it was closed
                        if (!isCurrentlyOpen) {
                            btn.classList.add('is-open');
                            btn.setAttribute('aria-expanded', 'true');
                            targetBody.classList.add('is-open');
                        }
                    });
                });
            }

            document.addEventListener('DOMContentLoaded', initFooterAccordion);

            // Guard against mobile scroll URL bar height changes triggering accordion reset
            var resizeTimer;
            window.addEventListener('resize', function () {
                if (window.innerWidth === lastWidth) return;
                lastWidth = window.innerWidth;
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(initFooterAccordion, 150);
            });
        })();
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                VanillaTilt.init(document.querySelectorAll(".mission-tilt"), {
                    max: 8,
                    speed: 600,
                    glare: true,
                    "max-glare": 0.15,
                    scale: 1.02,
                    perspective: 1200
                });
            });
        </script>
        <!-- Magnetic Buttons Interaction -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const magneticElements = document.querySelectorAll('.header-cta-btn, .btn-fill-animation, .btn-fill-outline, .cta-dock__trigger');
                
                magneticElements.forEach(elem => {
                    elem.style.transition = 'transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                    
                    elem.addEventListener('mousemove', (e) => {
                        const rect = elem.getBoundingClientRect();
                        const x = e.clientX - rect.left - rect.width / 2;
                        const y = e.clientY - rect.top - rect.height / 2;
                        
                        elem.style.transform = `translate(${x * 0.3}px, ${y * 0.3}px)`;
                        

                    });

                    elem.addEventListener('mouseleave', () => {
                        elem.style.transform = `translate(0px, 0px)`;

                    });
                });
            });
        </script>
    

    <!-- Hide widgets near footer -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const widgetsContainer = document.getElementById('bottom-widgets-container');
            const footer = document.querySelector('footer');

            if (!widgetsContainer || !footer) return;

            function checkFooterProximity() {
                const footerRect = footer.getBoundingClientRect();
                const windowHeight = window.innerHeight;

                // If footer is within 300px of viewport bottom, hide widgets
                if (footerRect.top < windowHeight - 40) {
        widgetsContainer.style.opacity = '0.2';
        widgetsContainer.style.pointerEvents = 'none';
        widgetsContainer.style.transform = 'translateY(15px) scale(0.95)';
    } else {
        widgetsContainer.style.opacity = '1';
        widgetsContainer.style.pointerEvents = 'auto';
        widgetsContainer.style.transform = 'translateY(0) scale(1)';
    }
            }

            // Check on load and scroll
            checkFooterProximity();
            window.addEventListener('scroll', checkFooterProximity);
            window.addEventListener('resize', checkFooterProximity);
        });
    </script>

    <!-- Bible Dipping Widget -->
    


    <!-- Bible Dipping Widget -->
    
    
<!-- ============================================================
     LIQUID GLASSMORPHIC DOCK & SACRED ILLUMINATED BIBLE ARTWORK
     ============================================================ -->
<style id="fs-liquid-dock-and-bible-styles">
    /* ============================================================
       ELEGANT NAVY & GOLD FLOATING SCRIPTURE & ACTION DOCK
       ============================================================ */
    #bottom-widgets-container {
        position: fixed !important;
        bottom: 18px !important;
        left: 50% !important;
        transform: translateX(-50%) translateY(0) !important;
        width: calc(100% - 60px) !important;
        max-width: 1040px !important;
        height: 74px !important;
        background: #182232 !important;
        border: 1.5px solid #d4af37 !important;
        border-radius: 16px !important;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.6) !important;
        padding: 0 1.5rem !important;
        margin: 0 !important;
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        justify-content: space-between !important;
        z-index: 9999 !important;
        pointer-events: auto !important;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease !important;
        box-sizing: border-box !important;
    }

    #bottom-widgets-container.hidden-near-footer {
        transform: translateX(-50%) translateY(120%) !important;
        opacity: 0 !important;
        pointer-events: none !important;
    }

    .bottom-dock-inner {
        width: 100% !important;
        padding: 0 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        height: 100% !important;
        box-sizing: border-box !important;
    }

    /* Left Section: Daily Bible Verse Trigger */
    .dock-left-group {
        display: flex !important;
        align-items: center !important;
        flex-shrink: 0 !important;
    }

    #bible-widget-btn {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
        background: transparent !important;
        border: none !important;
        padding: 0 !important;
        box-shadow: none !important;
        cursor: pointer !important;
        user-select: none !important;
        height: auto !important;
        transition: transform 0.2s ease !important;
    }
    #bible-widget-btn:hover {
        transform: scale(1.02) !important;
    }

    .dock-bible-circle {
        width: 48px !important;
        height: 48px !important;
        border-radius: 50% !important;
        background: linear-gradient(135deg, #dfba76 0%, #c4994b 100%) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        flex-shrink: 0 !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.35) !important;
    }
    .dock-bible-circle svg {
        width: 26px !important;
        height: 26px !important;
        fill: #1c1917 !important;
    }

    .dock-text-group {
        display: flex !important;
        flex-direction: column !important;
        align-items: flex-start !important;
        line-height: 1.2 !important;
    }
    .dock-main-label {
        font-family: 'Instrument Sans', sans-serif !important;
        font-size: 0.95rem !important;
        font-weight: 800 !important;
        color: #ffffff !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
        white-space: nowrap !important;
    }
    .dock-sub-label {
        font-family: 'Instrument Sans', sans-serif !important;
        font-size: 0.78rem !important;
        font-weight: 600 !important;
        color: #dfba76 !important;
        white-space: nowrap !important;
        margin-top: 3px !important;
    }

    /* Center Vertical Divider */
    .dock-vertical-divider {
        width: 1.5px !important;
        height: 36px !important;
        background: rgba(255, 255, 255, 0.22) !important;
        margin: 0 1.8rem !important;
        flex-shrink: 0 !important;
    }

    /* Center Live Scripture Quote */
    .dock-scripture-quote {
        display: flex !important;
        align-items: center !important;
        flex: 1 !important;
        min-width: 0 !important;
        margin-right: 1.5rem !important;
    }
    .dock-quote-mark {
        color: #dfba76 !important;
        font-size: 2.2rem !important;
        font-family: Georgia, serif !important;
        line-height: 0.8 !important;
        margin-right: 10px !important;
        flex-shrink: 0 !important;
        font-weight: 900 !important;
    }
    .dock-quote-text-wrap {
        display: flex !important;
        flex-direction: column !important;
        overflow: hidden !important;
    }
    .dock-quote-content {
        font-family: 'Instrument Sans', sans-serif !important;
        font-size: 0.84rem !important;
        color: #f1f5f9 !important;
        line-height: 1.35 !important;
        font-weight: 500 !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
    }
    .dock-quote-reference {
        font-family: 'Instrument Sans', sans-serif !important;
        font-size: 0.78rem !important;
        color: #dfba76 !important;
        font-weight: 700 !important;
        margin-top: 2px !important;
    }

    /* Right Action Buttons in Dock */
    #prayer-chat-menu {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
        flex-shrink: 0 !important;
    }
    .chat-icon {
        width: 44px !important;
        height: 44px !important;
        border-radius: 50% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.3) !important;
        transition: transform 0.25s ease, box-shadow 0.25s ease !important;
        text-decoration: none !important;
        flex-shrink: 0 !important;
    }
    .chat-icon:hover {
        transform: translateY(-2px) scale(1.08) !important;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.45) !important;
    }
    .whatsapp-icon {
        background: #25D366 !important;
        color: #ffffff !important;
        box-shadow: 0 4px 14px rgba(37, 211, 102, 0.35) !important;
    }
    .email-icon {
        background: #b91c1c !important;
        color: #ffffff !important;
        box-shadow: 0 4px 14px rgba(185, 28, 28, 0.35) !important;
    }

    @media (max-width: 900px) {
        .dock-scripture-quote,
        .dock-vertical-divider {
            display: none !important;
        }
        #bottom-widgets-container {
            max-width: 420px !important;
            width: calc(100% - 32px) !important;
            height: 64px !important;
            padding: 0 1rem !important;
        }
        .dock-bible-circle {
            width: 40px !important;
            height: 40px !important;
        }
        .dock-bible-circle svg {
            width: 22px !important;
            height: 22px !important;
        }
        .dock-main-label {
            font-size: 0.82rem !important;
        }
        .chat-icon {
            width: 38px !important;
            height: 38px !important;
        }
    }
</style>

<!-- Universal Liquid Glassmorphic Bottom Floating Bar -->
<!-- Universal Navy & Gold Bottom Floating Bar -->
<div id="bottom-widgets-container">
    <div class="bottom-dock-inner">
        
        <!-- Left Trigger Group -->
        <div class="dock-left-group">
            <div id="bible-widget-btn" role="button" tabindex="0" onclick="window.fsOpenBibleModal(event)" title="Click to Read Daily Scripture">
                <div class="dock-bible-circle">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4.5C10.3 3.5 8.2 3 6 3c-2.2 0-4.3.5-6 1.5v14c1.7-1 3.8-1.5 6-1.5s4.3.5 6 1.5c1.7-1 3.8-1.5 6-1.5s4.3.5 6 1.5v-14c-1.7-1-3.8-1.5-6-1.5s-4.3.5-6 1.5zm-1 12c-1.5-.6-3.2-.9-5-.9-1.5 0-2.9.2-4 .6V5.7c1.1-.4 2.5-.7 4-.7 1.8 0 3.5.3 5 .9v10.6zm11 0c-1.1-.4-2.5-.6-4-.6-1.8 0-3.5.3-5 .9V5.9c1.5-.6 3.2-.9 5-.9 1.5 0 2.9.3 4 .7v10.8z"/></svg>
                </div>
                <div class="dock-text-group">
                    <span class="dock-main-label">DAILY BIBLE VERSE</span>
                    <span class="dock-sub-label">Click for Reflection</span>
                </div>
            </div>
            
            <div class="dock-vertical-divider"></div>
        </div>

        <!-- Center Live Scripture Quote -->
        <div class="dock-scripture-quote" onclick="window.fsOpenBibleModal(event)" style="cursor:pointer;" title="Click for Reflection">
            <div class="dock-quote-mark">&ldquo;&ldquo;</div>
            <div class="dock-quote-text-wrap">
                <span class="dock-quote-content">&ldquo;This is the day the Lord has made; let us rejoice and be glad in it.&rdquo;</span>
                <span class="dock-quote-reference">&ndash; Psalm 118:24</span>
            </div>
        </div>

        <!-- Right Action Buttons -->
        <div id="prayer-chat-menu">
            <a rel="noopener noreferrer" href="https://wa.me/<?php echo esc_attr( franciscan_get_option( 'whatsapp_number', '917012649326' ) ); ?>" target="_blank" title="Chat on WhatsApp" class="chat-icon whatsapp-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 21.46c-1.6 0-3.15-.43-4.5-1.25L3 21l.8-4.3c-.9-1.4-1.37-3.05-1.37-4.73C2.43 6.47 6.74 2.16 12.21 2.16c2.66 0 5.16 1.04 7.03 2.92a9.92 9.92 0 0 1 2.93 7.04c0 5.48-4.31 9.34-10.14 9.34zm-4.76-2.58l.28.17c1.3.77 2.82 1.18 4.38 1.18 4.88 0 8.85-3.23 8.85-8.1 0-2.17-.85-4.2-2.38-5.74a7.86 7.86 0 0 0-5.63-2.33c-4.94 0-8.96 4-8.96 8.94 0 1.63.43 3.2 1.25 4.54l.2.32-.47 2.53 2.58-.5z"/><path d="M17.43 14.36c-.3-.15-1.78-.88-2.05-.98-.28-.1-.47-.15-.68.15-.2.3-.77.98-.95 1.18-.17.2-.35.23-.65.08-.3-.15-1.27-.47-2.42-1.5-.9-.8-1.5-1.79-1.68-2.1-.18-.3-.02-.45.13-.6.13-.13.3-.35.45-.53.15-.17.2-.3.3-.5.1-.2.05-.38-.03-.53-.08-.15-.68-1.63-.93-2.23-.24-.59-.48-.5-.68-.52h-.58c-.2 0-.53.08-.8.38-.28.3-1.05 1.03-1.05 2.5 0 1.5 1.08 2.93 1.23 3.13.15.2 2.13 3.25 5.15 4.55 2.05.88 2.58.93 3.4.78.85-.15 1.78-.73 2.03-1.43.25-.7.25-1.3.18-1.43-.08-.13-.28-.2-.58-.35z"/></svg>
            </a>
            
            <a href="mailto:<?php echo esc_attr( franciscan_get_option( 'contact_email', 'info@franciscansociety.org' ) ); ?>" title="Send Email" class="chat-icon email-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            </a>
        </div>

    </div>
</div>
<!-- Fullscreen Sacred Illuminated Bible Page Modal -->
<div id="bible-modal" onclick="window.fsHandleModalClick(event)">
    <button id="bible-modal-close" onclick="window.fsCloseBibleModal(event)" aria-label="Close Scripture Modal">&times;</button>
    <audio id="bible-audio" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/audio/bible-music.mp3' ); ?>" preload="auto"></audio>

    <!-- 3D Book Flip Animation -->
    <div id="bible-flip-container" onclick="window.fsRevealQuote(event)">
        <div class="bible-book">
            <div class="bible-page-anim"></div>
            <div class="bible-page-anim"></div>
            <div class="bible-page-anim"></div>
            <div class="bible-page-anim"></div>
            <div class="bible-page-anim"></div>
            <div class="bible-page-anim"></div>
        </div>
        <div id="bible-flip-hint">Click pages to reveal scripture</div>
    </div>

    <!-- Sacred Illuminated Parchment Box with Vine Watermarks -->
    <div id="bible-reveal-container" onclick="event.stopPropagation()">
        <!-- 4 Corner Vine Watermarks -->
        <div class="bible-vine-watermark vine-top-left"></div>
        <div class="bible-vine-watermark vine-top-right"></div>
        <div class="bible-vine-watermark vine-bottom-left"></div>
        <div class="bible-vine-watermark vine-bottom-right"></div>

        <!-- Sacred Content with Clean HTML Star Entities -->
        <div class="bible-eyebrow-sacred">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="#dfba76" style="vertical-align:middle;"><polygon points="12,2 15,9 22,12 15,15 12,22 9,15 2,12 9,9"/></svg>
            <span>SACRED SCRIPTURE REFLECTION</span>
            <svg width="13" height="13" viewBox="0 0 24 24" fill="#dfba76" style="vertical-align:middle;"><polygon points="12,2 15,9 22,12 15,15 12,22 9,15 2,12 9,9"/></svg>
        </div>
        
        <div class="bible-quote-text" id="bible-quote-text">&ldquo;...&rdquo;</div>
        
        <div class="bible-quote-ref" id="bible-quote-ref">&mdash; ...</div>
    </div>
</div>

<script>
(function() {
    // 12 Sacred Scripture Quotations
    const quotes = [
        { text: "For God so loved the world that He gave His one and only Son, that whoever believes in Him shall not perish but have eternal life.", ref: "John 3:16" },
        { text: "Trust in the Lord with all your heart and lean not on your own understanding; in all your ways submit to Him, and He will make your paths straight.", ref: "Proverbs 3:5-6" },
        { text: "I can do all this through Him who gives me strength.", ref: "Philippians 4:13" },
        { text: "The Lord is my shepherd, I lack nothing. He makes me lie down in green pastures, He leads me beside quiet waters.", ref: "Psalm 23:1-2" },
        { text: "Be strong and courageous. Do not be afraid; do not be discouraged, for the Lord your God will be with you wherever you go.", ref: "Joshua 1:9" },
        { text: "For I know the plans I have for you, declares the Lord, plans to prosper you and not to harm you, plans to give you hope and a future.", ref: "Jeremiah 29:11" },
        { text: "The fruit of the Spirit is love, joy, peace, forbearance, kindness, goodness, faithfulness, gentleness and self-control.", ref: "Galatians 5:22-23" },
        { text: "And we know that in all things God works for the good of those who love Him, who have been called according to His purpose.", ref: "Romans 8:28" },
        { text: "Come to me, all you who are weary and burdened, and I will give you rest.", ref: "Matthew 11:28" },
        { text: "Therefore do not worry about tomorrow, for tomorrow will worry about itself. Each day has enough trouble of its own.", ref: "Matthew 6:34" },
        { text: "Let all that you do be done in love.", ref: "1 Corinthians 16:14" },
        { text: "The Lord is close to the brokenhearted and saves those who are crushed in spirit.", ref: "Psalm 34:18" }
    ];

    window.fsOpenBibleModal = function(e) {
        if (e) { e.preventDefault(); e.stopPropagation(); }
        const modal = document.getElementById('bible-modal');
        const flip = document.getElementById('bible-flip-container');
        const reveal = document.getElementById('bible-reveal-container');
        const audio = document.getElementById('bible-audio');
        if (!modal) return;

        if (flip) { flip.classList.add('active'); flip.style.display = 'block'; }
        if (reveal) { reveal.classList.remove('active'); reveal.style.display = 'none'; }
        if (audio) { audio.pause(); audio.currentTime = 0; }

        modal.classList.add('active');
        modal.style.display = 'flex';
        modal.style.opacity = '1';
        modal.style.pointerEvents = 'auto';
        document.body.style.overflow = 'hidden';
    };

    window.fsCloseBibleModal = function(e) {
        if (e) { e.preventDefault(); e.stopPropagation(); }
        const modal = document.getElementById('bible-modal');
        const flip = document.getElementById('bible-flip-container');
        const reveal = document.getElementById('bible-reveal-container');
        const audio = document.getElementById('bible-audio');

        if (modal) {
            modal.classList.remove('active');
            modal.style.opacity = '0';
            modal.style.pointerEvents = 'none';
        }
        document.body.style.overflow = '';

        setTimeout(function() {
            if (modal) modal.style.display = 'none';
            if (flip) { flip.classList.remove('active'); flip.style.display = 'none'; }
            if (reveal) { reveal.classList.remove('active'); reveal.style.display = 'none'; }
            if (audio) { audio.pause(); audio.currentTime = 0; }
        }, 350);
    };

    window.fsRevealQuote = function(e) {
        if (e) { e.stopPropagation(); }
        const flip = document.getElementById('bible-flip-container');
        const reveal = document.getElementById('bible-reveal-container');
        const text = document.getElementById('bible-quote-text');
        const ref = document.getElementById('bible-quote-ref');
        const audio = document.getElementById('bible-audio');

        if (flip) { flip.classList.remove('active'); flip.style.display = 'none'; }

        const q = quotes[Math.floor(Math.random() * quotes.length)];
        if (text) text.innerHTML = '&ldquo;' + q.text + '&rdquo;';
        if (ref) ref.innerHTML = '&mdash; ' + q.ref;

        if (reveal) { reveal.classList.add('active'); reveal.style.display = 'block'; }
        if (audio) { audio.play().catch(function(err) { console.log('Audio note:', err); }); }
    };

    // Handle clicking on modal: click INSIDE pages reveals quote; click OUTSIDE closes modal
    window.fsHandleModalClick = function(e) {
        if (e.target.closest('#bible-modal-close')) {
            window.fsCloseBibleModal(e);
            return;
        }
        if (e.target.closest('#bible-reveal-container')) {
            return;
        }
        if (e.target.closest('#bible-flip-container')) {
            window.fsRevealQuote(e);
            return;
        }
        // Clicking outside on the dark backdrop closes modal
        window.fsCloseBibleModal(e);
    };

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') window.fsCloseBibleModal();
    });

    // Auto-hide bottom bar in Hero section (top of page) AND near footer
    function updateDockVisibility() {
        const dock = document.getElementById('bottom-widgets-container');
        const footer = document.querySelector('footer');
        if (!dock) return;

        const currentScrollY = window.scrollY || window.pageYOffset;
        const heroThreshold = Math.min(window.innerHeight * 0.75, 550);

        let shouldHide = false;
        if (currentScrollY < heroThreshold) {
            shouldHide = true;
        }
        if (footer) {
            const footerRect = footer.getBoundingClientRect();
            if (footerRect.top < window.innerHeight - 15) {
                shouldHide = true;
            }
        }

        if (shouldHide) {
            dock.classList.add('hidden-near-footer');
        } else {
            dock.classList.remove('hidden-near-footer');
        }
    }

    window.addEventListener('scroll', updateDockVisibility, { passive: true });
    window.addEventListener('resize', updateDockVisibility, { passive: true });
    document.addEventListener('DOMContentLoaded', updateDockVisibility);
})();
</script>
</div><!-- #site-wrapper -->
<?php wp_footer(); ?>
</body>
</html>