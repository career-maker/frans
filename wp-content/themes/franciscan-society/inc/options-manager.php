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
        'smtp_enabled'          => '1',
        'smtp_host'             => 'smtp.gmail.com',
        'smtp_port'             => '587',
        'smtp_encryption'       => 'tls',
        'smtp_email'            => 'abbhiram@intersmart.in',
        'smtp_app_password'     => 'ltndjrnpiylptwsv',
        'smtp_from_name'        => 'Franciscan Society Ranchi Province',
        'smtp_recipient_email'  => 'abbhiram@intersmart.in',
        'receiving_email'       => 'abbhiram@intersmart.in',
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

/**
 * Default Page Contents for Franciscan Studio (Live In-Place Site Editor)
 */
function franciscan_get_default_page_content( $slug = '' ) {
    $defaults = array(
        'home' => array(
            // Hero
            'hero_badge'        => 'THIRD ORDER REGULAR OF ST. FRANCIS',
            'hero_title'        => "WALKING IN PEACE\nSERVED IN GOD'S LOVE",
            'hero_subtitle'     => 'Conversion, contemplation, poverty, and humility lie at the heart of Franciscan identity. Walking together in penance, peace, and service across Ranchi, Jharkhand, and global missions.',
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
            'welcome_section_text'   => 'We warmly welcome you to the official digital portal of the Franciscan Society, Third Order Regular (TOR), Province of St. Francis, Ranchi. Rooted in the spirit of St. Francis of Assisi, our brotherhood is devoted to living the Gospel through prayer, contemplation, fraternity, and dedicated service across Jharkhand, India, and global missions.',
            'welcome_mosaic_img'     => '',

            // Section 3: About
            'about_eyebrow'          => 'ABOUT US',
            'about_section_heading'  => 'OUR STORY FAITH MISSION AND VISION TOGETHER',
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
            'prayer_support_title'   => 'PRAYER SUPPORT',
            'prayer_support_desc'    => 'Our Prayer Support accompanies you in faith during every stage of life.',
            'fellowship_title'       => 'FELLOWSHIP GROUPS',
            'fellowship_desc'        => 'Join our vibrant fellowship groups and grow together in faith and community.',
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
            'about_eyebrow'          => 'ABOUT US',
            'about_section_heading'  => 'OUR STORY FAITH MISSION AND VISION TOGETHER',
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

            // Values & Mission
            'mission_eyebrow'        => 'Our Values',
            'mission_values_heading' => 'OUR CHRISTIAN VALUES THAT LEAD OUR MINISTRY',
            'mission_values_text'    => 'Our Christian values are the foundation of everything we do as a church. Guided by faith, love, compassion, and integrity, we are committed to serving God.',
            'prayer_support_title'   => 'PRAYER SUPPORT',
            'prayer_support_desc'    => 'Our Prayer Support accompanies you in faith during every stage of life.',
            'fellowship_title'       => 'FELLOWSHIP GROUPS',
            'fellowship_desc'        => 'Join our vibrant fellowship groups and grow together in faith and community.',
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
            'hero_image'             => '',
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
            'hero_image'             => '',
            'heritage_badge'         => 'OUR HERITAGE',
            'heritage_title'         => 'A LEGACY OF FAITH AND SERVICE',
            'heritage_text'          => 'Tracing our origins from the ancient 4th-century Order of Penance, to St. Francis of Assisi, to thirty years of dedicated growth in Ranchi Province.',
            'era1_badge'             => 'ORIGINS & ROOTS',
            'era1_title'             => 'The Order of Penance & St. Francis of Assisi',
            'era1_p1'                => 'The Third Order Regular (TOR) of St. Francis traces its origins to the ancient Order of Penance, which dates back to the fourth century AD. Men and women voluntarily embraced lives of penance for the sake of the Kingdom of God and their own spiritual growth.',
            'era1_p2'                => 'During his early conversion experience, St. Francis of Assisi (1181–1226) became associated with the Order of Penance, an itinerant movement known as the Penitents of Assisi. He addressed them through an Exhortation, encouraging them to lead holy lives of penance.',
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
            'hero_badge'             => 'SPIRITUAL FOUNDATION',
            'hero_title'             => 'RULE & CONSTITUTIONS',
            'hero_subtitle'          => 'Rooted in Franciscan spirituality and commitment to Christ-centered living.',
            'hero_image'             => '',
            'rule_card_badge'        => 'THIRD ORDER RULE',
            'rule_card_title'        => 'GUIDING PRINCIPLES OF OUR FAITH',
            'rule_card_text'         => 'Rooted in Franciscan spirituality and commitment to Christ-centered living.',
            'rule_section_title'     => 'THE FRANCISCAN RULE',
            'rule_section_text'      => 'The Rule of the Third Order Regular provides the spiritual and practical framework for our community life. It calls us to live the Gospel values of poverty, humility, obedience, and love—rooted in the charism of St. Francis of Assisi.',
            'core_principles_title'  => 'CORE PRINCIPLES',
            'living_rule_title'      => 'LIVING THE RULE TODAY',
            'living_rule_text'       => 'Our community strives to embody these principles through daily practice, community life, and active ministry. The Rule guides us toward peace, joy, and authentic Christian witness in our modern world.',
            'inquiry_title'          => 'LEARN MORE',
            'inquiry_text'           => 'Explore the spiritual depth and wisdom of Franciscan living.',
            'inquiry_btn_text'       => 'INQUIRE',
            'inquiry_btn_url'        => '/contact/#enquiry',
        ),
        'community-leadership' => array(
            'hero_badge'             => 'SERVANT LEADERSHIP',
            'hero_title'             => 'LEADERSHIP & COUNCILS',
            'hero_subtitle'          => 'Guiding the Province in fraternity, governance, and mission.',
            'hero_image'             => '',
            'general_council_badge'  => 'GENERAL COUNCIL',
            'general_council_title'  => 'LEADERSHIP OF THE ORDER',
            'provincial_council_badge'=> 'PROVINCIAL COUNCIL',
            'provincial_council_title'=> 'RANCHI PROVINCE LEADERSHIP',
        ),
        'community-friars' => array(
            'hero_badge'             => 'OUR BROTHERHOOD',
            'hero_title'             => 'OUR FRIARS',
            'hero_subtitle'          => 'Brothers serving in prayer, fraternity, and active apostolates across Ranchi Province and beyond.',
            'hero_image'             => '',
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
            'roster_note'            => 'Complete list includes 100+ professed friars serving across India and abroad.',
        ),
        'community-friaries' => array(
            'hero_badge'             => 'OUR HOMES',
            'hero_title'             => 'OUR FRIARIES & ASHRAMS',
            'hero_subtitle'          => 'Centres of prayer, hospitality, and apostolate across India and Germany.',
            'hero_image'             => '',
            'section_eyebrow'        => 'OUR HOMES',
            'section_title'          => 'FRIARIES ACROSS INDIA',
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
            'hero_subtitle' => 'Visual chronicles of feast days, ordinations, jubilees, missions, and community living across Ranchi Province.',
            'hero_image'    => '',
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
        'contact' => array(
            'hero_badge'    => 'GET IN TOUCH',
            'hero_title'    => 'CONTACT US',
            'hero_subtitle' => 'We welcome your inquiries, prayer intentions, and pastoral visits.',
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
    update_option( 'franciscan_theme_options', $merged_opts );
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

