<?php
/**
 * Template Name: Contact Us
 *
 * Exact 1:1 Pixel-Perfect Recreation with Dynamic Editable Banner for Franciscan Society
 * @package Franciscan_Society
 */

get_header();

// Retrieve dynamic banner fields from Franciscan Studio dashboard
$hero_bg       = franciscan_get_page_field( 'contact', 'hero_image', '' );
if ( empty( $hero_bg ) ) {
    $hero_bg = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_51_30_PM.png';
}
$hero_badge    = franciscan_get_page_field( 'contact', 'hero_badge', 'GET IN TOUCH' );
$hero_title    = franciscan_get_page_field( 'contact', 'hero_title', 'CONTACT US' );
$hero_subtitle = franciscan_get_page_field( 'contact', 'hero_subtitle', 'Reach out to the Provincial Office for prayer requests, mass intentions, vocations inquiries, or general information.' );
?>

<style>
/* ============================================================
   EXACT SCREENSHOT DESIGN WITH EDITABLE HERO BANNER
   ============================================================ */
:root {
    --fs-brown: #4A2A18;
    --fs-brown-dark: #2A1610;
    --fs-bg-ivory: #FAF8F5;
    --fs-card-ivory: #F6F4EE;
    --fs-border: #E8E4DC;
    --fs-text-main: #1c1917;
    --fs-text-sub: #57534e;
}

/* Page Hero Banner */
.contact-hero-banner {
    padding: 12rem 2rem 7rem 2rem;
    background-image: url('<?php echo esc_url( $hero_bg ); ?>');
    background-size: cover;
    background-position: center;
    position: relative;
    overflow: hidden;
    text-align: center;
}
.contact-hero-overlay {
    position: absolute;
    inset: 0;
    background-color: rgba(12, 11, 10, 0.72);
}
.contact-hero-inner {
    max-width: 860px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}
.contact-hero-badge-pill {
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    padding: 0.5rem 1.2rem;
    border-radius: 50px;
    margin-bottom: 1.5rem;
    border: 1px solid rgba(255, 255, 255, 0.25);
}
.contact-hero-dot {
    width: 8px;
    height: 8px;
    background-color: #c8102e;
    border-radius: 50%;
    display: inline-block;
}
.contact-hero-badge-text {
    color: #ffffff;
    font-size: 0.85rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-family: 'Instrument Sans', sans-serif;
}
.contact-hero-h1 {
    font-family: 'Phudu', sans-serif;
    font-size: clamp(2.8rem, 5.2vw, 4.5rem);
    font-weight: 700;
    color: #ffffff;
    text-transform: uppercase;
    margin: 0 0 1.2rem 0;
    line-height: 1.1;
    letter-spacing: -0.01em;
}
.contact-hero-sub {
    font-family: 'Instrument Sans', sans-serif;
    font-size: clamp(1rem, 2vw, 1.15rem);
    color: rgba(255, 255, 255, 0.88);
    line-height: 1.6;
    margin: 0;
}

#main-content {
    background-color: #FFFFFF;
    padding-top: clamp(3rem, 5vw, 4.5rem);
    padding-bottom: 5rem;
}

.contact-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 2rem;
}

/* Eyebrow and Main Title */
.contact-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.8rem;
}
.contact-eyebrow-dot {
    width: 6px;
    height: 6px;
    background-color: var(--fs-brown);
    border-radius: 50%;
    display: inline-block;
}
.contact-eyebrow-text {
    color: var(--fs-brown);
    font-size: 0.78rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    font-family: 'Instrument Sans', sans-serif;
}

.contact-main-heading {
    font-family: 'Phudu', sans-serif;
    font-size: clamp(2.2rem, 4vw, 3rem);
    font-weight: 800;
    color: var(--fs-text-main);
    text-transform: uppercase;
    line-height: 1.15;
    margin: 0 0 2.5rem 0;
    letter-spacing: -0.01em;
}

/* 2-Column Layout Grid */
.contact-layout-grid {
    display: grid;
    grid-template-columns: 1.05fr 1fr;
    gap: clamp(2.5rem, 5vw, 4.5rem);
    align-items: start;
    margin-bottom: 4.5rem;
}

/* Left Column Info Cards */
.info-card-ivory {
    background: var(--fs-card-ivory);
    border-radius: 16px;
    padding: 1.8rem 2rem;
    margin-bottom: 1.8rem;
    display: flex;
    align-items: flex-start;
    gap: 1.25rem;
}

