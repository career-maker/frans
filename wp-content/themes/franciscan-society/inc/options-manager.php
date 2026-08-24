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
        'contact_email'         => 'info@franciscansociety.org',
        'contact_phone'         => '+91 651 234 5678',
        'whatsapp_number'       => '917012649326',
        'address_text'          => "TOR Provincialate, P.O. Box 14, Church Road\nRanchi, Jharkhand 834001, India",
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
        'smtp_enabled'          => '0',
        'smtp_host'             => 'smtp.gmail.com',
        'smtp_port'             => '587',
        'smtp_encryption'       => 'tls',
        'smtp_email'            => '',
        'smtp_app_password'     => '',
        'smtp_from_name'        => 'Franciscan Society Ranchi Province',
        'smtp_recipient_email'  => 'info@franciscansociety.org',
    );
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

// Page content defaults matching live frontend 100%
function franciscan_get_default_page_content( $slug ) {
    $defaults = array(
        'home' => array(
            'hero_badge'        => 'THIRD ORDER REGULAR OF ST. FRANCIS',
            'hero_title'        => "WALKING IN PEACE\nSERVED IN GOD'S LOVE",
            'hero_subtitle'     => 'Conversion, contemplation, poverty, and humility lie at the heart of Franciscan identity. Walking together in penance, peace, and service across Ranchi, Jharkhand, and global missions.',
            'hero_image'        => '',
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
            'welcome_badge'     => 'PEACE & GOOD',
            'welcome_heading'   => 'PAX ET BONUM — WALKING IN THE FOOTSTEPS OF THE POVERELLO',
            'welcome_lead'      => 'For centuries, the Third Order Regular has stood as a beacon of evangelical renewal, embracing the humble life of Jesus Christ through contemplation, fraternity, and active charity.',
            'about_badge'       => 'OUR VALUES',
            'about_heading'     => 'OUR CHRISTIAN VALUES',
            'about_text'        => 'Founded upon the spirit of repentance and Gospel brotherhood, the Ranchi Province of the Franciscan Society continues to expand its apostolates in education, formation, healthcare, and social transformation.',
            'values_heading'    => 'OUR CHRISTIAN VALUES THAT LEAD OUR MINISTRY',
            'values_text'       => 'We walk alongside the poor, educating youth, healing the sick, and preaching the Gospel of peace in humility and joy.',
            'verse_text'        => 'Lord, make me an instrument of your peace. Where there is hatred, let me sow love.',
            'verse_ref'         => 'Prayer of St. Francis',

            // Welcome Section (Section 2)
            'welcome_eyebrow'        => 'WELCOME TO THE FRANCISCAN SOCIETY',
            'welcome_section_heading'=> 'WALKING TOGETHER IN FAITH, PENANCE, AND SERVICE',
            'welcome_section_text'   => 'We warmly welcome you to the official digital portal of the Franciscan Society, Third Order Regular (TOR), Province of St. Francis, Ranchi. Rooted in the spirit of St. Francis of Assisi, our brotherhood is devoted to living the Gospel through prayer, contemplation, fraternity, and dedicated service across Jharkhand, India, and global missions.',

            // About Section (Section 3)
            'about_eyebrow'          => 'ABOUT US',
            'about_section_heading'  => 'OUR STORY FAITH MISSION AND VISION TOGETHER',
            'about_section_text'     => 'The Third Order Regular (TOR) of St. Francis traces its origins to the ancient Order of Penance from the 4th century. Established in Ranchi in 1996 and elevated to a full Province on 20 March 2006.',
            'about_mission_title'    => 'OUR MISSION',
            'about_mission_text'     => 'Serving 15 parishes & 22 schools across Ranchi and global mission fields.',
            'about_vision_title'     => 'OUR VISION',
            'about_vision_text'      => 'Promoting peace, joy, and dignity under "Peace and Joy to the World".',
            'about_provincial_name'  => 'FR. MANOJ VENGATHANAM, TOR',
            'about_provincial_title' => 'Minister Provincial',

            // Mission / Values Section
            'mission_eyebrow'        => 'Our Values',
            'mission_values_heading' => 'OUR CHRISTIAN VALUES THAT LEAD OUR MINISTRY',
            'mission_values_text'    => 'Our Christian values are the foundation of everything we do as a church. Guided by faith, love, compassion, and integrity, we are committed to serving God.',

            // Prayer Support & Fellowship Box
            'prayer_support_title'   => 'PRAYER SUPPORT',
            'prayer_support_desc'    => 'Our Prayer Support accompanies you in faith during every stage of life.',
            'fellowship_title'       => 'FELLOWSHIP GROUPS',
            'fellowship_desc'        => 'Join our vibrant fellowship groups and grow together in faith and community.',

            // Call Us Block
            'call_us_label'          => 'CALL US!',

            // Bible / Word of God Section
            'bible_eyebrow'          => 'WORD OF GOD',
            'bible_quote'            => '"BE STILL AND KNOW THAT I AM GOD."',
            'bible_ref'              => 'Book of Psalms',

            // News Section Header
            'news_eyebrow'           => 'NEWS & EVENTS',
            'news_heading'           => "INSIGHTS AND INSPIRATION FROM\nOUR LATEST NEWS",
        ),
        'about' => array(
            'hero_badge'    => 'WHO WE ARE',
            'hero_title'    => 'ABOUT US',
            'hero_subtitle' => 'Learn about our history, mission, and the Franciscan friars of Ranchi Province.',
            'hero_image'    => '',
        ),
        'community' => array(
            'hero_badge'    => 'OUR BROTHERHOOD',
            'hero_title'    => 'COMMUNITY',
            'hero_subtitle' => 'Fraternity, prayer, and mission across Ranchi Province.',
            'hero_image'    => '',
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
            'hero_image'        => '',
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
            'hero_image'        => '',
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
            'hero_badge'    => 'PROVINCIAL CHRONICLES',
            'hero_title'    => 'PUBLICATIONS & MEDIA',
            'hero_subtitle' => 'Books, newsletters, pastoral letters, and audio-visual releases.',
            'hero_image'    => '',
        ),
        'gallery' => array(
            'hero_badge'    => 'MOMENTS OF GRACE',
            'hero_title'    => 'PHOTO & VIDEO GALLERY',
            'hero_subtitle' => 'Visual chronicles of feast days, ordinations, jubilees, and missions.',
            'hero_image'    => '',
        ),
        'news' => array(
            'hero_badge'    => 'PROVINCE CHRONICLES',
            'hero_title'    => 'NEWS & UPDATES',
            'hero_subtitle' => 'Stay informed with the latest updates, feast days, and missionary reports.',
            'hero_image'    => '',
        ),
        'blogs' => array(
            'hero_badge'    => 'FRANCISCAN REFLECTIONS',
            'hero_title'    => 'BLOGS & ARTICLES',
            'hero_subtitle' => 'Spiritual reflections, theological essays, and Franciscan wisdom.',
            'hero_image'    => '',
        ),
        'news_details' => array(
            'hero_badge'    => 'ARTICLE CHRONICLES',
            'hero_title'    => 'NEWS & BLOG DETAILS',
            'hero_subtitle' => 'Read our latest chronicles, Franciscan reflections, and province updates.',
            'hero_image'    => '',
        ),
        'contact' => array(
            'hero_badge'    => 'GET IN TOUCH',
            'hero_title'    => 'CONTACT US',
            'hero_subtitle' => 'We welcome your inquiries, prayer intentions, and pastoral visits.',
            'hero_image'    => '',
        ),
    );

    return isset( $defaults[$slug] ) ? $defaults[$slug] : array();
}

