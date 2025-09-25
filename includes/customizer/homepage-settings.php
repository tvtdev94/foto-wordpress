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
    // Hero Content Section - All text elements in one place
    $wp_customize->add_section('hero_content', array(
        'title' => 'Hero Content',
        'priority' => 31,
        'description' => 'Edit all text elements displayed in the hero section',
    ));

    // Top Badge (above title)
    $wp_customize->add_setting('hero_badge_text', array(
        'default' => 'Ảnh BĐS • Virtual Staging • Floor Plan',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge_text', array(
        'label' => '📝 Top Badge Text',
        'section' => 'hero_content',
        'type' => 'text',
        'priority' => 10,
        'description' => 'Small badge text above the main title',
    ));

    // Main Title Parts
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Biến ảnh thô thành',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label' => '🏆 Main Title (Part 1)',
        'section' => 'hero_content',
        'type' => 'text',
        'priority' => 20,
        'description' => 'First part of the main title',
    ));

    $wp_customize->add_setting('hero_title_highlight', array(
        'default' => 'tác phẩm bán hàng',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title_highlight', array(
        'label' => '🎯 Main Title (Part 2 - Highlighted)',
        'section' => 'hero_content',
        'type' => 'text',
        'priority' => 30,
        'description' => 'Second part of main title (colored/highlighted)',
    ));

    // Description
    $wp_customize->add_setting('hero_description', array(
        'default' => 'Đối tác hậu kỳ đáng tin cậy cho nhiếp ảnh BĐS: HDR/Flambient, xóa vật thể, sky replacement, twilight, virtual staging, video ngắn & sơ đồ mặt bằng.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_description', array(
        'label' => '📄 Hero Description',
        'section' => 'hero_content',
        'type' => 'textarea',
        'priority' => 40,
        'description' => 'Main description text below the title',
    ));

    // Action Buttons
    $wp_customize->add_setting('hero_button1_text', array(
        'default' => 'Bắt đầu ngay',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_button1_text', array(
        'label' => '🔵 Primary Button Text',
        'section' => 'hero_content',
        'type' => 'text',
        'priority' => 50,
        'description' => 'Main call-to-action button',
    ));

    $wp_customize->add_setting('hero_button2_text', array(
        'default' => 'Xem dịch vụ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_button2_text', array(
        'label' => '⚪ Secondary Button Text',
        'section' => 'hero_content',
        'type' => 'text',
        'priority' => 60,
        'description' => 'Secondary action button',
    ));

    // Feature Badges (below buttons)
    $wp_customize->add_setting('hero_badge1', array(
        'default' => '⚡ Turnaround 12–24h',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge1', array(
        'label' => '🏷️ Feature Badge 1',
        'section' => 'hero_content',
        'type' => 'text',
        'priority' => 70,
        'description' => 'First feature highlight badge',
    ));

    $wp_customize->add_setting('hero_badge2', array(
        'default' => '🛡️ QC 2 lớp',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge2', array(
        'label' => '🏷️ Feature Badge 2',
        'section' => 'hero_content',
        'type' => 'text',
        'priority' => 80,
        'description' => 'Second feature highlight badge',
    ));

    $wp_customize->add_setting('hero_badge3', array(
        'default' => '🌍 Khách hàng AU/US',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge3', array(
        'label' => '🏷️ Feature Badge 3',
        'section' => 'hero_content',
        'type' => 'text',
        'priority' => 90,
        'description' => 'Third feature highlight badge',
    ));

    // Contact Info Section
    $wp_customize->add_section('contact_info', array(
        'title' => 'Contact Information',
        'priority' => 30,
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

    // Services Section Content
    $wp_customize->add_section('services_content', array(
        'title' => 'Services Section',
        'priority' => 33,
    ));

    $wp_customize->add_setting('services_title', array(
        'default' => 'Dịch vụ của chúng tôi',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_title', array(
        'label' => 'Services Section Title',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('services_subtitle', array(
        'default' => 'Tối ưu cho nhiếp ảnh BĐS: chất lượng nhất quán, quy trình rõ ràng, chi phí hợp lý.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_subtitle', array(
        'label' => 'Services Section Subtitle',
        'section' => 'services_content',
        'type' => 'textarea',
    ));

    // Before/After Section Content
    $wp_customize->add_section('beforeafter_content', array(
        'title' => 'Before/After Section',
        'priority' => 36,
    ));

    $wp_customize->add_setting('beforeafter_title', array(
        'default' => 'Before / After',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('beforeafter_title', array(
        'label' => 'Before/After Section Title',
        'section' => 'beforeafter_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('beforeafter_subtitle', array(
        'default' => 'Kéo thanh trượt để xem khác biệt.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('beforeafter_subtitle', array(
        'label' => 'Before/After Section Subtitle',
        'section' => 'beforeafter_content',
        'type' => 'textarea',
    ));

    // Gallery Section Content
    $wp_customize->add_section('gallery_content', array(
        'title' => 'Gallery Section',
        'priority' => 34,
    ));

    $wp_customize->add_setting('gallery_title', array(
        'default' => 'Gallery',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('gallery_title', array(
        'label' => 'Gallery Section Title',
        'section' => 'gallery_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('gallery_subtitle', array(
        'default' => 'Một vài ảnh minh họa phong cách xử lý.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('gallery_subtitle', array(
        'label' => 'Gallery Section Subtitle',
        'section' => 'gallery_content',
        'type' => 'textarea',
    ));

    // Pricing Section Content
    $wp_customize->add_section('pricing_content', array(
        'title' => 'Pricing Section',
        'priority' => 37,
    ));

    $wp_customize->add_setting('pricing_title', array(
        'default' => 'Bảng giá minh họa',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('pricing_title', array(
        'label' => 'Pricing Section Title',
        'section' => 'pricing_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('pricing_subtitle', array(
        'default' => 'Giá demo để tham khảo. Có thể tùy chỉnh theo khối lượng và yêu cầu.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('pricing_subtitle', array(
        'label' => 'Pricing Section Subtitle',
        'section' => 'pricing_content',
        'type' => 'textarea',
    ));

    // Testimonials Section Content
    $wp_customize->add_section('testimonials_content', array(
        'title' => 'Testimonials Section',
        'priority' => 38,
    ));

    $wp_customize->add_setting('testimonials_title', array(
        'default' => 'Khách hàng nói gì',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonials_title', array(
        'label' => 'Testimonials Section Title',
        'section' => 'testimonials_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('testimonials_subtitle', array(
        'default' => 'Từ agent & studio ở AU/US.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonials_subtitle', array(
        'label' => 'Testimonials Section Subtitle',
        'section' => 'testimonials_content',
        'type' => 'textarea',
    ));

    // CTA Section Content
    $wp_customize->add_section('cta_content', array(
        'title' => 'CTA Section',
        'priority' => 39,
    ));

    $wp_customize->add_setting('cta_title', array(
        'default' => 'Sẵn sàng tăng chất lượng listing của bạn?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_title', array(
        'label' => 'CTA Section Title',
        'section' => 'cta_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('cta_subtitle', array(
        'default' => 'Gửi thử 10 ảnh — nhận kết quả trong 12–24h.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_subtitle', array(
        'label' => 'CTA Section Subtitle',
        'section' => 'cta_content',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('cta_button_text', array(
        'default' => 'Nhận báo giá',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_button_text', array(
        'label' => 'CTA Button Text',
        'section' => 'cta_content',
        'type' => 'text',
    ));

    // Contact Section Content
    $wp_customize->add_section('contact_content', array(
        'title' => 'Contact Section',
        'priority' => 40,
    ));

    $wp_customize->add_setting('contact_title', array(
        'default' => 'Liên hệ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_title', array(
        'label' => 'Contact Section Title',
        'section' => 'contact_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('contact_subtitle', array(
        'default' => 'Cho chúng tôi biết nhu cầu của bạn, team sẽ phản hồi ngay.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_subtitle', array(
        'label' => 'Contact Section Subtitle',
        'section' => 'contact_content',
        'type' => 'textarea',
    ));

    // Header & General Buttons
    $wp_customize->add_section('general_buttons', array(
        'title' => 'Header & General Buttons',
        'priority' => 41,
    ));

    $wp_customize->add_setting('header_button_text', array(
        'default' => 'Nhận báo giá',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('header_button_text', array(
        'label' => 'Header Button Text',
        'section' => 'general_buttons',
        'type' => 'text',
    ));

    // Email Settings Section
    $wp_customize->add_section('email_settings', array(
        'title' => 'Email Settings',
        'priority' => 42,
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