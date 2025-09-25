<?php
/**
 * Homepage Settings Customizer
 * Hero section, contact info, stats, and section titles
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

function foto_services_homepage_customizer($wp_customize) {
    // Homepage Settings Section
    $wp_customize->add_section('homepage_settings', array(
        'title' => 'Homepage Content',
        'priority' => 30,
    ));

    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Biến ảnh thô thành',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label' => 'Hero Title',
        'section' => 'homepage_settings',
        'type' => 'text',
    ));
    $wp_customize->add_setting('hero_title_highlight', array(
        'default' => 'tác phẩm bán hàng',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title_highlight', array(
        'label' => 'Hero Title Highlight (colored part)',
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    // Hero Badge
    $wp_customize->add_setting('hero_badge_text', array(
        'default' => 'Ảnh BĐS • Virtual Staging • Floor Plan',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge_text', array(
        'label' => 'Hero Badge Text',
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    // Hero Description
    $wp_customize->add_setting('hero_description', array(
        'default' => 'Đối tác hậu kỳ đáng tin cậy cho nhiếp ảnh BĐS: HDR/Flambient, xóa vật thể, sky replacement, twilight, virtual staging, video ngắn & sơ đồ mặt bằng.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_description', array(
        'label' => 'Hero Description',
        'section' => 'homepage_settings',
        'type' => 'textarea',
    ));

    // Hero Badges
    $wp_customize->add_setting('hero_badge1', array(
        'default' => '⚡ Turnaround 12–24h',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge1', array(
        'label' => 'Hero Badge 1',
        'section' => 'homepage_settings',
        'type' => 'text',
    ));
    $wp_customize->add_setting('hero_badge2', array(
        'default' => '🛡️ QC 2 lớp',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge2', array(
        'label' => 'Hero Badge 2',
        'section' => 'homepage_settings',
        'type' => 'text',
    ));
    $wp_customize->add_setting('hero_badge3', array(
        'default' => '🌍 Khách hàng AU/US',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge3', array(
        'label' => 'Hero Badge 3',
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    // Contact Info Section
    $wp_customize->add_section('contact_info', array(
        'title' => 'Contact Information',
        'priority' => 31,
    ));

    // Email
    $wp_customize->add_setting('contact_email', array(
        'default' => 'hello@fotoservices.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label' => 'Contact Email',
        'section' => 'contact_info',
        'type' => 'email',
    ));

    // Phone
    $wp_customize->add_setting('contact_phone', array(
        'default' => '+84 90 000 0000',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_phone', array(
        'label' => 'Contact Phone',
        'section' => 'contact_info',
        'type' => 'text',
    ));

    // Website
    $wp_customize->add_setting('contact_website', array(
        'default' => 'www.fotoservices.com',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_website', array(
        'label' => 'Website URL',
        'section' => 'contact_info',
        'type' => 'text',
    ));

    // Stats Section
    $wp_customize->add_section('stats_section', array(
        'title' => 'Statistics Section',
        'priority' => 32,
    ));

    // Stats
    for ($i = 1; $i <= 4; $i++) {
        $defaults = array(
            1 => array('number' => '1.2M+', 'text' => 'Ảnh đã xử lý'),
            2 => array('number' => '12–24h', 'text' => 'Tốc độ giao'),
            3 => array('number' => '99.5%', 'text' => 'Đúng hạn'),
            4 => array('number' => '4.9/5', 'text' => 'Đánh giá TB')
        );

        $wp_customize->add_setting("stat{$i}_number", array(
            'default' => $defaults[$i]['number'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("stat{$i}_number", array(
            'label' => "Stat {$i} Number",
            'section' => 'stats_section',
            'type' => 'text',
        ));
        $wp_customize->add_setting("stat{$i}_text", array(
            'default' => $defaults[$i]['text'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("stat{$i}_text", array(
            'label' => "Stat {$i} Text",
            'section' => 'stats_section',
            'type' => 'text',
        ));
    }

    // Section Titles
    $wp_customize->add_section('section_titles', array(
        'title' => 'Section Titles',
        'priority' => 33,
    ));

    $section_titles = array(
        'services' => array('title' => 'Dịch vụ của chúng tôi', 'subtitle' => 'Tối ưu cho nhiếp ảnh BĐS: chất lượng nhất quán, quy trình rõ ràng, chi phí hợp lý.'),
        'beforeafter' => array('title' => 'Before / After', 'subtitle' => 'Kéo thanh trượt để xem khác biệt.'),
        'gallery' => array('title' => 'Gallery', 'subtitle' => 'Một vài ảnh minh họa phong cách xử lý.'),
        'pricing' => array('title' => 'Bảng giá minh họa', 'subtitle' => 'Giá demo để tham khảo. Có thể tùy chỉnh theo khối lượng và yêu cầu.'),
        'testimonials' => array('title' => 'Khách hàng nói gì', 'subtitle' => 'Từ agent & studio ở AU/US.'),
        'cta' => array('title' => 'Sẵn sàng tăng chất lượng listing của bạn?', 'subtitle' => 'Gửi thử 10 ảnh — nhận kết quả trong 12–24h.'),
        'contact' => array('title' => 'Liên hệ', 'subtitle' => 'Cho chúng tôi biết nhu cầu của bạn, team sẽ phản hồi ngay.')
    );

    foreach ($section_titles as $key => $data) {
        $wp_customize->add_setting("{$key}_title", array(
            'default' => $data['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("{$key}_title", array(
            'label' => ucfirst($key) . ' Section Title',
            'section' => 'section_titles',
            'type' => 'text',
        ));
        $wp_customize->add_setting("{$key}_subtitle", array(
            'default' => $data['subtitle'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("{$key}_subtitle", array(
            'label' => ucfirst($key) . ' Section Subtitle',
            'section' => 'section_titles',
            'type' => 'textarea',
        ));
    }

    // Buttons Section
    $wp_customize->add_section('buttons_content', array(
        'title' => 'Buttons & CTA Text',
        'priority' => 38,
    ));

    $buttons = array(
        'hero_button1_text' => 'Bắt đầu ngay',
        'hero_button2_text' => 'Xem dịch vụ',
        'header_button_text' => 'Nhận báo giá',
        'cta_button_text' => 'Nhận báo giá',
        'pricing_button_text' => 'Chọn gói'
    );

    foreach ($buttons as $key => $default) {
        $wp_customize->add_setting($key, array(
            'default' => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($key, array(
            'label' => str_replace('_', ' ', ucwords(str_replace('_text', '', $key))),
            'section' => 'buttons_content',
            'type' => 'text',
        ));
    }

    // Email Settings Section
    $wp_customize->add_section('email_settings', array(
        'title' => 'Email Settings',
        'priority' => 39,
    ));

    $wp_customize->add_setting('contact_recipient_email', array(
        'default' => get_option('admin_email'),
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_recipient_email', array(
        'label' => 'Contact Form Recipient Email',
        'section' => 'email_settings',
        'type' => 'email',
        'description' => 'Email address to receive contact form submissions',
    ));

    $wp_customize->add_setting('contact_email_subject', array(
        'default' => 'New Contact Form Submission - Foto Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_email_subject', array(
        'label' => 'Email Subject',
        'section' => 'email_settings',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_email_from_name', array(
        'default' => 'Foto Services Website',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_email_from_name', array(
        'label' => 'Email From Name',
        'section' => 'email_settings',
        'type' => 'text',
    ));
}