function franciscan_get_page_content( $slug ) {
    $saved = get_option( 'franciscan_page_' . $slug, array() );
    $defaults = franciscan_get_default_page_content( $slug );
    $merged = wp_parse_args( $saved, $defaults );
    if ( is_array( $merged ) ) {
        foreach ( $merged as $k => $v ) {
            if ( is_string( $v ) ) {
                $merged[$k] = stripslashes( $v );
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
    $home = get_option( 'franciscan_page_home', array() );
    if ( empty( $home ) || ( isset( $home['hero_title'] ) && strpos( $home['hero_title'], 'Called to Rebuild' ) !== false ) ) {
        $exact_defaults = franciscan_get_default_page_content( 'home' );
        update_option( 'franciscan_page_home', $exact_defaults );
    }
}
add_action( 'init', 'franciscan_resync_legacy_content_options' );
add_action( 'admin_init', 'franciscan_resync_legacy_content_options' );


/**
 * Retrieve curated/custom gallery items.
 */
function franciscan_get_gallery_items() {
    $custom = get_option( 'franciscan_custom_gallery', array() );
    if ( ! empty( $custom ) && is_array( $custom ) ) {
        return $custom;
    }

    // Default 74 verified theme gallery photos
    $gallery_dir = get_template_directory() . '/assets/images/gallery/';
    $items = array();
    $categories = array( 'Pastoral Ministry', 'Formation Ministry', 'Provincial Assembly', 'Sacred Ordination', 'Mission Apostolate', 'Community Fellowship', 'Youth Ministry', 'Parish Service' );

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

