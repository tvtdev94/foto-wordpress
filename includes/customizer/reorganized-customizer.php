<?php
/**
 * Reorganized Theme Customizer
 * Menu structure organized by logical groups as requested
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// ========================================
// CUSTOMIZER SECTION PRIORITIES
// ========================================
// Easily manage section order by changing these constants
define('FOTO_PRIORITY_CONTACT_INFO', 10);
define('FOTO_PRIORITY_HEADER_BUTTONS', 15);
define('FOTO_PRIORITY_HERO_SECTION', 20);
define('FOTO_PRIORITY_STATS_SECTION', 25);
define('FOTO_PRIORITY_COMPANY_DESCRIPTION', 30);
define('FOTO_PRIORITY_SERVICES_CONTENT', 35);
define('FOTO_PRIORITY_HOW_IT_WORKS', 40);
define('FOTO_PRIORITY_BEFORE_AFTER_CONTENT', 45);
define('FOTO_PRIORITY_BEFORE_AFTER_IMAGES', 50);
define('FOTO_PRIORITY_GALLERY_SECTION', 55);
define('FOTO_PRIORITY_GALLERY_IMAGES', 60);
define('FOTO_PRIORITY_PRICING_CONTENT', 65);
define('FOTO_PRIORITY_PRICING_SERVICES', 70);
define('FOTO_PRIORITY_PRICING_BOTTOM', 75);
define('FOTO_PRIORITY_TESTIMONIALS_CONTENT', 80);
define('FOTO_PRIORITY_CTA_CONTENT', 85);
define('FOTO_PRIORITY_CONTACT_CONTENT', 90);
define('FOTO_PRIORITY_CONTACT_FORM', 95);
define('FOTO_PRIORITY_EMAIL_SETTINGS', 100);
define('FOTO_PRIORITY_COLOR_SCHEME', 105);
define('FOTO_PRIORITY_LAYOUT_OPTIONS', 110);
define('FOTO_PRIORITY_MENU_SETTINGS', 115);
define('FOTO_PRIORITY_HOMEPAGE_SETTINGS', 120);
define('FOTO_PRIORITY_CUSTOM_CSS', 125);

function foto_services_reorganized_customizer($wp_customize) {
    
    // ========================================
    // 1. CONTACT INFORMATION
    // ========================================
    $wp_customize->add_section('contact_info', array(
        'title' => 'Contact Information',
        'priority' => FOTO_PRIORITY_CONTACT_INFO,
        'description' => 'Thông tin liên hệ cơ bản của website',
    ));

    $wp_customize->add_setting('contact_email', array(
        'default' => 'editingservices.vn@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label' => 'Contact Email',
        'section' => 'contact_info',
        'type' => 'email',
    ));

    $wp_customize->add_setting('contact_phone', array(
        'default' => '+84 949494217',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contact_phone', array(
        'label' => 'Contact Phone',
        'section' => 'contact_info',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_website', array(
        'default' => 'www.foto-services.com',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_website', array(
        'label' => 'Website URL',
        'section' => 'contact_info',
        'type' => 'text',
    ));

    // Social Media URLs
    $wp_customize->add_setting('social_facebook', array(
        'default' => 'https://www.facebook.com/RE.PhotoServices/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_facebook', array(
        'label' => 'Facebook URL',
        'section' => 'contact_info',
        'type' => 'url',
    ));

    $wp_customize->add_setting('social_tiktok', array(
        'default' => 'https://www.tiktok.com/@fotoservices',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_tiktok', array(
        'label' => 'TikTok URL',
        'section' => 'contact_info',
        'type' => 'url',
    ));

    $wp_customize->add_setting('social_instagram', array(
        'default' => 'https://www.instagram.com/fotoservices/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_instagram', array(
        'label' => 'Instagram URL',
        'section' => 'contact_info',
        'type' => 'url',
    ));

    $wp_customize->add_setting('contact_header_text', array(
        'default' => 'Let\'s work together!',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_header_text', array(
        'label' => 'Contact Header Text',
        'section' => 'contact_info',
        'type' => 'text',
        'description' => 'Text hiển thị ở đầu phần liên hệ',
    ));

    // ========================================
    // 2. HEADER & GENERAL BUTTONS
    // ========================================
    $wp_customize->add_section('header_general_buttons', array(
        'title' => 'Header & General Buttons',
        'priority' => FOTO_PRIORITY_HEADER_BUTTONS,
        'description' => 'Cài đặt header và các nút bấm chung',
    ));

    // Navigation Menu Items
    $menu_items = array(
        1 => array('label' => 'Menu Item 1', 'default' => 'Services', 'url' => '#services'),
        2 => array('label' => 'Menu Item 2', 'default' => 'Before/After', 'url' => '#beforeafter'),
        3 => array('label' => 'Menu Item 3', 'default' => 'Gallery', 'url' => '#gallery'),
        4 => array('label' => 'Menu Item 4', 'default' => 'Pricing', 'url' => '#pricing')
    );

    foreach ($menu_items as $num => $item) {
        $wp_customize->add_setting("nav_menu_item{$num}_text", array(
            'default' => $item['default'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("nav_menu_item{$num}_text", array(
            'label' => $item['label'] . ' Text',
            'section' => 'header_general_buttons',
            'type' => 'text',
        ));

        $wp_customize->add_setting("nav_menu_item{$num}_url", array(
            'default' => $item['url'],
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("nav_menu_item{$num}_url", array(
            'label' => $item['label'] . ' URL',
            'section' => 'header_general_buttons',
            'type' => 'text',
            'description' => 'Link URL (e.g., #services or full URL)',
        ));
    }

    $wp_customize->add_setting('header_button_text', array(
        'default' => 'Nhận báo giá',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('header_button_text', array(
        'label' => 'Header Button Text',
        'section' => 'header_general_buttons',
        'type' => 'text',
    ));

    // ========================================
    // 3. HERO SECTION
    // ========================================
    $wp_customize->add_section('hero_section', array(
        'title' => 'Hero Section',
        'priority' => FOTO_PRIORITY_HERO_SECTION,
        'description' => 'Cài đặt nội dung và hình nền cho phần hero',
    ));

    // Top Badge
    $wp_customize->add_setting('hero_badge_text', array(
        'default' => 'Ảnh BĐS • Virtual Staging • Floor Plan',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge_text', array(
        'label' => '📝 Top Badge Text',
        'section' => 'hero_section',
        'type' => 'text',
        'priority' => 10,
    ));

    // Main Title Parts
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Biến ảnh thô thành',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label' => '🏆 Main Title (Part 1)',
        'section' => 'hero_section',
        'type' => 'text',
        'priority' => 20,
    ));

    $wp_customize->add_setting('hero_title_highlight', array(
        'default' => 'tác phẩm bán hàng',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title_highlight', array(
        'label' => '🎯 Main Title (Part 2 - Highlighted)',
        'section' => 'hero_section',
        'type' => 'text',
        'priority' => 30,
    ));

    // Description
    $wp_customize->add_setting('hero_description', array(
        'default' => 'Đối tác hậu kỳ đáng tin cậy cho nhiếp ảnh BĐS: HDR/Flambient, xóa vật thể, sky replacement, twilight, virtual staging, video ngắn & sơ đồ mặt bằng.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_description', array(
        'label' => '📄 Hero Description',
        'section' => 'hero_section',
        'type' => 'textarea',
        'priority' => 40,
    ));

    // Action Buttons
    $wp_customize->add_setting('hero_button1_text', array(
        'default' => 'Bắt đầu ngay',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_button1_text', array(
        'label' => '🔵 Primary Button Text',
        'section' => 'hero_section',
        'type' => 'text',
        'priority' => 50,
    ));

    $wp_customize->add_setting('hero_button2_text', array(
        'default' => 'Xem dịch vụ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_button2_text', array(
        'label' => '⚪ Secondary Button Text',
        'section' => 'hero_section',
        'type' => 'text',
        'priority' => 60,
    ));

    // Feature Badges
    $wp_customize->add_setting('hero_badge1', array(
        'default' => '⚡ Turnaround 12–24h',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge1', array(
        'label' => '🏷️ Feature Badge 1',
        'section' => 'hero_section',
        'type' => 'text',
        'priority' => 70,
    ));

    $wp_customize->add_setting('hero_badge2', array(
        'default' => '🛡️ QC 2 lớp',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge2', array(
        'label' => '🏷️ Feature Badge 2',
        'section' => 'hero_section',
        'type' => 'text',
        'priority' => 80,
    ));

    $wp_customize->add_setting('hero_badge3', array(
        'default' => '🌍 Khách hàng AU/US',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge3', array(
        'label' => '🏷️ Feature Badge 3',
        'section' => 'hero_section',
        'type' => 'text',
        'priority' => 90,
    ));

    // Hero Background Image
    $wp_customize->add_setting('hero_background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label' => '🖼️ Hero Background Image',
        'section' => 'hero_section',
        'settings' => 'hero_background_image',
        'priority' => 100,
    )));

    // ========================================
    // 4. STATISTICS SECTION
    // ========================================
    $wp_customize->add_section('stats_section', array(
        'title' => 'Statistics Section',
        'priority' => FOTO_PRIORITY_STATS_SECTION,
        'description' => 'Cài đặt phần thống kê số liệu',
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

    // ========================================
    // 5. COMPANY DESCRIPTION
    // ========================================
    $wp_customize->add_section('company_description', array(
        'title' => 'Company Description',
        'priority' => FOTO_PRIORITY_COMPANY_DESCRIPTION,
        'description' => 'Mô tả về công ty và dịch vụ',
    ));

    $wp_customize->add_setting('company_title', array(
        'default' => 'Foto Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_title', array(
        'label' => 'Company Title',
        'section' => 'company_description',
        'type' => 'text',
    ));

    $wp_customize->add_setting('company_description_text', array(
        'default' => 'At Foto Services, we deliver world-class post-production for real estate and commercial photography. Our team in Vietnam is committed to uncompromising quality while keeping pricing competitive.

We proudly use 100% licensed software and work exclusively on macOS workstations with highly calibrated displays. This ensures absolute precision in color accuracy and consistency across every project.

By combining the power of AI technology with the artistry of our experienced editors, we provide the best performance-to-price ratio in the market. Every image, video, staging, or floor plan is refined to help your listings and products stand out from the competition.

Fast turnaround, professional QC, and dedicated support make Foto Services the trusted partner for agents, studios, and brands worldwide.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('company_description_text', array(
        'label' => 'Company Description',
        'section' => 'company_description',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('company_bold_keywords', array(
        'default' => 'world-class post-production,100% licensed software and,macOS workstations,AI technology',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_bold_keywords', array(
        'label' => 'Bold Keywords',
        'section' => 'company_description',
        'type' => 'text',
        'description' => 'Keywords to make bold, separated by commas',
    ));

    // ========================================
    // 6. SERVICES CONTENT
    // ========================================
    $wp_customize->add_section('services_content', array(
        'title' => 'Services Content',
        'priority' => FOTO_PRIORITY_SERVICES_CONTENT,
        'description' => 'Nội dung và mô tả các dịch vụ',
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

    $services = array(
        1 => array(
            'title' => 'Single Exposure',
            'icon' => '📸',
            'description' => '1 phơi sáng, không blend, xử lý ánh sáng tự nhiên cơ bản, chỉnh màu & độ nét.',
            'features' => array('1 exposure', 'Natural light', 'Basic edit')
        ),
        2 => array(
            'title' => 'HDR',
            'icon' => '🖼️',
            'description' => 'Blend 3–5 phơi sáng, cân bằng trắng, kéo chi tiết cửa sổ tự nhiên, thẳng méo, xóa dây điện.',
            'features' => array('Window Pull tự nhiên', 'Color cast control', 'Sharpen sạch sẽ')
        ),
        3 => array(
            'title' => 'Ambient Flash',
            'icon' => '⚡',
            'description' => 'Kết hợp HDR + flash, loại bỏ bóng tối, chi tiết rõ mọi góc, màu tự nhiên.',
            'features' => array('HDR + flash composite', 'Natural shadows', 'Balanced tones')
        ),
        4 => array(
            'title' => '2D Floor Plan',
            'icon' => '🗺️',
            'description' => 'Vẽ 2D, quy chuẩn kích thước, chú thích phòng, xuất PNG/PDF/SVG.',
            'features' => array('Accurate dimensions', 'Branded style', 'Editable file')
        ),
        5 => array(
            'title' => '3D Floor Plan',
            'icon' => '🧭',
            'description' => 'Vẽ 3D, góc nhìn chân thực, màu sắc đẹp, xuất high-res.',
            'features' => array('Realistic 3D', 'Branded style', 'High-res export')
        ),
        6 => array(
            'title' => 'Virtual Staging',
            'icon' => '🏡',
            'description' => 'Dàn dựng nội thất ảo (phòng khách, ngủ, sân vườn), nhiều phong cách: modern, scandinavian, coastal…',
            'features' => array('3–5 set/ảnh', 'Bố cục hợp lý', 'Bóng/ánh sáng chân thực')
        ),
        7 => array(
            'title' => 'Clear the Room',
            'icon' => '🧽',
            'description' => 'Xóa toàn bộ nội thất, vật dụng, chuẩn bị phòng trống sạch để staging.',
            'features' => array('Remove all furniture', 'Clean background', 'Ready for staging')
        ),
        8 => array(
            'title' => 'Virtual Renovation',
            'icon' => '🏗️',
            'description' => 'Sửa chữa ảo: đổi màu tường, sàn, cửa, nội thất, hiện đại hóa không gian.',
            'features' => array('Change colors/materials', 'Modernize space', 'Natural look')
        ),
        9 => array(
            'title' => 'Item Removal',
            'icon' => '🧹',
            'description' => 'Loại bỏ vật thể 1–10+ items, dọn dây, thùng rác, vết bẩn; đi texture & ánh sáng mượt.',
            'features' => array('Seamless retouch', 'Giữ chi tiết', 'Soát lỗi kỹ')
        ),
        10 => array(
            'title' => 'Natural Twilight',
            'icon' => '🌆',
            'description' => 'Twilight thật từ nhiều phơi sáng, blend ngoại cảnh & nội thất, màu ấm tự nhiên.',
            'features' => array('Real twilight blend', 'Warm natural tones', 'Interior + exterior')
        ),
        11 => array(
            'title' => 'Virtual Twilight',
            'icon' => '🌅',
            'description' => 'Thay bầu trời & twilight ảo tự nhiên, giữ chi tiết kiến trúc, ánh sáng phản chiếu hợp lý.',
            'features' => array('Nhiều preset', 'Không giả', 'Consistent màu')
        )
    );

    foreach ($services as $num => $service) {
        $wp_customize->add_setting("service{$num}_title", array(
            'default' => $service['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("service{$num}_title", array(
            'label' => "Service {$num} Title",
            'section' => 'services_content',
            'type' => 'text',
        ));

        $wp_customize->add_setting("service{$num}_icon", array(
            'default' => $service['icon'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("service{$num}_icon", array(
            'label' => "Service {$num} Icon",
            'section' => 'services_content',
            'type' => 'text',
        ));

        $wp_customize->add_setting("service{$num}_description", array(
            'default' => $service['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("service{$num}_description", array(
            'label' => "Service {$num} Description",
            'section' => 'services_content',
            'type' => 'textarea',
        ));

        for ($i = 1; $i <= 3; $i++) {
            $wp_customize->add_setting("service{$num}_feature{$i}", array(
                'default' => $service['features'][$i-1],
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control("service{$num}_feature{$i}", array(
                'label' => "Service {$num} Feature {$i}",
                'section' => 'services_content',
                'type' => 'text',
            ));
        }
    }

    // ========================================
    // 7. HOW IT WORKS
    // ========================================
    $wp_customize->add_section('how_it_works_section', array(
        'title' => 'How It Works',
        'priority' => FOTO_PRIORITY_HOW_IT_WORKS,
        'description' => 'Quy trình làm việc đơn giản và rõ ràng',
    ));

    $wp_customize->add_setting('how_it_works_title', array(
        'default' => 'How It Works',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('how_it_works_title', array(
        'label' => 'Section Title',
        'section' => 'how_it_works_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('how_it_works_subtitle', array(
        'default' => 'A simple, clear process from upload to delivery.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('how_it_works_subtitle', array(
        'label' => 'Section Subtitle',
        'section' => 'how_it_works_section',
        'type' => 'textarea',
    ));

    // Step 1
    $wp_customize->add_setting('how_it_works_step_1_title', array(
        'default' => 'Upload',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('how_it_works_step_1_title', array(
        'label' => 'Step 1 Title',
        'section' => 'how_it_works_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('how_it_works_step_1_description', array(
        'default' => 'Send your RAW/JPEG photos via Google Drive, Dropbox, or other links.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('how_it_works_step_1_description', array(
        'label' => 'Step 1 Description',
        'section' => 'how_it_works_section',
        'type' => 'textarea',
    ));

    // Step 2
    $wp_customize->add_setting('how_it_works_step_2_title', array(
        'default' => 'Relax',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('how_it_works_step_2_title', array(
        'label' => 'Step 2 Title',
        'section' => 'how_it_works_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('how_it_works_step_2_description', array(
        'default' => 'Rest well while our editors carefully process all your files overnight.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('how_it_works_step_2_description', array(
        'label' => 'Step 2 Description',
        'section' => 'how_it_works_section',
        'type' => 'textarea',
    ));

    // Step 3
    $wp_customize->add_setting('how_it_works_step_3_title', array(
        'default' => 'Quality Check',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('how_it_works_step_3_title', array(
        'label' => 'Step 3 Title',
        'section' => 'how_it_works_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('how_it_works_step_3_description', array(
        'default' => 'Two-step QC ensures accuracy, consistency, and professional results.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('how_it_works_step_3_description', array(
        'label' => 'Step 3 Description',
        'section' => 'how_it_works_section',
        'type' => 'textarea',
    ));

    // Step 4
    $wp_customize->add_setting('how_it_works_step_4_title', array(
        'default' => 'Delivery',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('how_it_works_step_4_title', array(
        'label' => 'Step 4 Title',
        'section' => 'how_it_works_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('how_it_works_step_4_description', array(
        'default' => 'Receive your results within 12–24 hours. Usually ready the next morning, fully edited and ready to download.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('how_it_works_step_4_description', array(
        'label' => 'Step 4 Description',
        'section' => 'how_it_works_section',
        'type' => 'textarea',
    ));

    // ========================================
    // 8. BEFORE/AFTER SECTION
    // ========================================
    $wp_customize->add_section('beforeafter_content', array(
        'title' => 'Before/After Section',
        'priority' => FOTO_PRIORITY_BEFORE_AFTER_CONTENT,
        'description' => 'Nội dung phần before/after',
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
        'default' => 'Click vào từng service để xem thêm.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('beforeafter_subtitle', array(
        'label' => 'Before/After Section Subtitle',
        'section' => 'beforeafter_content',
        'type' => 'textarea',
    ));

    // ========================================
    // 9. BEFORE/AFTER IMAGES (11 SERVICES)
    // ========================================
    $wp_customize->add_panel('beforeafter_images', array(
        'title' => 'Before/After Images',
        'priority' => FOTO_PRIORITY_BEFORE_AFTER_IMAGES,
        'description' => 'Hình ảnh before/after cho 11 services',
    ));

    require_once get_template_directory() . '/includes/customizer/beforeafter-content.php';
    foto_beforeafter_content_customizer($wp_customize);

    // ========================================
    // 10. GALLERY SECTION
    // ========================================
    $wp_customize->add_section('gallery_section', array(
        'title' => 'Gallery Section',
        'priority' => FOTO_PRIORITY_GALLERY_SECTION,
        'description' => 'Cài đặt phần gallery chính',
    ));

    $wp_customize->add_setting('gallery_title', array(
        'default' => 'Gallery',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('gallery_title', array(
        'label' => 'Gallery Section Title',
        'section' => 'gallery_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('gallery_subtitle', array(
        'default' => 'Một vài ảnh minh họa phong cách xử lý.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('gallery_subtitle', array(
        'label' => 'Gallery Section Subtitle',
        'section' => 'gallery_section',
        'type' => 'textarea',
    ));

    // Show/Hide Gallery Section
    $wp_customize->add_setting('show_gallery_section', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('show_gallery_section', array(
        'label' => 'Show Gallery Section',
        'section' => 'gallery_section',
        'type' => 'checkbox',
    ));

    // ========================================
    // 11. GALLERY IMAGES (11 SERVICES)
    // ========================================
    $wp_customize->add_panel('gallery_images', array(
        'title' => 'Gallery Images',
        'priority' => FOTO_PRIORITY_GALLERY_IMAGES,
        'description' => 'Hình ảnh gallery cho 11 services',
    ));

    require_once get_template_directory() . '/includes/customizer/gallery-images-content.php';
    foto_gallery_images_customizer($wp_customize);



    // ========================================
    // 12. PRICING SECTION
    // ========================================
    $wp_customize->add_section('pricing_content', array(
        'title' => 'Pricing Section',
        'priority' => FOTO_PRIORITY_PRICING_CONTENT,
        'description' => 'Nội dung phần pricing',
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

    // ========================================
    // 13. PRICING SERVICES
    // ========================================
    $wp_customize->add_section('pricing_services', array(
        'title' => 'Pricing Services',
        'priority' => FOTO_PRIORITY_PRICING_SERVICES,
        'description' => 'Cài đặt các dịch vụ và giá',
    ));

    // Define all pricing services
    $pricing_services = array(
        array('id' => 'single', 'name' => 'Single', 'default_price' => '$0.5', 'default_unit' => '/photo'),
        array('id' => 'hdr', 'name' => 'HDR', 'default_price' => '$0.75', 'default_unit' => '/photo'),
        array('id' => 'hdr_flash', 'name' => 'HDR + Flash Composite', 'default_price' => '$0.85', 'default_unit' => '/photo'),
        array('id' => 'multi_flash', 'name' => 'Multi Flash', 'default_price' => '$1.25', 'default_unit' => '/photo'),
        array('id' => 'virtual_staging', 'name' => 'Virtual Staging', 'default_price' => '$12', 'default_unit' => '/photo'),
        array('id' => 'virtual_twilight', 'name' => 'Virtual Twilight', 'default_price' => '$5', 'default_unit' => '/photo'),
        array('id' => 'object_removal', 'name' => 'Object Removal', 'default_price' => '$2–5', 'default_unit' => '/photo'),
        array('id' => 'clear_room', 'name' => 'Clear the Room', 'default_price' => '$12', 'default_unit' => '/photo'),
        array('id' => 'grass_replacement', 'name' => 'Grass Replacement', 'default_price' => '$2', 'default_unit' => '/photo'),
        array('id' => 'water_pool', 'name' => 'Water in Pool', 'default_price' => '$2', 'default_unit' => '/photo'),
        array('id' => 'floor_2d', 'name' => 'Custom 2D Floor Plan', 'default_price' => 'From $10', 'default_unit' => '/floor'),
        array('id' => 'floor_3d', 'name' => 'Custom 3D Floor Plan', 'default_price' => 'From $25', 'default_unit' => '/floor'),
        array('id' => 'video_editing', 'name' => 'Video Editing', 'default_price' => 'From $15', 'default_unit' => '/video')
    );

    $default_features = array(
        'single' => ['1 exposure', 'No window blending', 'Natural light & basic edit'],
        'hdr' => ['3–5 exposures', 'HDR editing', 'Balanced tones & window pulls'],
        'hdr_flash' => ['3–5 exposures + 1 flash', 'Standard HDR & flash edit', 'Natural shadows & details'],
        'multi_flash' => ['Multiple flash frames', 'Clean composite edit', 'Consistent color & light'],
        'virtual_staging' => ['Realistic furniture placement', 'Multiple style options', 'Natural shadows & reflections'],
        'virtual_twilight' => ['Sunset/twilight sky replacement', 'Balanced warm tones', 'Natural building highlights'],
        'object_removal' => ['Remove 1–10 items', 'Seamless retouch', 'Preserve original details'],
        'clear_room' => ['Remove all furniture/objects', 'Clean background restoration', 'Ready for virtual staging'],
        'grass_replacement' => ['Replace patchy or dead grass', 'Natural green tones', 'Blends with surroundings'],
        'water_pool' => ['Add clear blue water', 'Natural reflections', 'Realistic depth look'],
        'floor_2d' => ['Accurate dimensions', 'Branded styling', 'Editable source file'],
        'floor_3d' => ['Realistic 3D modeling', 'Branded styling', 'High-res export'],
        'video_editing' => ['15–60s clips', 'Music & subtitles', 'Multi-platform formats']
    );

    foreach ($pricing_services as $service) {
        // Visible checkbox
        $wp_customize->add_setting("pricing_{$service['id']}_visible", array(
            'default' => true,
            'sanitize_callback' => 'wp_validate_boolean',
        ));
        $wp_customize->add_control("pricing_{$service['id']}_visible", array(
            'label' => "Show {$service['name']}",
            'section' => 'pricing_services',
            'type' => 'checkbox',
        ));

        // Service name, price, and unit
        $fields = array('name' => $service['name'], 'price' => $service['default_price'], 'unit' => $service['default_unit']);
        foreach ($fields as $field => $default_value) {
            $wp_customize->add_setting("pricing_{$service['id']}_{$field}", array(
                'default' => $default_value,
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control("pricing_{$service['id']}_{$field}", array(
                'label' => "{$service['name']} - " . ucfirst($field),
                'section' => 'pricing_services',
                'type' => 'text',
            ));
        }

        // Features (3 per service)
        for ($i = 1; $i <= 3; $i++) {
            $default_feature = isset($default_features[$service['id']][$i-1]) ? $default_features[$service['id']][$i-1] : '';
            $wp_customize->add_setting("pricing_{$service['id']}_feature{$i}", array(
                'default' => $default_feature,
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control("pricing_{$service['id']}_feature{$i}", array(
                'label' => "{$service['name']} - Feature {$i}",
                'section' => 'pricing_services',
                'type' => 'text',
            ));
        }
    }

    // ========================================
    // 14. PRICING BOTTOM SECTION
    // ========================================
    $wp_customize->add_section('pricing_bottom', array(
        'title' => 'Pricing Bottom Section',
        'priority' => FOTO_PRIORITY_PRICING_BOTTOM,
        'description' => 'Phần cuối của pricing',
    ));

    $bottom_settings = array(
        'pricing_bottom_title' => 'Flexible pricing for every studio',
        'pricing_bottom_subtitle' => 'Volume-friendly quotes, transparent add-ons, and consistent turnaround. Ask for our rate card.',
        'pricing_bottom_feature1' => 'No hidden fees',
        'pricing_bottom_feature2' => 'Next-morning delivery on most orders',
        'pricing_bottom_feature3' => 'Dedicated QC for key accounts',
        'pricing_bottom_button_text' => 'Request Pricing'
    );

    foreach ($bottom_settings as $key => $default) {
        $type = strpos($key, 'subtitle') !== false ? 'textarea' : 'text';
        $wp_customize->add_setting($key, array(
            'default' => $default,
            'sanitize_callback' => $type === 'textarea' ? 'sanitize_textarea_field' : 'sanitize_text_field',
        ));
        $wp_customize->add_control($key, array(
            'label' => str_replace(['pricing_bottom_', '_'], ['', ' '], ucwords($key, '_')),
            'section' => 'pricing_bottom',
            'type' => $type,
        ));
    }

    $wp_customize->add_setting('pricing_bottom_button_url', array(
        'default' => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('pricing_bottom_button_url', array(
        'label' => 'Button URL',
        'section' => 'pricing_bottom',
        'type' => 'url',
        'description' => 'Leave as #contact to scroll to contact form, or enter full URL',
    ));

    // ========================================
    // 15. TESTIMONIALS CONTENT
    // ========================================
    $wp_customize->add_section('testimonials_content', array(
        'title' => 'Testimonials Content',
        'priority' => FOTO_PRIORITY_TESTIMONIALS_CONTENT,
        'description' => 'Nội dung testimonials',
    ));

    $wp_customize->add_setting('testimonials_title', array(
        'default' => 'What Our Clients Say',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonials_title', array(
        'label' => 'Testimonials Section Title',
        'section' => 'testimonials_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('testimonials_subtitle', array(
        'default' => 'Real feedback from professionals who trust Foto Services.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonials_subtitle', array(
        'label' => 'Testimonials Section Subtitle',
        'section' => 'testimonials_content',
        'type' => 'textarea',
    ));

    $testimonials = array(
        1 => array('rating' => '★★★★★', 'content' => '"Incredible quality and super fast turnaround. Exactly what my listings needed!"', 'author' => 'Sarah', 'location' => 'Real Estate Agent'),
        2 => array('rating' => '★★★★★', 'content' => '"The virtual staging looked so real my clients couldn\'t believe it wasn\'t actual furniture."', 'author' => 'David', 'location' => 'Broker'),
        3 => array('rating' => '★★★★★', 'content' => '"HDR + Flash editing brought out every detail perfectly. Amazing work."', 'author' => 'Amanda', 'location' => 'Photographer'),
        4 => array('rating' => '★★★★★', 'content' => '"Consistent quality and always delivered on time. I highly recommend Foto Services."', 'author' => 'James', 'location' => 'Property Manager'),
        5 => array('rating' => '★★★★★', 'content' => '"Great communication, fair pricing, and excellent results. 5 stars!"', 'author' => 'Olivia', 'location' => 'Realtor'),
        6 => array('rating' => '★★★★★', 'content' => '"They saved me hours of editing so I can focus on my clients. Brilliant service."', 'author' => 'Michael', 'location' => 'Real Estate Agent')
    );

    foreach ($testimonials as $num => $data) {
        foreach ($data as $field => $value) {
            $wp_customize->add_setting("testimonial{$num}_{$field}", array(
                'default' => $value,
                'sanitize_callback' => $field === 'content' ? 'sanitize_textarea_field' : 'sanitize_text_field',
            ));
            $wp_customize->add_control("testimonial{$num}_{$field}", array(
                'label' => "Testimonial {$num} " . ucfirst($field),
                'section' => 'testimonials_content',
                'type' => $field === 'content' ? 'textarea' : 'text',
                'description' => $field === 'rating' ? 'Example: ★★★★★ (5 stars)' : '',
            ));
        }
    }

    // ========================================
    // 16. CTA SECTION
    // ========================================
    $wp_customize->add_section('cta_content', array(
        'title' => 'CTA Section',
        'priority' => FOTO_PRIORITY_CTA_CONTENT,
        'description' => 'Phần call-to-action',
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

    // ========================================
    // 17. CONTACT SECTION
    // ========================================
    $wp_customize->add_section('contact_content', array(
        'title' => 'Contact Section',
        'priority' => FOTO_PRIORITY_CONTACT_CONTENT,
        'description' => 'Nội dung phần contact',
    ));

    $wp_customize->add_setting('contact_title', array(
        'default' => 'Let\'s work together!',
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

    // ========================================
    // 18. CONTACT FORM CONTENT
    // ========================================
    $wp_customize->add_section('contact_form', array(
        'title' => 'Contact Form Content',
        'priority' => FOTO_PRIORITY_CONTACT_FORM,
        'description' => 'Nội dung form liên hệ',
    ));

    $form_fields = array(
        'contact_name_label' => 'Tên của bạn',
        'contact_name_placeholder' => 'Nguyen Nguyen',
        'contact_email_label' => 'Email',
        'contact_email_placeholder' => 'you@email.com',
        'contact_message_label' => 'Nội dung',
        'contact_message_placeholder' => 'Mô tả nhu cầu, số lượng ảnh, deadline…',
        'contact_button_text' => 'Gửi yêu cầu',
        'contact_success_message' => 'Cảm ơn bạn! Chúng tôi sẽ phản hồi sớm nhất.'
    );

    foreach ($form_fields as $key => $default) {
        $wp_customize->add_setting($key, array(
            'default' => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($key, array(
            'label' => str_replace('_', ' ', ucwords($key)),
            'section' => 'contact_form',
            'type' => strpos($key, 'placeholder') !== false ? 'text' : (strpos($key, 'message') !== false && strpos($key, 'success') === false ? 'text' : 'text'),
        ));
    }

    // ========================================
    // 19. EMAIL SETTINGS
    // ========================================
    $wp_customize->add_section('email_settings', array(
        'title' => 'Email Settings',
        'priority' => FOTO_PRIORITY_EMAIL_SETTINGS,
        'description' => 'Cài đặt email',
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

    // ========================================
    // 20. COLOR SCHEME
    // ========================================
    $wp_customize->add_section('color_scheme', array(
        'title' => 'Color Scheme',
        'priority' => FOTO_PRIORITY_COLOR_SCHEME,
        'description' => 'Bảng màu chủ đạo',
    ));

    $colors = array(
        'primary_color' => '#4f46e5',
        'secondary_color' => '#1e293b',
        'accent_color' => '#a5b4fc'
    );

    foreach ($colors as $key => $default) {
        $wp_customize->add_setting($key, array(
            'default' => $default,
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $key, array(
            'label' => str_replace('_', ' ', ucwords($key)),
            'section' => 'color_scheme',
            'settings' => $key,
        )));
    }

    // ========================================
    // 21. LAYOUT OPTIONS
    // ========================================
    $wp_customize->add_section('layout_options', array(
        'title' => 'Layout Options',
        'priority' => FOTO_PRIORITY_LAYOUT_OPTIONS,
        'description' => 'Tùy chọn bố cục',
    ));

    // Show/Hide Sections
    $sections = array(
        'stats' => 'Statistics Section',
        'services' => 'Services Section',
        'beforeafter' => 'Before/After Section',
        'gallery' => 'Gallery Section',
        'pricing' => 'Pricing Section',
        'testimonials' => 'Testimonials Section',
        'cta' => 'CTA Section'
    );

    foreach ($sections as $key => $label) {
        $wp_customize->add_setting("show_{$key}_section", array(
            'default' => true,
            'sanitize_callback' => 'wp_validate_boolean',
        ));
        $wp_customize->add_control("show_{$key}_section", array(
            'label' => "Show {$label}",
            'section' => 'layout_options',
            'type' => 'checkbox',
        ));
    }

    // Gallery Columns
    $wp_customize->add_setting('gallery_columns', array(
        'default' => '3',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('gallery_columns', array(
        'label' => 'Gallery Columns',
        'section' => 'layout_options',
        'type' => 'select',
        'choices' => array(
            '2' => '2 Columns',
            '3' => '3 Columns',
            '4' => '4 Columns',
        ),
    ));

    // ========================================
    // 22. MENU (HIDDEN)
    // ========================================
    // Menu section is hidden - uncomment below to show it
    /*
    $wp_customize->add_section('menu_settings', array(
        'title' => 'Menu',
        'priority' => FOTO_PRIORITY_MENU_SETTINGS,
        'description' => 'Cài đặt menu navigation',
    ));

    // Menu settings can be added here if needed
    $wp_customize->add_setting('menu_style', array(
        'default' => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('menu_style', array(
        'label' => 'Menu Style',
        'section' => 'menu_settings',
        'type' => 'select',
        'choices' => array(
            'default' => 'Default',
            'minimal' => 'Minimal',
            'bold' => 'Bold',
        ),
    ));
    */

    // ========================================
    // 23. CÀI ĐẶT TRANG CHỦ (HIDDEN)
    // ========================================
    // Homepage settings section is hidden - uncomment below to show it
    /*
    $wp_customize->add_section('homepage_settings', array(
        'title' => 'Cài đặt Trang chủ',
        'priority' => FOTO_PRIORITY_HOMEPAGE_SETTINGS,
        'description' => 'Cài đặt tổng quan cho trang chủ',
    ));

    $wp_customize->add_setting('homepage_layout', array(
        'default' => 'standard',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('homepage_layout', array(
        'label' => 'Homepage Layout',
        'section' => 'homepage_settings',
        'type' => 'select',
        'choices' => array(
            'standard' => 'Standard Layout',
            'compact' => 'Compact Layout',
            'extended' => 'Extended Layout',
        ),
    ));
    */

    // ========================================
    // 24. CSS BỔ SUNG (HIDDEN)
    // ========================================
    // Custom CSS section is hidden - uncomment below to show it
    /*
    $wp_customize->add_section('custom_css', array(
        'title' => 'CSS bổ sung',
        'priority' => FOTO_PRIORITY_CUSTOM_CSS,
        'description' => 'Thêm CSS tùy chỉnh',
    ));

    $wp_customize->add_setting('custom_css_code', array(
        'default' => '',
        'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('custom_css_code', array(
        'label' => 'Custom CSS',
        'section' => 'custom_css',
        'type' => 'textarea',
        'description' => 'Add your custom CSS code here',
    ));
    */
}
