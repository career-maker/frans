<?php
/**
 * Franciscan Society Theme Options & Page Content Manager
 *
 * @package Franciscan_Society
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Global theme options defaults
function franciscan_get_default_options() {
    return array(
        'site_title'            => 'Franciscan Friars of the Third Order Regular',
        'site_tagline'          => 'Province of St. Francis of Assisi, Ranchi',
        'contact_email'         => 'sectorranchi09@gmail.com',
        'contact_phone'         => '+91 95726 35314',
        'whatsapp_number'       => '919572635314',
        'address_text'          => "Franciscan Ashram (Provincial Residence)\nP.O. Harmu Housing Colony, Ranchi – 834002, JHARKHAND",
        'maps_url'              => 'https://maps.google.com/?q=Franciscan+Ashram+Harmu+Housing+Colony+Ranchi+Jharkhand',
        'facebook_url'          => 'https://www.facebook.com/profile.php?id=6159368',
        'youtube_url'           => 'https://www.youtube.com/@franciscansocietytor',
        'instagram_url'         => '',
        'twitter_url'           => '',
        'seo_title_suffix'      => '| Franciscan Society Ranchi',
        'seo_meta_desc'         => 'Franciscan Friars of the Third Order Regular, Province of St. Francis of Assisi, Ranchi.',
        'seo_keywords'          => 'Franciscan, TOR, Ranchi, Catholic, Friars, Faith, Ministry',
        
        // Security & Google reCAPTCHA
        'recaptcha_enabled'     => '0',
        'recaptcha_site_key'    => '',
        'recaptcha_secret_key'  => '',
        'recaptcha_version'     => 'v3',

        // Email & Gmail SMTP App Password Configuration
        'smtp_enabled'          => '1',
        'smtp_host'             => 'smtp.gmail.com',
        'smtp_port'             => '587',
        'smtp_encryption'       => 'tls',
        'smtp_email'            => 'sectorranchi09@gmail.com',
        'smtp_app_password'     => 'jvvb fhvb xods okst',
        'smtp_from_name'        => 'Franciscan Society Ranchi Province',
        'smtp_recipient_email'  => 'sectorranchi09@gmail.com',
        'receiving_email'       => 'sectorranchi09@gmail.com',

        // Donation & Bank Details Visibility (0 = Hidden, 1 = Visible)
        'show_donation_section' => '0',

        // Navigation & Menu Custom Links & Labels
        'nav_label_home'                => 'Home',
        'nav_link_home'                 => '/',
        
        'nav_label_about'               => 'About Us',
        'nav_link_about'                => '/about/',
        
        'nav_label_gallery'             => 'Gallery',
        'nav_link_gallery'              => '/gallery/',
        
        'nav_label_ministries'          => 'Ministries',
        'nav_label_ministries_pastoral' => 'Pastoral Ministry',
        'nav_link_ministries_pastoral'  => '/ministries-pastoral/',
        'nav_label_ministries_formation'=> 'Formation Ministry',
        'nav_link_ministries_formation' => '/ministries-formation/',
        'nav_label_ministries_education'=> 'Education Ministry',
        'nav_link_ministries_education' => '/ministries-education/',
        'nav_label_publications'        => 'Publications',
        'nav_link_publications'         => '/publications/',
        
        'nav_label_community'           => 'Community',
        'nav_label_community_history'   => 'Our History',
        'nav_link_community_history'    => '/community-history/',
        'nav_label_community_rule'      => 'Third Order Rule',
        'nav_link_community_rule'       => '/community-rule/',
        'nav_label_community_leadership'=> 'Leadership',
        'nav_link_community_leadership' => '/community-leadership/',
        'nav_label_community_friars'    => 'Our Friars',
        'nav_link_community_friars'     => '/community-friars/',
        'nav_label_community_friaries'  => 'Our Friaries',
        'nav_link_community_friaries'   => '/community-friaries/',
        
        'nav_label_news'                => 'News',
        'nav_link_news'                 => '/news/',
        
        'nav_label_contact'             => 'Contact Us',
        'nav_link_contact'              => '/contact/',
    );
}

/**
 * Helper to resolve dynamic menu URLs (relative paths, absolute URLs, hashes, mailto, tel)
 */
function franciscan_resolve_nav_url( $path_or_url, $default = '/' ) {
    if ( empty( $path_or_url ) ) {
        $path_or_url = $default;
    }
    $path_or_url = trim( $path_or_url );
    if ( preg_match( '#^(https?:)?//#i', $path_or_url ) || strpos( $path_or_url, '#' ) === 0 || strpos( $path_or_url, 'mailto:' ) === 0 || strpos( $path_or_url, 'tel:' ) === 0 ) {
        return $path_or_url;
    }
    return home_url( '/' . ltrim( $path_or_url, '/' ) );
}

function franciscan_get_options() {
    $options = get_option( 'franciscan_theme_options', array() );
    $defaults = franciscan_get_default_options();
    if ( ! is_array( $options ) ) {
        $options = array();
    }
    return wp_parse_args( $options, $defaults );
}

function franciscan_get_option( $key, $default = '' ) {
    $options = get_option( 'franciscan_theme_options', array() );
    $defaults = franciscan_get_default_options();

    if ( isset( $options[$key] ) && $options[$key] !== '' ) {
        return is_string( $options[$key] ) ? stripslashes( $options[$key] ) : $options[$key];
    }
    if ( isset( $defaults[$key] ) ) {
        return is_string( $defaults[$key] ) ? stripslashes( $defaults[$key] ) : $defaults[$key];
    }
    return $default;
}

function franciscan_update_option( $key, $value ) {
    $options = get_option( 'franciscan_theme_options', array() );
    $options[$key] = $value;
    return update_option( 'franciscan_theme_options', $options );
}

/**
 * Default Page Contents for Franciscan Studio (Live In-Place Site Editor)
 */