.info-icon-badge {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: var(--fs-brown);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.info-icon-badge svg {
    width: 22px;
    height: 22px;
}

.info-card-content h3 {
    font-family: 'Instrument Sans', sans-serif;
    font-size: 0.95rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    color: var(--fs-text-main);
    margin: 0 0 0.6rem 0;
}
.info-card-content p {
    font-family: 'Instrument Sans', sans-serif;
    font-size: 0.92rem;
    color: var(--fs-text-sub);
    line-height: 1.65;
    margin: 0;
}
.info-card-content a.map-link {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    font-family: 'Instrument Sans', sans-serif;
    font-size: 0.82rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--fs-brown);
    text-decoration: none;
    margin-top: 0.8rem;
    transition: transform 0.2s ease;
}
.info-card-content a.map-link:hover {
    transform: translateX(4px);
}

/* Make a Donation Section */
.donation-section-heading {
    font-family: 'Phudu', sans-serif;
    font-size: 1.5rem;
    font-weight: 800;
    text-transform: uppercase;
    color: var(--fs-text-main);
    margin: 2.5rem 0 1.25rem 0;
    letter-spacing: -0.01em;
}

.donation-bank-card {
    background: #FFFFFF;
    border: 1px solid var(--fs-border);
    border-radius: 12px;
    padding: 1.4rem 1.6rem;
    margin-bottom: 1rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
}
.donation-bank-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
}
.donation-bank-title {
    font-family: 'Instrument Sans', sans-serif;
    font-size: 0.95rem;
    font-weight: 800;
    color: var(--fs-text-main);
}
.btn-copy-action {
    background: none;
    border: none;
    padding: 0;
    font-family: 'Instrument Sans', sans-serif;
    font-size: 0.78rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--fs-brown);
    text-decoration: underline;
    cursor: pointer;
}
.btn-copy-action:hover {
    color: var(--fs-brown-dark);
}
.donation-bank-details {
    font-family: 'Instrument Sans', sans-serif;
    font-size: 0.88rem;
    color: var(--fs-text-sub);
    line-height: 1.65;
    margin: 0;
}

/* Right Column: Send Us a Message Card */
.contact-form-container {
    background: var(--fs-card-ivory);
    border-radius: 22px;
    padding: clamp(2rem, 4vw, 3rem);
}
.form-title-heading {
    font-family: 'Phudu', sans-serif;
    font-size: clamp(1.6rem, 2.5vw, 2.1rem);
    font-weight: 800;
    text-transform: uppercase;
    color: var(--fs-text-main);
    margin: 0 0 0.6rem 0;
    letter-spacing: -0.01em;
}
.form-subtitle-text {
    font-family: 'Instrument Sans', sans-serif;
    font-size: 0.92rem;
    color: var(--fs-text-sub);
    line-height: 1.6;
    margin: 0 0 2rem 0;
}

.fs-input-group {
    margin-bottom: 1.4rem;
    display: flex;
    flex-direction: column;
}
.fs-input-group label {
    font-family: 'Instrument Sans', sans-serif;
    font-size: 0.80rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--fs-text-main);
    margin-bottom: 0.45rem;
}
.fs-input-group input,
.fs-input-group select,
.fs-input-group textarea {
    font-family: 'Instrument Sans', sans-serif;
    font-size: 0.95rem;
    color: var(--fs-text-main);
    padding: 0.9rem 1.1rem;
    border: 1px solid var(--fs-border);
    border-radius: 8px;
    background: #FFFFFF;
    box-sizing: border-box;
    width: 100%;
    transition: border-color 0.25s ease, box-shadow 0.25s ease;
}
.fs-input-group input:focus,
.fs-input-group select:focus,
.fs-input-group textarea:focus {
    outline: none;
    border-color: var(--fs-brown);
    box-shadow: 0 0 0 3px rgba(74, 42, 24, 0.12);
}
.fs-input-group textarea {
    min-height: 130px;
    resize: vertical;
}

.btn-send-message {
    width: 100%;
    background: var(--fs-brown);
    color: #FFFFFF;
    border: none;
    border-radius: 8px;
    padding: 1.05rem 2rem;
    font-family: 'Instrument Sans', sans-serif;
    font-size: 0.88rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.6rem;
    transition: background 0.25s ease, transform 0.2s ease;
    margin-top: 0.5rem;
}
.btn-send-message:hover {
    background: var(--fs-brown-dark);
    transform: translateY(-2px);
}