function franciscan_get_default_page_content( $slug = '' ) {
    $defaults = array(
        'home' => array(
            // Hero
            'hero_badge'        => 'THIRD ORDER REGULAR OF ST. FRANCIS',
            'hero_title'        => "Let us begin again,\nfor we have only begun to serve the Lord.",
            'hero_subtitle'     => 'In the spirit of the Seraphic Minstrel of Divine Love, we walk the way of the Gospel—our hearts rooted in prayer, our lives woven together in fraternity, and our footsteps shaped by the simplicity and humility of Christ. Drawn to the least, we seek to become gentle instruments of His peace, singing into the world the melody of mercy, hope, and love.',
            'hero_image'        => '',
            'hero_video'        => '',
            'hero_stat_1_num'   => '104+',
            'hero_stat_1_lbl'   => 'PROFESSED FRIARS',
            'hero_stat_2_num'   => '14+',
            'hero_stat_2_lbl'   => 'PARISHES SERVED',
            'hero_stat_3_num'   => '800+',
            'hero_stat_3_lbl'   => 'YEARS OF GRACE',
            'hero_cta_text'     => 'JOIN OUR CHURCH',
            'hero_cta_url'      => '/contact',
            'hero_sec_cta_text' => 'GET STARTED',
            'hero_sec_cta_url'  => '/about',
            
            // Section 2: Welcome
            'welcome_eyebrow'        => 'WELCOME TO THE FRANCISCAN SOCIETY',
            'welcome_section_heading'=> 'WALKING TOGETHER IN FAITH, PENANCE, AND SERVICE',
            'welcome_section_text'   => 'In the spirit of the Poverello of Assisi, we journey along the Gospel path—rooted in prayer, sustained by fraternity, and shaped by the simplicity and humility of Christ. With hearts open to God and attentive to our brothers and sisters, we seek to serve with compassion, draw near to the least, and carry into the world the peace, mercy, and hope of Christ.',
            'welcome_mosaic_img'     => '',
            'welcome_slide_1_img'    => '',
            'welcome_slide_2_img'    => '',
            'welcome_slide_3_img'    => '',
            'welcome_slide_4_img'    => '',
            'welcome_slide_5_img'    => '',

            // Section 3: About
            'about_eyebrow'          => 'ABOUT US',
            'about_section_heading'  => 'Our Franciscan Journey',
            'about_section_text'     => 'The Third Order Regular (TOR) of St. Francis traces its origins to the ancient Order of Penance from the 4th century. Established in Ranchi in 1996 and elevated to a full Province on 20 March 2006.',
            'about_mission_title'    => 'OUR MISSION',
            'about_mission_text'     => 'Serving 15 parishes & 22 schools across Ranchi and global mission fields.',
            'about_vision_title'     => 'OUR VISION',
            'about_vision_text'      => 'Promoting peace, joy, and dignity under "Peace and Joy to the World".',
            'about_provincial_name'  => 'FR. MANOJ VENGATHANAM, TOR',
            'about_provincial_title' => 'Minister Provincial',
            'about_section_img'      => '',
            'about_video_url'        => '',
            'about_provincial_avatar'=> '',
            'about_cta_btn_text'     => 'LEARN MORE ABOUT',
            'about_cta_btn_url'      => '/about',
            'about_video_btn_text'   => 'WATCH OUR VIDEO',

            // Section 4: Mission & Values
            'mission_eyebrow'        => 'Our Values',
            'mission_values_heading' => 'OUR CHRISTIAN VALUES THAT LEAD OUR MINISTRY',
            'mission_values_text'    => 'Our Christian values are the foundation of everything we do as a church. Guided by faith, love, compassion, and integrity, we are committed to serving God.',
            'prayer_support_title'   => 'FAITH & TRUST',
            'prayer_support_desc'    => 'We place our faith in God and trust His guidance in every aspect of our ministry.',
            'fellowship_title'       => 'LOVE & COMPASSION',
            'fellowship_desc'        => 'We serve others with genuine love, kindness, compassion, and a heart for those in need.',
            'call_us_label'          => 'CALL US!',
            'mission_church_img'     => '',
            'mission_priest_img'     => '',

            // Section 5: Bible Quote
            'bible_eyebrow'          => 'WORD OF GOD',
            'bible_quote_line1'      => 'BE STILL AND',
            'bible_quote_highlight'  => 'KNOW',
            'bible_quote_line2'      => 'THAT I AM GOD.',
            'bible_quote'            => '"BE STILL AND KNOW THAT I AM GOD."',
            'bible_ref'              => 'Book of Psalms',

            // Section 6: News & Events Header & Button
            'news_eyebrow'           => 'NEWS & EVENTS',
            'news_heading'           => "INSIGHTS AND INSPIRATION FROM\nOUR LATEST NEWS",
            'news_btn_text'          => 'VIEW ALL NEWS & EVENTS',
            'news_btn_url'           => '/news',

            // Section 7: Blogs & Articles
            'blogs_eyebrow'          => 'OUR BLOGS',
            'blogs_heading'          => "OUR MINISTRIES FOR WORSHIP\nGROWTH AND SERVICE",
            'blogs_btn_text'         => 'VIEW ALL BLOGS',
            'blogs_btn_url'          => '/blogs',

            // Section 8: Image Gallery
            'gallery_eyebrow'        => 'IMAGE GALLERY',
            'gallery_heading'        => 'EXPLORE OUR BEAUTIFUL CHURCH',
            'gallery_btn_text'       => 'VIEW ALL PHOTOS',
            'gallery_btn_url'        => '/gallery',
        ),
        'about' => array(
            // Top Banner
            'hero_badge'             => 'WHO WE ARE',
            'hero_title'             => 'ABOUT US',
            'hero_subtitle'          => 'Learn about our history, mission, and the Franciscan friars of Ranchi Province.',
            'hero_image'             => '',

            // Story & Mission
            'about_eyebrow'          => 'WELCOME TO THE FRANCISCAN SOCIETY',
            'about_section_heading'  => 'Our Franciscan Journey',
            'about_section_text'     => 'In the spirit of the Poverello of Assisi, we journey along the Gospel path—rooted in prayer, sustained by fraternity, and shaped by the simplicity and humility of Christ. With hearts open to God and attentive to our brothers and sisters, we seek to serve with compassion, draw near to the least, and carry into the world the peace, mercy, and hope of Christ.',
            'about_mission_title'    => 'OUR MISSION',
            'about_mission_text'     => 'Serving 15 parishes & 22 schools across Ranchi and global mission fields.',
            'about_vision_title'     => 'OUR VISION',
            'about_vision_text'      => 'Promoting peace, joy, and dignity under "Peace and Joy to the World".',
            'about_provincial_name'  => 'FR. MANOJ VENGATHANAM, TOR',
            'about_provincial_title' => 'Minister Provincial',
            'about_section_img'      => '',
            'about_video_url'        => '',
            'about_provincial_avatar'=> '',
            'welcome_slide_1_img'    => '',
            'welcome_slide_2_img'    => '',
            'welcome_slide_3_img'    => '',
            'welcome_slide_4_img'    => '',
            'welcome_slide_5_img'    => '',

            // Values & Mission
            'mission_eyebrow'        => 'Our Values',
            'mission_values_heading' => 'OUR CHRISTIAN VALUES THAT LEAD OUR MINISTRY',
            'mission_values_text'    => 'Our Christian values are the foundation of everything we do as a church. Guided by faith, love, compassion, and integrity, we are committed to serving God.',
            'prayer_support_title'   => 'FAITH & TRUST',
            'prayer_support_desc'    => 'We place our faith in God and trust His guidance in every aspect of our ministry.',
            'fellowship_title'       => 'LOVE & COMPASSION',
            'fellowship_desc'        => 'We serve others with genuine love, kindness, compassion, and a heart for those in need.',
            'call_us_label'          => 'CALL US!',
            'mission_church_img'     => '',
            'mission_priest_img'     => '',

            // Charism & Pillars Section
            'charism_heading'        => 'OUR CHARISM',
            'charism_eyebrow'        => 'CORE FRANCISCAN IDENTITY',
            'charism_statement'      => "Conversion, contemplation,\npoverty, and humility",
            'charism_text'           => "lie at the heart of Franciscan identity. The fundamental charism of the Third Order Regular is penance, understood as ongoing conversion. This involves turning to God in love, reconciliation with Him, harmony with oneself, and charity toward one's neighbour.",
            'charism_p1_title'       => "Ongoing\nConversion",
            'charism_p2_title'       => "Poverty &\nHumility",
            'charism_p3_title'       => "Charity\nto All",
            'charism_p4_title'       => "Reconciled\nin Love",
            'charism_image'          => '',
            'charism_badge_text'     => 'TOR FRANCISCAN CHARISM',

            // Bottom CTA
            'community_cta_text'     => 'To learn more about our leadership, friaries across India, and the friars serving in our Province, visit our Community page.',
            'community_cta_btn_text' => 'EXPLORE THE HISTORY',
            'community_cta_btn_url'  => '/community-history/',
        ),
        'contact' => array(
            'hero_badge'             => 'GET IN TOUCH',
            'hero_title'             => 'CONTACT US',
            'hero_subtitle'          => 'Reach out to the Provincial Office for prayer requests, mass intentions, vocations inquiries, or general information.',
            'hero_image'             => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/contact-banner.jpg',
            'contact_eyebrow'        => 'CONTACT INFORMATION',
            'contact_heading'        => 'REACH OUT TO US',
            'address_card_title'     => 'PRINCIPAL ADDRESS',
            'channels_card_title'    => 'COMMUNICATION CHANNELS',
            'donation_heading'       => 'MAKE A DONATION',
            'bank_1_title'           => 'State Bank of India (SBI)',
            'bank_1_name'            => 'Franciscan Society Ranchi',
            'bank_1_account'         => '34891204859',
            'bank_1_ifsc'            => 'SBIN0000167',
            'bank_2_title'           => 'Chase Bank (USA / Wire)',
            'bank_2_name'            => 'Franciscan Province Mission Fund',
            'bank_2_account'         => '021000021',
            'bank_2_swift'           => 'CHASUS33',
            'form_title'             => 'SEND US A MESSAGE',
            'form_subtitle'          => 'Please complete the form below. We respond to all inquiries and prayer requests within 24–48 hours.',
            'location_heading'       => 'LOCATION & PROVINCIAL HEADQUARTERS',
        ),
        'community-history' => array(
            'hero_badge'             => 'HERITAGE',
            'hero_title'             => 'HISTORY OF THE PROVINCE',
            'hero_subtitle'          => 'Tracing our origins from the ancient 4th-century Order of Penance, to St. Francis of Assisi, to thirty years of dedicated growth in Ranchi Province.',
            'hero_image'             => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/history-banner.jpeg',
            'heritage_badge'         => 'OUR HERITAGE',
            'heritage_title'         => 'The Lord Himself led me among them',
            'heritage_text'          => 'Tracing our origins from the ancient 4th-century Order of Penance, to St. Francis of Assisi, to thirty years of dedicated growth in Ranchi Province.',
            'era1_badge'             => 'ORIGINS & ROOTS',
            'era1_title'             => 'The Order of Penance & St. Francis of Assisi',
            'era1_p1'                => 'The Third Order Regular (TOR) of St. Francis traces its origins to the ancient Order of Penance, which dates back to the fourth century AD. Men and women voluntarily embraced lives of penance for the sake of the Kingdom of God and their own spiritual growth.',
            'era1_p2'                => 'During his early conversion experience, St. Francis of Assisi (1181–226) became associated with the Order of Penance, an itinerant movement known as the Penitents of Assisi. He addressed them through an Exhortation, encouraging them to lead holy lives of penance.',
            'era1_p3'                => 'Among the early Franciscan penitents were both Seculars and Regulars who lived according to a regula (rule of life). The Regulars embraced religious life characterized by the profession of vows, observance of the Third Order Rule, and communal living in hermitages.',
            'era2_badge'             => 'PAPAL CONFIRMATION',
            'era2_title'             => 'Unification & The Generalate in Rome',
            'era2_p1'                => 'In 1447, Pope Nicholas V, through the bull Pastoralis Officii, united approximately sixty communities of male Franciscan tertiaries in Italy under a single Minister General. This marked the formal beginning of the Third Order Regular of St. Francis.',
            'era2_p2'                => 'The Third Order Regular received a revised Rule from Pope Pius XI in 1927. This Rule was renewed on 8 December 1982 by Pope John Paul II through Franciscanum Vitae Propositum, becoming the Rule and Life of nearly four hundred Franciscan Third Order congregations.',
            'era2_image'             => '',
            'highlight_title'        => 'Franciscan Identity & Global Presence',
            'highlight_p1'           => 'Conversion, contemplation, poverty, and humility lie at the heart of Franciscan identity. The fundamental charism of the Third Order Regular is penance, understood as ongoing conversion.',
            'highlight_p2'           => 'Today, the Order comprises three provinces in India; two provinces each in Italy and the United States; one province each in Sri Lanka, Spain and Croatia; vice provinces in South Africa, Brazil, Paraguay, and Mexico; and delegations worldwide.',
            'era3_badge'             => 'THE INDIAN MISSION',
            'era3_title'             => 'The History of the TOR in India & Ranchi Province',
            'era3_p1'                => 'The history of the Third Order Regular in India began in the late 1930s. Guided by divine providence, American friars from the Province of the Sacred Heart (Loretto, Pennsylvania) arrived in Bhagalpur, Bihar, in December 1938.',
            'era3_p2'                => 'On 20 March 2006, the Commissary of St. Francis of Assisi, Ranchi, was officially elevated to the status of a Province—the Province of St. Francis of Assisi, Ranchi.',
            'era3_image'             => '',
        ),
        'community-rule' => array(
            'hero_badge'             => 'OUR RULE… OUR LIFE',
            'hero_title'             => 'THIRD ORDER REGULAR RULE',
            'hero_subtitle'          => 'Discovering the authentic meaning of Franciscan life',
            'hero_image'             => defined( 'FRANCISCAN_THEME_URI' ) ? FRANCISCAN_THEME_URI . '/assets/images/new_uploads/third-rule-banner.jpg' : '',
            'prologue_badge'         => 'PROLOGUE TO THE RULE',
            'prologue_title'         => 'Third Order Regular Rule',
            'prologue_subtitle'      => 'The Beginning of the Rule and the Life of the Brothers and Sisters of the Third Order Regular of St. Francis (Words of St. Francis to His Followers — Letter to the Faithful I, 1–19)',
            'prologue_p1'            => 'All who love the Lord with their whole heart, with their whole soul and mind, and with all their strength, (cf Mk 12:30) and love their neighbors as themselves, (cf Mt 22:39) and who despise the tendency in their humanity to sin, receive the Body and Blood of our Lord Jesus Christ and bring forth from within themselves fruits worthy of true penance; How happy and blessed are these men and women when they do these things, and persevere in doing them because the Spirit of the Lord will rest upon them (cf Is 11:12) and the Lord will make His home and dwelling place with them (cf Jn 14:23). They are the children of the Heavenly Father (cf Mt 5:45) whose works they do. They are the spouses, brothers and mothers of Our Lord Jesus Christ (cf Mt 12:50). We are his spouses when the faithful soul is united by the Holy Spirit with Our Lord Jesus Christ. We are brothers when we do the will of the Father who is in Heaven (cf Mt 12:50). We are mothers when we bear Him in our hearts and bodies (cf 1 Co 6:20) with divine love and with pure and sincere consciences; and we give birth to him through a holy life which should enlighten others because of our example (Mt 5:16).',
            'prologue_p2'            => 'How glorious it is to have so holy and great a Father in Heaven; and to have such a beautiful and admirable Spouse, the Holy Paraclete; and to have a Brother and Son, so holy, beloved, blessed, humble, peaceful, sweet, lovable, and desirable over all things: Our Lord Jesus Christ who gave up his life for his sheep (cf Jn 10:15) and prayed to the Father, saying: Holy Father, keep in your name (Jn 17:11) those whom You gave Me in the world; they are Yours and You gave them to Me (Jn 17:6). And the word which You gave Me I gave to them, and they accepted it and truly believed that it came forth from You. And they have accepted that You sent Me (Jn 17:8). I pray for them and not for the world (Jn 17:9). Bless them and sanctify them (Jn 17:17). I sanctify Myself for their sakes (Jn 17:19). I do not pray only for these but also for those who, through their word, will believe in Me (Jn 17:20), may they be holy in oneness as We are (Jn 17:11). Father, I wish that where I am they too may be and that they may see My glory (Jn 17:24) in Your kingdom (Mt 20:21).',
            'emblem_image'           => defined( 'FRANCISCAN_THEME_URI' ) ? FRANCISCAN_THEME_URI . '/assets/images/rule/st-francis-rule.jpg' : '',
            'emblem_title'           => 'Third Order Regular',
            'emblem_subtitle'        => 'Province of St. Francis of Assisi',
            'proclamation_text'      => 'IN THE NAME OF THE LORD! HERE BEGINS THE RULE AND LIFE OF THE BROTHERS AND SISTERS OF THE THIRD ORDER REGULAR OF ST. FRANCIS',
            'directory_badge'        => 'THE CHAPTERS',
            'directory_title'        => 'Rule of the Third Order Regular',
            'directory_subtitle'     => 'Click on any chapter to open the interactive reading window',
            'chapters_list'          => array(
                array(
                    'id'       => 'chap_1',
                    'roman'    => 'Chapter I',
                    'title'    => 'Our Identity',
                    'subtitle' => 'The Form of Life and Evangelical Conversion',
                    'content'  => "The form of life of the Brothers and Sisters of the Third Order Regular of Saint Francis is this: to observe the Holy Gospel of Our Lord Jesus Christ by living in obedience, in poverty and in chastity. Following Jesus Christ after the example of St. Francis, let them recognize that they are called to make greater efforts in their observance of the precepts and counsels of Our Lord Jesus Christ. Let them deny themselves (cf Mt 16:24) as each has promised the Lord.\n\nWith all in the holy Catholic and apostolic Church who wish to serve the Lord, the brothers and sisters of this order are to persevere in true faith and penance. They wish to live this evangelical conversion of life in a spirit of prayer, of poverty, and of humility. Therefore, let them abstain from all evil and persevere to the end in doing good because God the Son Himself will come again in glory and will say to all who acknowledge, adore and serve Him in sincere repentance: \"Come blessed of my Father, take possession of the kingdom prepared for you from the beginning of the world\" (Mt 25:34).\n\nThe sisters and brothers promise obedience and reverence to the Pope and the Holy Catholic Church. In this same spirit they are to obey those called to be ministers and servants of their own fraternity. And wherever they are, or in whatever situation they are in, they should diligently and fervently show reverence and honor to one another. They should also foster unity and communion with all the members of the Franciscan family.",
                    'blessing' => '',
                ),
                array(
                    'id'       => 'chap_2',
                    'roman'    => 'Chapter II',
                    'title'    => 'Acceptance into this Life',
                    'subtitle' => 'Vocation, Initiation, and Consecration',
                    'content'  => "Those who through the Lord's inspiration come to us desiring to accept this way of life are to be received kindly. At the appropriate time, they are to be presented to the ministers of the fraternity who hold responsibility to admit them.\n\nThe ministers shall ascertain that the aspirants truly adhere to the Catholic faith and the Church's sacramental life. If they are found to have a vocation, they are to be initiated into the life of the fraternity. Let everything pertaining to this gospel way of life be explained to them, especially these words of the Lord: \"If you wish to be perfect (Mt 19:21), go and sell all your possessions (cf Lk 18:22) and give to the poor. You will have treasure in heaven. Then come, follow Me.\" And \"if anyone wishes to follow Me, let him deny himself, take up his cross, and follow Me\" (Mt 16:24).\n\nLed by the Lord, let them begin a life of penance, conscious that all of us must be continuously and totally converted to the Lord. As a sign of their conversion and consecration to gospel life, they are to clothe themselves plainly and to live in simplicity.\n\nWhen their initial formation is completed, they are to be received into obedience promising to observe this life and rule always. Let them put aside all attachment as well as every care and worry. Let them only be concerned to serve, love, adore, and honor the Lord God, as best they can, with single-heartedness and purity of intention.\n\nWithin themselves, let them always make a dwelling place and home for the Lord God Almighty, Father, Son and Holy Spirit, so that, with undivided hearts, they may increase in universal love by continually turning to God and to neighbor (Jn 14:23).",
                    'blessing' => '',
                ),
                array(
                    'id'       => 'chap_3',
                    'roman'    => 'Chapter III',
                    'title'    => 'The Spirit of Prayer',
                    'subtitle' => 'Contemplation, Liturgy, and Penance',
                    'content'  => "Everywhere and in each place, and in every season and each day, the brothers and sisters are to have a true and humble faith. From the depths of their inner life let them love, honor, adore, serve, praise, bless and glorify our most high and eternal God who is Father, Son and Holy Spirit. With all that they are, let them adore Him \"because we should pray always and not lose heart\" (Lk 18:1); this is what the Father desires. In this same spirit let them also celebrate the Liturgy of the Hours in union with the whole Church. The sisters and brothers whom the Lord has called to the life of contemplation (Mk 6:31), with a daily renewed joy, should manifest their special dedication to God and celebrate the Father's love for the world. It was He who created and redeemed us, and by His mercy alone shall save us.\n\nThe brothers and sisters are to praise the Lord, the King of heaven and earth, (cf Mt 11:25) with all His creatures and to give Him thanks because, by His own holy will and through His only Son with the Holy Spirit, He has created all things spiritual and material and made us in His own image and likeness.\n\nSince the sisters and brothers are to be totally conformed to the Gospel, they should reflect and keep in their hearts the words of Our Lord Jesus Christ who is the word of the Father, as well as the words of the Holy Spirit which \"are spirit and life\" (Jn 6:63).\n\nLet them participate in the sacrifice of Our Lord Jesus Christ and receive His Body and Blood with great humility and reverence remembering the words of the Lord: \"He who eats My Flesh and drinks My Blood has eternal life\" (Jn 6:54). Moreover, they are to show the greatest possible reverence and honor for the most sacred name, written words and most holy Body and Blood of Our Lord Jesus Christ through whom all things in heaven and on earth have been brought to peace and reconciliation with Almighty God (Jn 6:63).\n\nWhenever they commit sin the brothers and sisters, without delay, are to do penance interiorly by sincere sorrow and exteriorly by confessing their sins to a priest. They should also do worthy deeds that manifest their repentance. They should fast and always strive to be simple and humble, especially before God. They should desire nothing else but our Savior, who offered Himself in His own Blood as a sacrifice on the altar of the Cross for our sins, giving us example so that we might follow in His footsteps.",
                    'blessing' => '',
                ),
                array(
                    'id'       => 'chap_4',
                    'roman'    => 'Chapter IV',
                    'title'    => 'The Life of Chastity for the Sake of the Kingdom',
                    'subtitle' => 'Total Consecration and Marian Devotion',
                    'content'  => "Let the brothers and sisters keep in mind how great a dignity the Lord God has given them \"because He created them and formed them in the image of His beloved Son according to the flesh and in His own likeness according to the Spirit\" (Col 1:16). Since they are created through Christ and in Christ, they have chosen this form of life which is founded on the words and deeds of our Redeemer.\n\nProfessing chastity \"for the sake of the kingdom of heaven\" (Mt 19:12), they are to care for the things of the Lord and \"they have nothing else to do except to follow the will of the Lord and to please Him\" (1 Col 7:32). In all of their works the love of God and all people should shine forth.\n\nThey are to remember that they have been called by a special gift of grace to manifest in their lives that wonderful mystery by which the Church is joined to Christ her spouse (cf Eph. 5:23-26).\n\nLet the brothers and sisters keep the example of the Blessed Virgin Mary, the Mother of God and of our Lord Jesus Christ, ever before their eyes. Let them do this according to the exhortation of St. Francis who held Holy Mary, Lady and Queen, in highest veneration, since she is \"the virgin made church.\" Let them also remember that the Immaculate Virgin Mary, whose example they are to follow, called herself \"the handmaid of the Lord\" (Lk 1:38).",
                    'blessing' => '',
                ),
                array(
                    'id'       => 'chap_5',
                    'roman'    => 'Chapter V',
                    'title'    => 'The Way to Serve and Work',
                    'subtitle' => 'Labor, Humility, and Peaceful Witness',
                    'content'  => "As poor people, the brothers and sisters to whom the Lord has given the grace of serving or working with their hands, should do so faithfully and conscientiously. Let them avoid that idleness which is the enemy of the soul. But they should not be so busy that the spirit of holy prayer and devotion, which all earthly goods should foster, is extinguished.\n\nIn exchange for their service or work, they may accept anything necessary for their own temporal needs and for that of their sisters or brothers. Let them accept it humbly as is expected of those who are servants of God and seekers of most holy poverty. Whatever they may have over and above their needs, they are to give to the poor. And let them never want to be over others. Instead they should be servants and subjects to every human creature for the Lord's sake (1 P 2:13).\n\nLet the sisters and brothers be gentle, peaceful and unassuming, mild and humble, speaking respectfully to all in accord with their vocation. Wherever they are, or wherever they go throughout the world they should not be quarrelsome, contentious, or judgmental towards others. Rather, it should be obvious that they are \"joyful, good-humored,\" and happy \"in the Lord\" as they ought to be (cf Ph 4:4). And in greeting others, let them say, \"The Lord give you peace.\"",
                    'blessing' => '',
                ),
                array(
                    'id'       => 'chap_6',
                    'roman'    => 'Chapter VI',
                    'title'    => 'The Life of Poverty',
                    'subtitle' => 'Pilgrims, Strangers, and Heavenly Riches',
                    'content'  => "All the sisters and brothers zealously follow the poverty and humility of Our Lord Jesus Christ. \"Though rich\" beyond measure (2 Co 8:9). He emptied Himself for our sake (Ph 2:7) and with the holy virgin, His mother, Mary, He chose poverty in this world. Let them be mindful that they should have only those goods of this world which, as the apostle says, \"having something to eat and something to wear, with these we are content\" (1 Tim 6:8). Let them particularly beware of money. And let them be happy to live among the outcast and despised, among the poor, the weak, the sick, the unwanted, the oppressed, and the destitute.\n\nThe truly poor in spirit, following the example of the Lord, live in this world as pilgrims and strangers (cf 1 P 2:1). They neither appropriate nor defend anything as their own. So excellent is this most high poverty that it makes us heirs and rulers of the kingdom of heaven. It makes us materially poor, but rich in virtue (cf James 2:5). Let this poverty alone be our portion because it leads to the land of the living (Ps 141:6). Clinging completely to it let us, for the sake of Our Lord Jesus Christ, never want anything else under heaven.",
                    'blessing' => '',
                ),
                array(
                    'id'       => 'chap_7',
                    'roman'    => 'Chapter VII',
                    'title'    => 'Fraternal Love',
                    'subtitle' => 'Brotherhood, Mutual Care, and Reconciliation',
                    'content'  => "Because God loves us, the brothers and sisters should love each other, for the Lord says, \"This is My commandment, that you love one another as I have loved you\" (Jn 15:12). Let them manifest their love in deeds (cf 1 Jn 3:18). Also whenever they meet each other, they should show that they are members of the same family. Let them make known their needs to one another. Blessed are they who love another who is sick and seemingly useless, as much as when that brother or sister is well and of service to them. Whether in sickness or in health, they should only want what God wishes for them. For all that happens to them let them give thanks to our Creator.\n\nIf discord caused by word or deed should occur among them, they should immediately (Mt 18:35) and humbly ask forgiveness of one another even before offering their gift of prayer before the Lord (cf Mt 5:24). And if anyone seriously neglects the form of life all profess, the minister, or others who may know of it, are to admonish that person. Those giving the admonition should neither embarrass nor speak evil of the other, but show great kindness. Let all be careful of self-righteousness, which causes anger and annoyance because of another's sin. These in oneself or in another hinder living lovingly.",
                    'blessing' => '',
                ),
                array(
                    'id'       => 'chap_8',
                    'roman'    => 'Chapter VIII',
                    'title'    => 'The Obedience of Love',
                    'subtitle' => 'Mutual Submission, Servant Leadership, and Humility',
                    'content'  => "Following the example of Our Lord Jesus Christ Who made His own will one with the Father's, the sisters and brothers are to remember that, for God, they should give up their own wills. Therefore, in every kind of chapter they have let them \"seek first the kingdom of God and His justice,\" (Mt 6:33) and exhort one another to observe with greater dedication the rule they have professed and to follow faithfully in the footprints of Our Lord Jesus Christ. Let them neither dominate nor seek power over one another, but let them willingly serve and obey \"one another with that genuine love which comes from each one's heart\" (cf Gal 5:13). This is the true and holy obedience of Our Lord Jesus Christ.\n\nThey are always to have one of their number as minister and servant of the fraternity whom they are strictly obliged to obey in all that they have promised the Lord to observe, and which is not contrary to conscience or this rule.\n\nThose who are ministers and servants of the others should visit, admonish, and encourage them with humility and love. Should there be brothers or sisters anywhere who know and acknowledge that they cannot observe the rule according to its spirit, it is their right and duty to have recourse to their ministers. The ministers are to receive them with such love, kindness, and sympathy that the sisters or brothers can speak and act toward them just as an employer would with a worker. This is how it should be. The ministers are to be servants of all.\n\nNo one is to appropriate any office or ministry whatsoever as if it were a personal right; rather each should willingly relinquish it when the time comes.",
                    'blessing' => '',
                ),
                array(
                    'id'       => 'chap_9',
                    'roman'    => 'Chapter IX',
                    'title'    => 'Apostolic Life',
                    'subtitle' => 'Witness of Peace, Joyful Perseverance, and Francis\' Blessing',
                    'content'  => "The brothers and sisters are to love the Lord \"with their whole heart, with their whole soul and mind, and with all their strength,\" and to love their neighbor as themselves. Let them glorify the Lord in all they do. For He has sent them into the world so that they might give witness by word and work to His voice and to make known to all that the Lord alone is God (cf Mk 12:30, Mt 22:30).\n\nAs they announce peace with their lips, let them be careful to have it even more within their own hearts. No one should be roused to wrath or insult on their account, rather all should be moved to peace, goodwill and mercy because of their gentleness. The sisters and brothers are called to heal the wounded, to bind up those who are bruised, and to reclaim the erring. Wherever they are, they should recall that they have given themselves up completely and handed themselves over totally to Our Lord Jesus Christ. Therefore, they should be prepared to expose themselves to every enemy, visible and invisible, for the love of Him because the Lord says: \"Blessed are they who suffer persecution for the sake of justice, theirs is the kingdom of heaven\" (Mt 5:10).\n\nIn that love which is God (1 Jn 4:16) all the brothers and sisters, whether they are engaged in prayer, or in announcing the word of God, or in serving, or in doing manual labor, should strive to be humble in everything. They should not seek glory, or be self-satisfied, or interiorly proud because of a good work or word God does or speaks in or through them. Rather in every place and circumstance, let them acknowledge that all good belongs to the most high Lord and Ruler of all things. Let them always give thanks to Him from Whom we receive all good.\n\nLet the sisters and brothers always be mindful that they should desire one thing alone, namely, the Spirit of God at work within them. Always obedient to the Church and firmly established in the Catholic faith, let them live according to the poverty, the humility and the holy Gospel of Our Lord Jesus Christ which they have solemnly promised to observe.",
                    'blessing' => "\"Whoever will observe these things shall be filled with the blessings of the Most High Father in Heaven, and on earth with the blessing of His beloved Son, with the Holy Spirit, and with all virtues and with all the saints. And I, Brother Francis, your little one and servant, in so far as I am able, confirm to you within and without this most Holy Blessing.\"",
                ),
            ),
        ),
        'community-leadership' => array(
            'hero_badge'             => 'To lead is to serve; to be greater is to become lesser.',
            'hero_title'             => 'LEADERSHIP',
            'hero_subtitle'          => 'Guiding the Province in fraternity, governance, and mission.',
            'hero_image'             => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/leadership-banner.jpg',
            'general_council_badge'  => 'GENERAL COUNCIL',
            'general_council_title'  => 'LEADERSHIP OF THE ORDER',
            'provincial_council_badge'=> 'PROVINCIAL COUNCIL',
            'provincial_council_title'=> 'RANCHI PROVINCE LEADERSHIP',
        ),
        'community-friars' => array(
            'hero_badge'             => 'OUR BROTHERHOOD',
            'hero_title'             => 'OUR FRIARS',
            'hero_subtitle'          => 'Brothers serving in prayer, fraternity, and active apostolates across Ranchi Province and beyond.',
            'hero_image'             => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/friars-banner.jpg',
            'section_eyebrow'        => 'OUR FRIARS',
            'section_title'          => 'SERVING IN RELIGIOUS LIFE',
            'intro_text'             => 'The Province comprises 104 professed friars including 84 solemnly professed and 19 temporarily professed members. Among them are 71 priests and 3 brothers. Additionally, there are 28 major seminarians, 4 novices, 9 pre-novices, and 36 candidates in formation.',
            'stat_1_num'             => '104+',
            'stat_1_lbl'             => 'Professed Friars',
            'stat_2_num'             => '71',
            'stat_2_lbl'             => 'Ordained Priests',
            'stat_3_num'             => '77+',
            'stat_3_lbl'             => 'In Formation',
            'roster_title'           => 'FRIARS IN COMMUNITY',
            'directory_title'        => 'Brothers always be mindful that they should desire one thing alone, namely, the Spirit of God at work within them',
            'roster_note'            => 'Complete list includes 100+ professed friars serving across India and abroad.',
        ),
        'community-friaries' => array(
            'hero_badge'             => 'OUR HOMES',
            'hero_title'             => 'OUR FRIARIES & ASHRAMS',
            'hero_subtitle'          => 'Centres of prayer, hospitality, and apostolate across India and Germany.',
            'hero_image'             => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/friaries-banner.jpg',
            'section_eyebrow'        => 'OUR HOMES',
            'section_title'          => 'FRIARIES ACROSS INDIA',
            'friaries_overview_title'=> 'The Lord gave me brothers.',
            'intro_text'             => 'The Province maintains 18 major friaries and ashrams across multiple dioceses, serving the People of God through parishes, schools, and pastoral ministry.',
        ),
        'community' => array(
            'hero_badge'             => 'OUR BROTHERHOOD',
            'hero_title'             => 'COMMUNITY',
            'hero_subtitle'          => 'Fraternity, prayer, and mission across Ranchi Province.',
            'hero_image'             => '',
        ),
        'ministries' => array(
            'hero_badge'                => 'SERVING GOD & PEOPLE',
            'hero_title'                => 'OUR MINISTRIES',
            'hero_subtitle'             => 'Living the Gospel through pastoral care, spiritual formation, and transformative education across India and abroad.',
            'hero_image'                => '',
            'stat_1_num'                => '15+ Parishes',
            'stat_1_lbl'                => 'Across 9 Dioceses in India & Germany',
            'stat_2_num'                => '20,000+',
            'stat_2_lbl'                => 'Students in 22 Regional & ICSE Schools',
            'stat_3_num'                => '4 Centres',
            'stat_3_lbl'                => 'Dedicated Formation & Theological Houses',
            'stat_4_num'                => '104+ Friars',
            'stat_4_lbl'                => 'Professed Brothers Serving in Fraternity',
            'pastoral_badge'            => 'PASTORAL MINISTRY',
            'pastoral_title'            => 'PROCLAIMING THE GOSPEL THROUGH COMPASSIONATE SERVICE',
            'pastoral_lead'             => 'St. Francis gathered brothers around him to become heralds of the Good News. Inspired by this vision, the TOR Franciscans of the Province actively engage in pastoral ministry in parishes. Through this vital service to the Church, the friars dedicate themselves wholeheartedly to the mission of evangelization by their pastoral presence and ministry.',
            'pastoral_desc'             => 'Their ministry extends beyond the celebration of the sacraments to a compassionate and attentive presence among the people—caring for the sick and elderly, pastoral counseling, and family visits across 15 parishes in India and the Archdiocese of Freiburg, Germany.',
            'pastoral_image'            => '',
            'pastoral_img_caption_title'=> '15 Parishes in 9 Dioceses',
            'pastoral_img_caption_sub'  => 'India & Archdiocese of Freiburg, Germany',
            'pastoral_btn_text'         => 'EXPLORE PASTORAL MINISTRY',
            'pastoral_btn_url'          => '/ministries-pastoral/',
            'formation_badge'           => 'FORMATION MINISTRY',
            'formation_title'           => 'NURTURING THE NEXT GENERATION OF FRANCISCANS',
            'formation_lead'            => 'Formation is the foundational ministry through which the Franciscan TOR charism and spirituality are creatively and faithfully proposed to successive generations. As Pope John Paul II emphasized in Vita Consecrata, formation is a dynamic, lifelong process that leads to ongoing conversion.',
            'formation_desc'            => 'The Province operates two Minor Seminaries (Dorma and Ranchi), the Novitiate House in Bichna (Khunti), and the Clericate at Purulia Road (Ranchi), providing holistic spiritual, intellectual, human, and pastoral preparation for religious consecration.',
            'formation_image'           => '',
            'formation_img_caption_title'=>'4 Sacred Formation Houses',
            'formation_img_caption_sub' => 'Dorma • Bichna • Ranchi Clericate',
            'formation_btn_text'        => 'EXPLORE FORMATION MINISTRY',
            'formation_btn_url'         => '/ministries-formation/',
            'education_badge'           => 'EDUCATION MINISTRY',
            'education_title'           => 'EMPOWERING MINDS THROUGH KNOWLEDGE & VALUES',
            'education_lead'            => 'Guided by the motto, “Peace and Joy to the World,” our educational apostolate serves over 20,000 students across Jharkhand, Bihar, and West Bengal. Operating five Hindi-medium high schools, eleven middle schools, and six English-medium schools affiliated with CISCE and CBSE boards.',
            'education_desc'            => 'Open to students of all faiths and backgrounds, our schools provide balanced, holistic education nurturing moral, intellectual, emotional, and spiritual development.',
            'education_image'           => '',
            'education_img_caption_title'=>'22 Schools Across 3 States',
            'education_img_caption_sub' => 'Jharkhand • Bihar • West Bengal',
            'education_btn_text'        => 'EXPLORE EDUCATION MINISTRY',
            'education_btn_url'         => '/ministries-education/',
            'mission_badge'             => 'OUR CALLING',
            'mission_title'             => '“PEACE AND JOY TO THE WORLD”',
            'mission_desc'              => 'Whether in rural parish mission stations, classrooms of growing minds, or quiet contemplative chapels, our friars serve as instruments of Christ’s peace and fraternal love.',
            'mission_btn_text'          => 'JOIN OUR MISSION',
            'mission_btn_url'           => '/contact/#enquiry',
            'mission_sec_btn_text'      => 'LEARN ABOUT US',
            'mission_sec_btn_url'       => '/about/',
            'meta_title'                => 'Our Ministries | The Franciscan Society',
            'meta_description'          => 'Explore the ministries of the Franciscan Society TOR Ranchi Province: pastoral care, spiritual formation, and education.',
            'meta_keywords'             => 'Franciscan, Ministries, Pastoral, Formation, Education, Ranchi',
            'meta_og_image'             => '',
        ),
        'ministries-pastoral' => array(
            'hero_badge'        => 'SACRED CARE',
            'hero_title'        => 'PASTORAL MINISTRY',
            'hero_subtitle'     => "“The brothers should rejoice when they live among people who are considered of little worth and who are despised.”\n— St. Francis of Assisi, Earlier Rule, Ch. IX",
            'hero_image'        => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/pastoral-ministry-banner.jpg',
            'section_1_heading' => 'Pastoral Ministry',
            'section_1_p1'      => 'St. Francis gathered brothers around him to become heralds of the Good News. Inspired by this vision, the TOR Franciscans of the Province actively engage in pastoral ministry in parishes. Through this vital service to the Church, the friars dedicate themselves wholeheartedly to the mission of evangelization by their pastoral presence and ministry.',
            'section_1_p2'      => 'Through their participation in the life and mission of the Church, the friars seek to continue the zeal of St. Francis by inviting the faithful to an ongoing conversion to Gospel values. Their ministry extends beyond the celebration of the sacraments to a compassionate and attentive presence among the people. Through family visits, care for the sick and the elderly, pastoral counseling, and sacramental ministry, they strive to plant the seeds of the Gospel in the hearts of those they serve.',
            'section_1_image'   => '',
            'section_1_img_alt' => 'Pastoral Ministry in Parishes',
            'section_2_p1'      => 'Faithful to the Franciscan spirit of fraternity and service, the friars make themselves available to all, listening to people’s joys and struggles and responding with compassion and care. In this way, they seek not only to proclaim the Gospel but also to witness it through lives of humble service, bringing Christ’s love and hope to the communities entrusted to their care.',
            'section_2_p2'      => 'The TOR Franciscans of St. Francis Province, Ranchi, currently serve in various dioceses and parishes both in India and abroad. In India, they minister in fifteen parishes across the dioceses of Ranchi, Khunti, Simdega, Gumla, Rourkela, Purnea, Bagdogra, Jalpaiguri, and Bongaigaon, particularly in areas where a Franciscan presence is most needed. Beyond India, the friars are actively engaged in pastoral ministry in the Archdiocese of Freiburg, Germany.',
            'section_2_image'   => '',
            'section_2_img_alt' => 'Pastoral Presence in Communities',
            'meta_title'        => 'Pastoral Ministry | Franciscan Society TOR Ranchi',
            'meta_description'  => 'Pastoral ministry of the TOR Franciscans in parishes across Ranchi Province and Germany.',
            'meta_keywords'     => 'Pastoral ministry, Franciscans, parishes, evangelization, sacramental care',
            'meta_og_image'     => '',
        ),
        'ministries-education' => array(
            'hero_badge'        => 'ILLUMINATING MINDS',
            'hero_title'        => 'EDUCATION MINISTRY',
            'hero_subtitle'     => "“Where there is charity and wisdom, there is neither fear nor ignorance.”",
            'hero_image'        => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/education-ministry-banner.jpg',
            'section_1_heading' => 'Education Ministry',
            'section_1_p1'      => 'Education is one of the principal ministries of St. Francis Province, Ranchi. Inspired by the vision of St. Francis of Assisi and the educational mission of the Catholic Church, the Province is committed to forming young people who are intellectually competent, morally upright, spiritually grounded, and socially responsible.',
            'section_1_p2'      => 'Guided by the motto, “Peace and Joy to the World,” the Province’s educational ministry seeks to promote God’s love among all people and foster the values of equality, justice, peace, and human dignity, irrespective of caste, creed, religion, language, or social status. Through its educational institutions, the Province strives to contribute to the creation of a more just, compassionate, and harmonious society.',
            'section_1_p3'      => 'The primary objective of the Province’s educational ministry is the holistic formation of the human person. To achieve this goal, its schools provide a balanced education that nurtures the moral, intellectual, physical, emotional, and spiritual dimensions of students’ lives. By helping young people discover and develop their God-given talents, the institutions prepare them to face the challenges of life with confidence, integrity, and a sense of responsibility toward society.',
            'section_1_image'   => '',
            'section_1_img_alt' => 'Students in Franciscan Schools',
            'section_2_p1'      => 'To carry out this mission, the Province operates a network of educational institutions across Jharkhand, Bihar, and West Bengal, serving approximately 20,000 students. Our academic framework is diverse, operating five Hindi-medium high schools and eleven middle schools affiliated with their respective state education boards, alongside six English-medium schools—four of which are affiliated with the CISCE, one with the CBSE, and one currently awaiting affiliation.',
            'section_2_p2'      => 'These institutions are staffed by dedicated and qualified priests, religious sisters, and lay teachers who work together to provide quality education in both English and regional languages. Open to students of all faiths, communities, and social backgrounds, the schools reflect the inclusive spirit of the Gospel and the Franciscan tradition of service.',
            'section_2_p3'      => 'While they have a special responsibility toward the Christian community, the Province’s schools remain firmly committed to serving the wider society. Through academic excellence, value-based education, and the promotion of human dignity, they continue to make a meaningful contribution to the educational and social development of the nation.',
            'section_2_image'   => '',
            'section_2_img_alt' => 'Franciscan Educational Institutions',
            'meta_title'        => 'Education Ministry | Franciscan Society TOR Ranchi',
            'meta_description'  => 'Education ministry of St. Francis Province Ranchi, serving 20,000+ students across schools in Jharkhand, Bihar, and West Bengal.',
            'meta_keywords'     => 'Education ministry, Franciscan schools, ICSE, CBSE, Ranchi schools',
            'meta_og_image'     => '',
        ),
        'ministries-formation' => array(
            'hero_badge'        => 'NURTURING VOCATIONS',
            'hero_title'        => 'FORMATION MINISTRY',
            'hero_subtitle'     => "“The Most High Himself revealed to me that I should live according to the pattern of the Holy Gospel.”\n— St. Francis of Assisi, Testament",
            'hero_image'        => '',
            'section_1_heading' => 'Formation Ministry',
            'section_1_p1'      => 'Formation is the foundational ministry through which the Franciscan TOR charism and spirituality are creatively and faithfully proposed to and shared with successive generations. In accordance with the mind of the Church and the Order, our primary objective is to prepare candidates for the total consecration of themselves to God in the following of Christ, at the service of the Church’s mission. As Pope John Paul II emphasizes in Vita Consecrata, formation is a dynamic, lifelong process that leads to ongoing conversion and helps individuals discover the signs of God in earthly realities. For this formation to be truly complete, it must be holistic—encompassing and integrating every aspect of Christian life. Ultimately, it is a sacred sharing in the work of the Father who, through the Spirit, fashions the inner attitudes of the Son in the hearts of young men.',
            'section_1_image'   => '',
            'section_1_img_alt' => 'Franciscan Formation Ministry',
            'section_2_p1'      => 'By placing formation at the very heart of its life and mission, the TOR St. Francis Province, Ranchi, strives to form committed, mature, and joyful Franciscan religious who are fully consecrated to God and dedicated to the service of the Church and society in the spirit of St. Francis. This vision is nurtured through a well-structured network of formation centres: two Minor Seminaries located in Dorma, Khunti, Jharkhand and in Ranchi, Jharkhand; the Novitiate House in Bichna, Khunti, Jharkhand; and the Clericate at Purulia Road, Ranchi.',
            'section_2_image'   => '',
            'section_2_img_alt' => 'Formation Centres in Ranchi Province',
            'meta_title'        => 'Formation Ministry | Franciscan Society TOR Ranchi',
            'meta_description'  => 'Formation ministry of the Franciscan TOR Ranchi Province: seminaries, postulancy, novitiate, and religious studies.',
            'meta_keywords'     => 'Formation ministry, Franciscan seminaries, religious vocations, Ranchi',
            'meta_og_image'     => '',
        ),
        'publications' => array(
            'hero_badge'        => 'PROVINCIAL CHRONICLES',
            'hero_title'        => 'PUBLICATIONS',
            'hero_subtitle'     => '',
            'hero_image'        => '',
            'section_title'     => 'ARTICLES & RESEARCH',
            'section_subtitle'  => 'Scholarly papers, theological treatises, and peer-reviewed publications authored by our Franciscan Friars.',
            'publications_list' => array(
                array(
                    'id'           => 'pub_6',
                    'day'          => '11',
                    'month_year'   => 'MAY 2017',
                    'image'        => defined( 'FRANCISCAN_THEME_URI' ) ? FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_24_08_PM.png' : '',
                    'image_alt'    => 'Farmer suicide in India biotechnology research',
                    'title'        => 'Farmer-suicide in India: debating the role of biotechnology',
                    'subtitle'     => 'Indian Biotech opponents have attributed the increase of suicides to the monopolization of GM seeds, centering on patent control, application of terminator technology, marketing strategy, and increased production costs.',
                    'meta_info'    => 'National Library of Medicine (PubMed: 28497354) • Peer-Reviewed Paper',
                    'link_type'    => 'link',
                    'file_url'     => 'https://pubmed.ncbi.nlm.nih.gov/28497354/',
                    'button_label' => 'VIEW ARTICLE',
                ),
                array(
                    'id'           => 'pub_1',
                    'day'          => '20',
                    'month_year'   => 'AUG 2026',
                    'image'        => defined( 'FRANCISCAN_THEME_URI' ) ? FRANCISCAN_THEME_URI . '/assets/images/gallery/between-post-critical-pedagogy.jpg' : '',
                    'image_alt'    => 'Between Post-Critical Pedagogy and Critical Theory',
                    'title'        => 'Between Post-Critical Pedagogy and Critical Theory: An Educational Response to the Post-Truth Phenomenon',
                    'subtitle'     => 'This article examines cogently what educational strategy is the most appropriate in the climate of truth crisis with rising polarization encountered in the post-truth world.',
                    'meta_info'    => 'Educational Philosophy & Critical Pedagogy • PDF Document',
                    'link_type'    => 'pdf',
                    'file_url'     => defined( 'FRANCISCAN_THEME_URI' ) ? FRANCISCAN_THEME_URI . '/assets/pdf/between-post-critical-pedagogy-and-critical-theory.pdf' : '',
                    'button_label' => 'VIEW PDF',
                ),
                array(
                    'id'           => 'pub_2',
                    'day'          => '05',
                    'month_year'   => 'MAY - AUG 2025',
                    'image'        => defined( 'FRANCISCAN_THEME_URI' ) ? FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 10.18.29 AM.jpeg' : '',
                    'image_alt'    => 'Pope Francis Teachings on Marriage and Family',
                    'title'        => 'Jnanadeepa: Pune Journal of Religious Studies',
                    'subtitle'     => 'Pope Francis’ Teachings on Marriage and Family',
                    'meta_info'    => 'Religious Studies & Theology • PDF Document',
                    'link_type'    => 'pdf',
                    'file_url'     => defined( 'FRANCISCAN_THEME_URI' ) ? FRANCISCAN_THEME_URI . '/assets/pdf/jnanadeepa-may-aug-2025.pdf' : '',
                    'button_label' => 'VIEW PDF',
                ),
                array(
                    'id'           => 'pub_3',
                    'day'          => '15',
                    'month_year'   => 'MAY - AUG 2025',
                    'image'        => defined( 'FRANCISCAN_THEME_URI' ) ? FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.42.19 AM (3).jpeg' : '',
                    'image_alt'    => 'Pastoral Conversion in Shaping Pastoral Ministry',
                    'title'        => 'Jnanadeepa: Pune Journal of Religious Studies',
                    'subtitle'     => 'The Central Role of Pastoral Conversion in Shaping Pastoral Ministry',
                    'meta_info'    => 'Fr. Gijesh Thomas Meckal, TOR • Vol. 29/2',
                    'link_type'    => 'pdf',
                    'file_url'     => defined( 'FRANCISCAN_THEME_URI' ) ? FRANCISCAN_THEME_URI . '/assets/pdf/jnanadeepa-may-aug-2025-pastoral-conversion.pdf' : '',
                    'button_label' => 'VIEW PDF',
                ),
                array(
                    'id'           => 'pub_4',
                    'day'          => '20',
                    'month_year'   => 'SEP - DEC 2025',
                    'image'        => defined( 'FRANCISCAN_THEME_URI' ) ? FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.42.19 AM (2).jpeg' : '',
                    'image_alt'    => 'Harmonizing Human Welfare and Intrinsic Value',
                    'title'        => 'Jnanadeepa: Pune Journal of Religious Studies',
                    'subtitle'     => 'Harmonizing Human Welfare and Intrinsic Value: Hierarchical Theology in Catholic Eco-Theology',
                    'meta_info'    => 'Fr. Gijesh Thomas Meckal, TOR • Vol. 29/3',
                    'link_type'    => 'pdf',
                    'file_url'     => defined( 'FRANCISCAN_THEME_URI' ) ? FRANCISCAN_THEME_URI . '/assets/pdf/jnanadeepa-oct-dec-2025-eco-theology.pdf' : '',
                    'button_label' => 'VIEW PDF',
                ),
                array(
                    'id'           => 'pub_5',
                    'day'          => '01',
                    'month_year'   => 'JAN - JUN 2026',
                    'image'        => defined( 'FRANCISCAN_THEME_URI' ) ? FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1157.JPG' : '',
                    'image_alt'    => 'Word and Worship Theological Perspectives',
                    'title'        => 'Word & Worship: Journal of Pastoral Liturgy & Catechetics',
                    'subtitle'     => 'The Poor as Sacrament of Divine Encounter: Liberationist and Thomistic Perspectives',
                    'meta_info'    => 'Fr. Gijesh Thomas Meckal, TOR • Vol. 59, No. 1',
                    'link_type'    => 'pdf',
                    'file_url'     => defined( 'FRANCISCAN_THEME_URI' ) ? FRANCISCAN_THEME_URI . '/assets/pdf/word-and-worship-2026.pdf' : '',
                    'button_label' => 'VIEW PDF',
                ),
                array(
                    'id'           => 'pub_7',
                    'day'          => '21',
                    'month_year'   => 'DEC 2022',
                    'image'        => defined( 'FRANCISCAN_THEME_URI' ) ? ( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.42.19 AM (3).jpeg' ) : '',
                    'image_alt'    => 'സിനഡാത്മകസഭയും ലൈംഗികവ്യക്തിയെ സംബന്ധിച്ച തിരുസഭാപഠനങ്ങളും',
                    'title'        => 'സിനഡാത്മകസഭയും ലൈംഗികവ്യക്തിയെ സംബന്ധിച്ച തിരുസഭാപഠനങ്ങളും സഭാപരമായി പാർശ്വവൽക്കരിക്കപ്പെട്ടവരുടെ ദീനസ്വരങ്ങളും: ഒരു ദൈവശാസ്ത്ര വിശകലനം',
                    'subtitle'     => 'പാർശ്വവൽക്കരിക്കപ്പെട്ട ജനസമൂഹത്തിന്റെ വിലാപങ്ങളിലൂടെ ആത്മാവ് സഭയിൽ സംസാരിക്കുന്നു. ആ സ്വരങ്ങൾക്ക് ചെവി കൊടുക്കുവാൻ സിനഡാത്മകസഭയോടുള്ള ഫ്രാൻസിസ് പാപ്പയുടെ ആഹ്വാനമാണ് ‘സെൻസസ് ഫിദെയ്’ക്ക് ചെവികൊടുക്കുക എന്നതിന്റെ അർത്ഥം.',
                    'meta_info'    => 'ഗിജേഷ് തോമസ് മേക്കൽ* • ജീവധാര ഡിസംബർ 2022',
                    'link_type'    => 'pdf',
                    'file_url'     => defined( 'FRANCISCAN_THEME_URI' ) ? ( FRANCISCAN_THEME_URI . '/assets/pdf/jeevadhara-dec-2022-malayalam.pdf' ) : '',
                    'button_label' => 'VIEW PDF',
                ),
            ),
        ),
        'gallery' => array(
            'hero_badge'    => 'MOMENTS OF GRACE',
            'hero_title'    => 'PHOTO & VIDEO GALLERY',
            'hero_subtitle' => 'Visual chronicles of feast days, ordinations, jubilees, missions, and community living across Ranchi Province.',
            'hero_image'    => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/gallery-banner.jpg',
        ),
        'news' => array(
            'hero_badge'    => 'PROVINCE CHRONICLES',
            'hero_title'    => 'NEWS & UPDATES',
            'hero_subtitle' => 'Stay informed with the latest updates, feast days, community celebrations, and missionary reports.',
            'hero_image'    => '',
        ),
        'blogs' => array(
            'hero_badge'    => 'FRANCISCAN REFLECTIONS',
            'hero_title'    => 'BLOGS & ARTICLES',
            'hero_subtitle' => 'Spiritual reflections, theological essays, and Franciscan wisdom from our friars.',
            'hero_image'    => '',
        ),
        'news_details' => array(
            'hero_badge'    => 'ARTICLE CHRONICLES',
            'hero_title'    => 'NEWS & BLOG DETAILS',
            'hero_subtitle' => 'Read our latest chronicles, Franciscan reflections, and province updates.',
            'hero_image'    => '',
        ),
        'privacy' => array(
            'hero_badge'    => 'LEGAL & PRIVACY',
            'hero_title'    => 'PRIVACY POLICY',
            'hero_subtitle' => 'Learn how we protect and respect your privacy, personal data, and security on our website.',
            'hero_image'    => '',
            'eyebrow'       => 'PRIVACY',
        ),
        'terms' => array(
            'hero_badge'    => 'LEGAL POLICIES',
            'hero_title'    => 'TERMS & CONDITIONS',
            'hero_subtitle' => 'Terms of service, usage guidelines, and legal provisions for franciscanranchi.org.',
            'hero_image'    => '',
            'eyebrow'       => 'LEGAL',
        ),
    );

    if ( ! empty( $slug ) ) {
        return isset( $defaults[ $slug ] ) ? $defaults[ $slug ] : array();
    }

    return $defaults;
}

function franciscan_get_page_content( $slug ) {
    $saved = get_option( 'franciscan_page_' . $slug, array() );
    $defaults = franciscan_get_default_page_content( $slug );
    if ( ! is_array( $saved ) ) {
        $saved = array();
    }
    // Filter out empty string or null values so default values are preserved and prefilled in editor
    $filtered_saved = array();
    foreach ( $saved as $k => $v ) {
        if ( $v !== '' && $v !== null ) {
            $filtered_saved[ $k ] = $v;
        }
    }
    $merged = wp_parse_args( $filtered_saved, $defaults );
    if ( is_array( $merged ) ) {
        foreach ( $merged as $k => $v ) {
            if ( is_string( $v ) ) {
                $merged[ $k ] = stripslashes( $v );
            }
        }
    }
    return $merged;
}

function franciscan_get_page_field( $slug, $field, $fallback = '' ) {
    $data = franciscan_get_page_content( $slug );
    if ( isset( $data[$field] ) && $data[$field] !== '' ) {
        return is_string( $data[$field] ) ? stripslashes( $data[$field] ) : $data[$field];
    }
    $defaults = franciscan_get_default_page_content( $slug );
    if ( isset( $defaults[$field] ) && $defaults[$field] !== '' ) {
        return is_string( $defaults[$field] ) ? stripslashes( $defaults[$field] ) : $defaults[$field];
    }
    return $fallback;
}

function franciscan_update_page_content( $slug, $data ) {
    return update_option( 'franciscan_page_' . $slug, $data );
}

/**
 * Auto-resync legacy database placeholders with 100% exact live frontend content.
 */
function franciscan_resync_legacy_content_options() {
    $all_defaults = franciscan_get_default_page_content();
    if ( is_array( $all_defaults ) ) {
        foreach ( $all_defaults as $slug => $def_values ) {
            $saved = get_option( 'franciscan_page_' . $slug, null );
            if ( empty( $saved ) || ! is_array( $saved ) ) {
                update_option( 'franciscan_page_' . $slug, $def_values );
            } else {
                // If saved option exists, merge missing or empty fields with live defaults
                $clean = array();
                foreach ( $saved as $k => $v ) {
                    if ( $v !== '' && $v !== null ) {
                        $clean[ $k ] = $v;
                    }
                }
                // Resync legacy Prayer Support & Fellowship Groups values to Faith & Trust / Love & Compassion
                if ( isset( $clean['prayer_support_title'] ) && 'PRAYER SUPPORT' === $clean['prayer_support_title'] ) {
                    $clean['prayer_support_title'] = 'FAITH & TRUST';
                    $clean['prayer_support_desc']  = 'We place our faith in God and trust His guidance in every aspect of our ministry.';
                }
                if ( isset( $clean['fellowship_title'] ) && 'FELLOWSHIP GROUPS' === $clean['fellowship_title'] ) {
                    $clean['fellowship_title'] = 'LOVE & COMPASSION';
                    $clean['fellowship_desc']  = 'We serve others with genuine love, kindness, compassion, and a heart for those in need.';
                }
                // Resync leadership legacy badge and title
                if ( 'community-leadership' === $slug ) {
                    if ( ! isset( $clean['hero_title'] ) || in_array( $clean['hero_title'], array( 'LEADERSHIP & COUNCILS', 'PROVINCIAL LEADERSHIP' ), true ) ) {
                        $clean['hero_title'] = 'LEADERSHIP';
                    }
                    if ( ! isset( $clean['hero_badge'] ) || in_array( $clean['hero_badge'], array( 'SERVANT LEADERSHIP', 'PROVINCIAL ADMINISTRATION' ), true ) ) {
                        $clean['hero_badge'] = 'To lead is to serve; to be greater is to become lesser.';
                    }
                }
                // Resync legacy about section heading
                if ( in_array( $slug, array( 'home', 'about' ), true ) ) {
                    if ( isset( $clean['about_section_heading'] ) && in_array( $clean['about_section_heading'], array( 'OUR STORY FAITH MISSION AND VISION TOGETHER', 'WALKING TOGETHER IN FAITH, PENANCE, AND SERVICE' ), true ) ) {
                        $clean['about_section_heading'] = 'Our Franciscan Journey';
                    }
                }
                // Resync friars directory title
                if ( 'community-friars' === $slug ) {
                    if ( ! isset( $clean['directory_title'] ) || in_array( $clean['directory_title'], array( 'OUR FRIARS', 'FRIARS IN COMMUNITY' ), true ) ) {
                        $clean['directory_title'] = 'Brothers always be mindful that they should desire one thing alone, namely, the Spirit of God at work within them';
                    }
                }
                // Resync history heritage title
                if ( 'community-history' === $slug ) {
                    if ( ! isset( $clean['heritage_title'] ) || in_array( $clean['heritage_title'], array( 'A LEGACY OF FAITH AND SERVICE' ), true ) ) {
                        $clean['heritage_title'] = 'The Lord Himself led me among them';
                    }
                }
                // Resync friaries overview title
                if ( 'community-friaries' === $slug ) {
                    if ( ! isset( $clean['friaries_overview_title'] ) || in_array( $clean['friaries_overview_title'], array( 'OUR FRIARIES' ), true ) ) {
                        $clean['friaries_overview_title'] = 'The Lord gave me brothers.';
                    }
                }
                // Resync ministry banner subtitles
                if ( 'ministries-pastoral' === $slug ) {
                    if ( empty( $clean['hero_subtitle'] ) ) {
                        $clean['hero_subtitle'] = "“The brothers should rejoice when they live among people who are considered of little worth and who are despised.”\n— St. Francis of Assisi, Earlier Rule, Ch. IX";
                    }
                }
                if ( 'ministries-education' === $slug ) {
                    if ( empty( $clean['hero_subtitle'] ) ) {
                        $clean['hero_subtitle'] = "“Where there is charity and wisdom, there is neither fear nor ignorance.”";
                    }
                }
                if ( 'ministries-formation' === $slug ) {
                    if ( empty( $clean['hero_subtitle'] ) ) {
                        $clean['hero_subtitle'] = "“The Most High Himself revealed to me that I should live according to the pattern of the Holy Gospel.”\n— St. Francis of Assisi, Testament";
                    }
                }
                // Resync Third Order Rule page
                if ( 'community-rule' === $slug ) {
                    if ( empty( $clean['hero_badge'] ) || 'SPIRITUAL FOUNDATION' === $clean['hero_badge'] ) {
                        $clean['hero_badge'] = 'OUR RULE… OUR LIFE';
                    }
                    if ( empty( $clean['hero_title'] ) || 'RULE & CONSTITUTIONS' === $clean['hero_title'] ) {
                        $clean['hero_title'] = 'THIRD ORDER REGULAR RULE';
                    }
                    if ( empty( $clean['hero_subtitle'] ) || 'Rooted in Franciscan spirituality and commitment to Christ-centered living.' === $clean['hero_subtitle'] ) {
                        $clean['hero_subtitle'] = 'Discovering the authentic meaning of Franciscan life';
                    }
                    if ( empty( $clean['prologue_title'] ) ) {
                        $clean['prologue_badge']     = $def_values['prologue_badge'] ?? 'PROLOGUE TO THE RULE';
                        $clean['prologue_title']     = $def_values['prologue_title'] ?? 'Third Order Regular Rule';
                        $clean['prologue_subtitle']  = $def_values['prologue_subtitle'] ?? 'The Beginning of the Rule and the Life of the Brothers and Sisters of the Third Order Regular of St. Francis';
                        $clean['prologue_p1']        = $def_values['prologue_p1'] ?? '';
                        $clean['prologue_p2']        = $def_values['prologue_p2'] ?? '';
                        $clean['emblem_image']       = $def_values['emblem_image'] ?? '';
                        $clean['emblem_title']       = $def_values['emblem_title'] ?? 'Third Order Regular';
                        $clean['emblem_subtitle']    = $def_values['emblem_subtitle'] ?? 'Province of St. Francis of Assisi';
                        $clean['proclamation_text']  = $def_values['proclamation_text'] ?? 'IN THE NAME OF THE LORD! HERE BEGINS THE RULE AND LIFE OF THE BROTHERS AND SISTERS OF THE THIRD ORDER REGULAR OF ST. FRANCIS';
                        $clean['directory_badge']    = $def_values['directory_badge'] ?? 'THE CHAPTERS';
                        $clean['directory_title']    = $def_values['directory_title'] ?? 'Rule of the Third Order Regular';
                        $clean['directory_subtitle'] = $def_values['directory_subtitle'] ?? 'Click on any chapter to open the interactive reading window';
                    }
                    if ( empty( $clean['chapters_list'] ) || ! is_array( $clean['chapters_list'] ) ) {
                        $clean['chapters_list'] = $def_values['chapters_list'] ?? array();
                    }
                }
                // Resync publications page
                if ( 'publications' === $slug ) {
                    $clean['hero_title']    = 'PUBLICATIONS';
                    $clean['hero_subtitle'] = '';
                    if ( ! empty( $clean['publications_list'] ) && is_array( $clean['publications_list'] ) ) {
                        $farmer_items = array();
                        $other_items  = array();
                        foreach ( $clean['publications_list'] as $p_item ) {
                            if ( isset( $p_item['meta_info'] ) ) {
                                $p_item['meta_info'] = str_ireplace(
                                    array( 'Fr. Gigesh Thomas Meckel, TOR', 'Fr. Gigesh Meckel, TOR', 'Gigesh Meckel', 'Jijesh Thomas Mekal', 'Gigesh Thomas Meckel', 'Jijesh Thomas Meckel' ),
                                    'Fr. Gijesh Thomas Meckal, TOR',
                                    $p_item['meta_info']
                                );
                            }
                            if ( false !== stripos( $p_item['title'] ?? '', 'Farmer-suicide' ) ) {
                                $farmer_items[] = $p_item;
                            } else {
                                $other_items[] = $p_item;
                            }
                        }
                        $clean['publications_list'] = array_merge( $farmer_items, $other_items );
                    }
                }
                // Resync banner images if empty or containing placeholder
                $banner_migrations = array(
                    'community-history'    => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/history-banner.jpeg',
                    'gallery'              => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/gallery-banner.jpg',
                    'ministries-pastoral'  => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/pastoral-ministry-banner.jpg',
                    'ministries-education' => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/education-ministry-banner.jpg',
                    'community-rule'       => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/third-rule-banner.jpg',
                    'contact'              => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/contact-banner.jpg',
                    'community-friars'     => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/friars-banner.jpg',
                    'community-friaries'   => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/friaries-banner.jpg',
                    'community-leadership' => FRANCISCAN_THEME_URI . '/assets/images/new_uploads/leadership-banner.jpg',
                );
                if ( isset( $banner_migrations[ $slug ] ) ) {
                    if ( empty( $clean['hero_image'] ) || false !== strpos( $clean['hero_image'], 'ChatGPT_Image' ) || false !== strpos( $clean['hero_image'], 'church-bg.jpg' ) ) {
                        $clean['hero_image'] = $banner_migrations[ $slug ];
                    }
                }
                $merged = wp_parse_args( $clean, $def_values );
                update_option( 'franciscan_page_' . $slug, $merged );
            }
        }
    }

    // Ensure theme global options (including SMTP credentials) are populated
    $default_theme_opts = franciscan_get_default_options();
    $saved_theme_opts   = get_option( 'franciscan_theme_options', array() );
    if ( ! is_array( $saved_theme_opts ) ) {
        $saved_theme_opts = array();
    }
    $clean_opts = array();
    foreach ( $saved_theme_opts as $k => $v ) {
        if ( $v !== '' && $v !== null ) {
            $clean_opts[ $k ] = $v;
        }
    }
    $merged_opts = wp_parse_args( $clean_opts, $default_theme_opts );

    // Migrate any legacy email addresses or test passwords to new active credentials
    if ( isset( $merged_opts['receiving_email'] ) && in_array( $merged_opts['receiving_email'], array( 'abbhiram@intersmart.in', 'abhiram@intersmart.in', '' ), true ) ) {
        $merged_opts['receiving_email'] = 'sectorranchi09@gmail.com';
    }
    if ( isset( $merged_opts['smtp_recipient_email'] ) && in_array( $merged_opts['smtp_recipient_email'], array( 'abbhiram@intersmart.in', 'abhiram@intersmart.in', '' ), true ) ) {
        $merged_opts['smtp_recipient_email'] = 'sectorranchi09@gmail.com';
    }
    if ( isset( $merged_opts['smtp_email'] ) && in_array( $merged_opts['smtp_email'], array( 'abbhiram@intersmart.in', 'abhiram@intersmart.in', '' ), true ) ) {
        $merged_opts['smtp_email'] = 'sectorranchi09@gmail.com';
    }
    if ( isset( $merged_opts['smtp_app_password'] ) && in_array( $merged_opts['smtp_app_password'], array( 'ltndjrnpiylptwsv', '' ), true ) ) {
        $merged_opts['smtp_app_password'] = 'jvvb fhvb xods okst';
    }
    // Always enable SMTP delivery
    $merged_opts['smtp_enabled'] = '1';

    // Migrate contact phone, email, and address
    if ( ! isset( $merged_opts['contact_phone'] ) || in_array( $merged_opts['contact_phone'], array( '+91 94311 00000', '9431100000', '' ), true ) ) {
        $merged_opts['contact_phone'] = '+91 95726 35314';
    }
    if ( ! isset( $merged_opts['contact_email'] ) || in_array( $merged_opts['contact_email'], array( 'info@franciscansociety.org', '' ), true ) ) {
        $merged_opts['contact_email'] = 'sectorranchi09@gmail.com';
    }
    $merged_opts['whatsapp_number'] = '919572635314';
    $merged_opts['address_text']    = "Franciscan Ashram (Provincial Residence)\nP.O. Harmu Housing Colony, Ranchi – 834002, JHARKHAND";

    update_option( 'franciscan_theme_options', $merged_opts );
}
add_action( 'init', 'franciscan_resync_legacy_content_options' );
add_action( 'admin_init', 'franciscan_resync_legacy_content_options' );


/**
 * Retrieve curated/custom gallery items.
 */
function franciscan_get_gallery_items() {
    $custom = get_option( 'franciscan_custom_gallery', false );
    if ( false !== $custom && is_array( $custom ) ) {
        return $custom;
    }

    // Default 74 verified theme gallery photos
    $gallery_dir = get_template_directory() . '/assets/images/gallery/';
    $items = array();
    $categories = array( 'Formation Ministry', 'Education Ministry', 'Pastoral Ministry' );

    if ( is_dir( $gallery_dir ) ) {
        $files = scandir( $gallery_dir );
        $idx = 0;
        foreach ( $files as $f ) {
            if ( in_array( strtolower( pathinfo( $f, PATHINFO_EXTENSION ) ), array( 'jpg', 'jpeg', 'png', 'webp' ) ) && strpos( $f, '.' ) !== 0 && stripos( $f, 'pedagogy' ) === false ) {
                $cat = $categories[$idx % count( $categories )];
                $items[] = array(
                    'id'       => 'default_' . $idx,
                    'src'      => FRANCISCAN_THEME_URI . '/assets/images/gallery/' . rawurlencode( $f ),
                    'filename' => $f,
                    'alt'      => $cat,
                    'category' => $cat,
                );
                $idx++;
            }
        }
    }
    return $items;
}

function franciscan_save_gallery_items( $items ) {
    return update_option( 'franciscan_custom_gallery', $items );
}

/**
 * Retrieve curated/custom publications list.
 */
function franciscan_get_publications_list() {
    $data = franciscan_get_page_content( 'publications' );
    if ( isset( $data['publications_list'] ) && is_array( $data['publications_list'] ) && ! empty( $data['publications_list'] ) ) {
        return array_values( $data['publications_list'] );
    }
    $defaults = franciscan_get_default_page_content( 'publications' );
    if ( isset( $defaults['publications_list'] ) && is_array( $defaults['publications_list'] ) && ! empty( $defaults['publications_list'] ) ) {
        return array_values( $defaults['publications_list'] );
    }
    return array();
}

function franciscan_save_publications_list( $items ) {
    $current = get_option( 'franciscan_page_publications', array() );
    if ( ! is_array( $current ) ) {
        $current = array();
    }
    $current['publications_list'] = is_array( $items ) ? array_values( $items ) : array();
    return update_option( 'franciscan_page_publications', $current );
}

/**
 * Retrieve curated/custom Third Order Rule chapters list.
 */
function franciscan_get_rule_chapters() {
    $data = franciscan_get_page_content( 'community-rule' );
    if ( isset( $data['chapters_list'] ) && is_array( $data['chapters_list'] ) && ! empty( $data['chapters_list'] ) ) {
        return array_values( $data['chapters_list'] );
    }
    $defaults = franciscan_get_default_page_content( 'community-rule' );
    if ( isset( $defaults['chapters_list'] ) && is_array( $defaults['chapters_list'] ) && ! empty( $defaults['chapters_list'] ) ) {
        return array_values( $defaults['chapters_list'] );
    }
    return array();
}

function franciscan_save_rule_chapters( $chapters ) {
    $current = get_option( 'franciscan_page_community-rule', array() );
    if ( ! is_array( $current ) ) {
        $current = array();
    }
    $current['chapters_list'] = is_array( $chapters ) ? array_values( $chapters ) : array();
    return update_option( 'franciscan_page_community-rule', $current );
}