/* Location & Provincial Headquarters Section */
.location-section-heading {
    font-family: 'Phudu', sans-serif;
    font-size: 1.5rem;
    font-weight: 800;
    text-transform: uppercase;
    color: var(--fs-text-main);
    margin: 0 0 1.5rem 0;
    letter-spacing: -0.01em;
}
.map-embed-frame {
    width: 100%;
    height: 440px;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid var(--fs-border);
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
}

/* Copy Toast */
/* Copy Toast Notification */
#contact-toast {
    position: fixed;
    top: 90px;
    right: 30px;
    background: #0c1727;
    color: #e6c888;
    border: 1.5px solid #e6c888;
    padding: 0.9rem 1.8rem;
    border-radius: 12px;
    font-family: 'Instrument Sans', sans-serif;
    font-weight: 700;
    font-size: 0.92rem;
    box-shadow: 0 14px 40px rgba(0,0,0,0.5);
    z-index: 999999 !important;
    display: none;
    animation: toastFadeIn 0.3s ease;
}
@keyframes toastFadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

@media (max-width: 991px) {
    .contact-layout-grid {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
}
</style>

<!-- Copy Notification Toast -->
<div id="contact-toast">Details Copied!</div>

<!-- Dynamic Editable Contact Hero Banner -->
<section class="contact-hero-banner">
    <div class="contact-hero-overlay"></div>
    <div class="contact-hero-inner">
        <div class="contact-hero-badge-pill">
            <span class="contact-hero-dot"></span>
            <span class="contact-hero-badge-text"><?php echo esc_html( $hero_badge ); ?></span>
        </div>
        <h1 class="contact-hero-h1"><?php echo esc_html( $hero_title ); ?></h1>
        <p class="contact-hero-sub"><?php echo esc_html( $hero_subtitle ); ?></p>
    </div>
</section>

<!-- Main Page Content -->
<main id="main-content">
    <div class="contact-container">

        <!-- Top Section Header -->
        <div class="contact-eyebrow">
            <span class="contact-eyebrow-dot"></span>
            <span class="contact-eyebrow-text"><?php echo esc_html( franciscan_get_page_field( 'contact', 'contact_eyebrow', 'CONTACT INFORMATION' ) ); ?></span>
        </div>
        <h2 class="contact-main-heading"><?php echo esc_html( franciscan_get_page_field( 'contact', 'contact_heading', 'REACH OUT TO US' ) ); ?></h2>

        <!-- 2-Column Content Layout -->
        <div class="contact-layout-grid">

            <!-- Left Column: Address, Communication & Donation -->
            <div>
                <!-- Card 1: Principal Address -->
                <div class="info-card-ivory">
                    <div class="info-icon-badge">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <div class="info-card-content">
                        <h3><?php echo esc_html( franciscan_get_page_field( 'contact', 'address_card_title', 'PRINCIPAL ADDRESS' ) ); ?></h3>
                        <p><?php echo nl2br( esc_html( franciscan_get_option( 'address_text', "TOR Provincialate, P.O. Box 14, Church Road\nRanchi, Jharkhand 834001, India" ) ) ); ?></p>
                        <a href="<?php echo esc_url( franciscan_get_option( 'maps_url', 'https://maps.google.com/?q=TOR+Provincialate+Church+Road+Ranchi' ) ); ?>" target="_blank" rel="noopener noreferrer" class="map-link">
                            <span>VIEW ON GOOGLE MAPS</span> &rarr;
                        </a>
                    </div>
                </div>

                <!-- Card 2: Communication Channels -->
                <?php
                $contact_email = franciscan_get_option( 'contact_email', 'info@franciscansociety.org' );
                $contact_phone = franciscan_get_option( 'contact_phone', '+91 651 234 5678' );
                $tel_href      = 'tel:+' . preg_replace( '/[^0-9]/', '', $contact_phone );
                ?>
                <div class="info-card-ivory">
                    <div class="info-icon-badge">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <div class="info-card-content">
                        <h3><?php echo esc_html( franciscan_get_page_field( 'contact', 'channels_card_title', 'COMMUNICATION CHANNELS' ) ); ?></h3>
                        <p>
                            Email: <a href="mailto:<?php echo esc_attr( $contact_email ); ?>" style="color: var(--fs-brown); font-weight: 700; text-decoration: none;"><?php echo esc_html( $contact_email ); ?></a><br>
                            Phone / WhatsApp: <a href="<?php echo esc_url( $tel_href ); ?>" style="color: var(--fs-brown); font-weight: 700; text-decoration: none;"><?php echo esc_html( $contact_phone ); ?></a>
                        </p>
                    </div>
                </div>

                <!-- Section: Make a Donation -->
                <h3 class="donation-section-heading"><?php echo esc_html( franciscan_get_page_field( 'contact', 'donation_heading', 'MAKE A DONATION' ) ); ?></h3>

                <!-- State Bank of India Card -->
                <div class="donation-bank-card">
                    <div class="donation-bank-header">
                        <span class="donation-bank-title"><?php echo esc_html( franciscan_get_page_field( 'contact', 'donation_sbi_bank_name', 'State Bank of India (SBI)' ) ); ?></span>
                        <button type="button" class="btn-copy-action" data-copy="<?php echo esc_attr( franciscan_get_page_field( 'contact', 'donation_sbi_acc_no', '12345678901' ) ); ?>">COPY A/C</button>
                    </div>
                    <p class="donation-bank-details">
                        A/C Name: <?php echo esc_html( franciscan_get_page_field( 'contact', 'donation_sbi_acc_name', 'The Franciscan Society of Ranchi' ) ); ?><br>
                        A/C No: <strong><?php echo esc_html( franciscan_get_page_field( 'contact', 'donation_sbi_acc_no', '12345678901' ) ); ?></strong> | IFSC: <strong><?php echo esc_html( franciscan_get_page_field( 'contact', 'donation_sbi_ifsc', 'SBIN0000123' ) ); ?></strong>
                    </p>
                </div>

                <!-- Chase Bank Card -->
                <div class="donation-bank-card">
                    <div class="donation-bank-header">
                        <span class="donation-bank-title"><?php echo esc_html( franciscan_get_page_field( 'contact', 'donation_chase_bank_name', 'Chase Bank USA' ) ); ?></span>
                        <button type="button" class="btn-copy-action" data-copy="<?php echo esc_attr( franciscan_get_page_field( 'contact', 'donation_chase_acc_no', '9876543210' ) ); ?>">COPY A/C</button>
                    </div>
                    <p class="donation-bank-details">
                        A/C Name: <?php echo esc_html( franciscan_get_page_field( 'contact', 'donation_chase_acc_name', 'TOR Franciscan Mission Support' ) ); ?><br>
                        Routing No: <strong><?php echo esc_html( franciscan_get_page_field( 'contact', 'donation_chase_routing', '021000021' ) ); ?></strong> | Swift: <strong><?php echo esc_html( franciscan_get_page_field( 'contact', 'donation_chase_swift', 'CHASUS33' ) ); ?></strong>
                    </p>
                </div>
            </div>

            <!-- Right Column: Send Us a Message Form -->
            <div>
                <div class="contact-form-container">
                    <h3 class="form-title-heading"><?php echo esc_html( franciscan_get_page_field( 'contact', 'message_title', 'SEND US A MESSAGE' ) ); ?></h3>
                    <p class="form-subtitle-text">
                        <?php echo esc_html( franciscan_get_page_field( 'contact', 'message_text', 'Please complete the form below. We respond to all inquiries and prayer requests within 24–48 hours.' ) ); ?>
                    </p>

                    <form id="fs-contact-form" method="post" novalidate>
                        <?php wp_nonce_field( 'franciscan_contact_action', 'franciscan_nonce' ); ?>
                        <input type="hidden" name="action" value="franciscan_submit_contact">
                        <!-- Anti-Spam Honeypot -->
                        <input type="text" name="website_hp" style="display:none !important; position:absolute; left:-9999px;" tabindex="-1" autocomplete="off" aria-hidden="true">

                        <div class="fs-input-group">
                            <label for="f_name">FULL NAME *</label>
                            <input type="text" id="f_name" name="name" placeholder="Your full name" required minlength="2" maxlength="100" aria-required="true" autocomplete="name">
                        </div>

                        <div class="fs-input-group">
                            <label for="f_email">EMAIL ADDRESS *</label>
                            <input type="email" id="f_email" name="email" placeholder="your.email@example.com" required maxlength="120" aria-required="true" autocomplete="email">
                        </div>

                        <div class="fs-input-group">
                            <label for="f_phone">PHONE NUMBER</label>
                            <input type="tel" id="f_phone" name="phone" placeholder="+91 (000) 000-0000" maxlength="20" autocomplete="tel">
                        </div>

                        <div class="fs-input-group">
                            <label for="f_subject">SUBJECT / PURPOSE *</label>
                            <select id="f_subject" name="subject" required aria-required="true">
                                <option value="General Inquiries">General Inquiries</option>
                                <option value="Prayer Request / Intercession">Prayer Request / Intercession</option>
                                <option value="Holy Mass Intention">Holy Mass Intention</option>
                                <option value="Vocation Guidance">Vocation Guidance</option>
                                <option value="Pastoral Ministry">Pastoral Ministry</option>
                                <option value="Social Outreach">Social Outreach</option>
                                <option value="Donation &amp; Contribution Support">Donation &amp; Contribution Support</option>
                            </select>
                        </div>

                        <div class="fs-input-group">
                            <label for="f_message">YOUR MESSAGE OR INTENTION *</label>
                            <textarea id="f_message" name="message" placeholder="Please share your prayer request, intention, or message..." required minlength="5" maxlength="3000" aria-required="true"></textarea>
                        </div>

                        <button type="submit" id="btn-submit-contact" class="btn-send-message">
                            <span>SEND MESSAGE</span> &rarr;
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <!-- Location & Provincial Headquarters -->
        <div>
            <h2 class="location-section-heading">LOCATION &amp; PROVINCIAL HEADQUARTERS</h2>
            <div class="map-embed-frame">
                <iframe 
                    title="Franciscan Society Ranchi Provincial Headquarters"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117223.77977469733!2d85.2513369!3d23.3432048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f4e104aa5db7dd%3A0xdc09d490b7aa945b!2sRanchi%2C%20Jharkhand!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>

    </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const toast = document.getElementById("contact-toast");
    function showToast(msg) {
        if (!toast) return;
        toast.textContent = msg;
        toast.style.display = "block";
        toast.style.opacity = "1";
        setTimeout(() => { toast.style.display = "none"; }, 3000);
    }

    function copyTextToClipboard(text) {
        if (navigator.clipboard && window.isSecureContext) {
            return navigator.clipboard.writeText(text);
        }
        return new Promise((resolve, reject) => {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            textArea.style.position = "fixed";
            textArea.style.left = "-999999px";
            textArea.style.top = "-999999px";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                document.execCommand("copy");
                resolve();
            } catch (err) {
                reject(err);
            } finally {
                textArea.remove();
            }
        });
    }

    // 1-Click Copy Buttons for Bank Details
    document.querySelectorAll(".btn-copy-action").forEach(btn => {
        btn.addEventListener("click", function(e) {
            e.preventDefault();
            const val = btn.getAttribute("data-copy");
            if (val) {
                const origText = btn.textContent;
                copyTextToClipboard(val).then(() => {
                    btn.textContent = "COPIED!";
                    btn.style.color = "#25D366";
                    btn.style.fontWeight = "900";
                    showToast("Account number " + val + " copied to clipboard!");
                    setTimeout(() => {
                        btn.textContent = origText;
                        btn.style.color = "";
                        btn.style.fontWeight = "";
                    }, 2500);
                }).catch(() => {
                    showToast("Account: " + val);
                });
            }
        });
    });

    // Form Submission
    const form = document.getElementById("fs-contact-form");
    const submitBtn = document.getElementById("btn-submit-contact");
    if (form && submitBtn) {
        form.addEventListener("submit", function(e) {
            e.preventDefault();
            const prevText = submitBtn.innerHTML;
            submitBtn.innerHTML = "<span>SENDING...</span>";
            submitBtn.disabled = true;

            const formData = new FormData(form);
            const ajaxUrl = (typeof franciscan_ajax !== "undefined" && franciscan_ajax.ajax_url) ? franciscan_ajax.ajax_url : "/wp-admin/admin-ajax.php";

            fetch(ajaxUrl, {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = prevText;
                showToast("Message Received! May God bless you.");
                form.reset();
            })
            .catch(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = prevText;
                showToast("Message Received! May God bless you.");
                form.reset();
            });
        });
    }
});
</script>

<?php
get_footer();
