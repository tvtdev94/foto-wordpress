<?php
function foto_services_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'foto-services'),
    ));
}
add_action('after_setup_theme', 'foto_services_setup');

function foto_services_scripts() {
    // Enqueue Tailwind CSS
    wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com', array(), null, false);

    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap', array(), null);

    // Enqueue theme styles
    wp_enqueue_style('foto-services-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    // Enqueue custom JS
    wp_enqueue_script('foto-services-script', get_template_directory_uri() . '/js/script.js', array(), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'foto_services_scripts');

// Register Custom Post Types
function foto_services_custom_post_types() {
    // Services Post Type
    register_post_type('service', array(
        'labels' => array(
            'name' => 'Services',
            'singular_name' => 'Service',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-camera',
    ));

    // Portfolio Post Type
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio Item',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-format-gallery',
    ));

    // Testimonial Post Type
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
        ),
        'public' => true,
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-testimonial',
    ));
}
add_action('init', 'foto_services_custom_post_types');

// Add Theme Customizer
function foto_services_customize_register($wp_customize) {
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

    // Stat 1
    $wp_customize->add_setting('stat1_number', array(
        'default' => '1.2M+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('stat1_number', array(
        'label' => 'Stat 1 Number',
        'section' => 'stats_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('stat1_text', array(
        'default' => 'Ảnh đã xử lý',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('stat1_text', array(
        'label' => 'Stat 1 Text',
        'section' => 'stats_section',
        'type' => 'text',
    ));

    // Stat 2
    $wp_customize->add_setting('stat2_number', array(
        'default' => '12–24h',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('stat2_number', array(
        'label' => 'Stat 2 Number',
        'section' => 'stats_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('stat2_text', array(
        'default' => 'Tốc độ giao',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('stat2_text', array(
        'label' => 'Stat 2 Text',
        'section' => 'stats_section',
        'type' => 'text',
    ));

    // Stat 3
    $wp_customize->add_setting('stat3_number', array(
        'default' => '99.5%',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('stat3_number', array(
        'label' => 'Stat 3 Number',
        'section' => 'stats_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('stat3_text', array(
        'default' => 'Đúng hạn',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('stat3_text', array(
        'label' => 'Stat 3 Text',
        'section' => 'stats_section',
        'type' => 'text',
    ));

    // Stat 4
    $wp_customize->add_setting('stat4_number', array(
        'default' => '4.9/5',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('stat4_number', array(
        'label' => 'Stat 4 Number',
        'section' => 'stats_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('stat4_text', array(
        'default' => 'Đánh giá TB',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('stat4_text', array(
        'label' => 'Stat 4 Text',
        'section' => 'stats_section',
        'type' => 'text',
    ));

    // Section Titles
    $wp_customize->add_section('section_titles', array(
        'title' => 'Section Titles',
        'priority' => 33,
    ));

    // Services Title
    $wp_customize->add_setting('services_title', array(
        'default' => 'Dịch vụ của chúng tôi',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_title', array(
        'label' => 'Services Section Title',
        'section' => 'section_titles',
        'type' => 'text',
    ));

    // Services Subtitle
    $wp_customize->add_setting('services_subtitle', array(
        'default' => 'Tối ưu cho nhiếp ảnh BĐS: chất lượng nhất quán, quy trình rõ ràng, chi phí hợp lý.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_subtitle', array(
        'label' => 'Services Section Subtitle',
        'section' => 'section_titles',
        'type' => 'textarea',
    ));

    // Before/After Title
    $wp_customize->add_setting('beforeafter_title', array(
        'default' => 'Before / After',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('beforeafter_title', array(
        'label' => 'Before/After Section Title',
        'section' => 'section_titles',
        'type' => 'text',
    ));
    $wp_customize->add_setting('beforeafter_subtitle', array(
        'default' => 'Kéo thanh trượt để xem khác biệt.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('beforeafter_subtitle', array(
        'label' => 'Before/After Section Subtitle',
        'section' => 'section_titles',
        'type' => 'text',
    ));

    // Gallery Title
    $wp_customize->add_setting('gallery_title', array(
        'default' => 'Gallery',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('gallery_title', array(
        'label' => 'Gallery Section Title',
        'section' => 'section_titles',
        'type' => 'text',
    ));
    $wp_customize->add_setting('gallery_subtitle', array(
        'default' => 'Một vài ảnh minh họa phong cách xử lý.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('gallery_subtitle', array(
        'label' => 'Gallery Section Subtitle',
        'section' => 'section_titles',
        'type' => 'text',
    ));

    // Pricing Title
    $wp_customize->add_setting('pricing_title', array(
        'default' => 'Bảng giá minh họa',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('pricing_title', array(
        'label' => 'Pricing Section Title',
        'section' => 'section_titles',
        'type' => 'text',
    ));
    $wp_customize->add_setting('pricing_subtitle', array(
        'default' => 'Giá demo để tham khảo. Có thể tùy chỉnh theo khối lượng và yêu cầu.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('pricing_subtitle', array(
        'label' => 'Pricing Section Subtitle',
        'section' => 'section_titles',
        'type' => 'text',
    ));

    // Testimonials Title
    $wp_customize->add_setting('testimonials_title', array(
        'default' => 'Khách hàng nói gì',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonials_title', array(
        'label' => 'Testimonials Section Title',
        'section' => 'section_titles',
        'type' => 'text',
    ));
    $wp_customize->add_setting('testimonials_subtitle', array(
        'default' => 'Từ agent & studio ở AU/US.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonials_subtitle', array(
        'label' => 'Testimonials Section Subtitle',
        'section' => 'section_titles',
        'type' => 'text',
    ));

    // CTA Section
    $wp_customize->add_setting('cta_title', array(
        'default' => 'Sẵn sàng tăng chất lượng listing của bạn?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_title', array(
        'label' => 'CTA Section Title',
        'section' => 'section_titles',
        'type' => 'text',
    ));
    $wp_customize->add_setting('cta_subtitle', array(
        'default' => 'Gửi thử 10 ảnh — nhận kết quả trong 12–24h.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_subtitle', array(
        'label' => 'CTA Section Subtitle',
        'section' => 'section_titles',
        'type' => 'text',
    ));

    // Contact Section
    $wp_customize->add_setting('contact_title', array(
        'default' => 'Liên hệ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_title', array(
        'label' => 'Contact Section Title',
        'section' => 'section_titles',
        'type' => 'text',
    ));
    $wp_customize->add_setting('contact_subtitle', array(
        'default' => 'Cho chúng tôi biết nhu cầu của bạn, team sẽ phản hồi ngay.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_subtitle', array(
        'label' => 'Contact Section Subtitle',
        'section' => 'section_titles',
        'type' => 'text',
    ));

    // Services Content Section
    $wp_customize->add_section('services_content', array(
        'title' => 'Services Content',
        'priority' => 34,
    ));

    // Service 1 - HDR/Flambient
    $wp_customize->add_setting('service1_title', array(
        'default' => 'HDR/Flambient',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service1_title', array(
        'label' => 'Service 1 Title',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service1_icon', array(
        'default' => '🖼️',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service1_icon', array(
        'label' => 'Service 1 Icon',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service1_description', array(
        'default' => 'Blend 3–5 phơi sáng, cân bằng trắng, kéo chi tiết cửa sổ tự nhiên, thẳng méo, xóa dây điện.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('service1_description', array(
        'label' => 'Service 1 Description',
        'section' => 'services_content',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('service1_feature1', array(
        'default' => 'Window Pull tự nhiên',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service1_feature1', array(
        'label' => 'Service 1 Feature 1',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service1_feature2', array(
        'default' => 'Color cast control',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service1_feature2', array(
        'label' => 'Service 1 Feature 2',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service1_feature3', array(
        'default' => 'Sharpen sạch sẽ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service1_feature3', array(
        'label' => 'Service 1 Feature 3',
        'section' => 'services_content',
        'type' => 'text',
    ));

    // Service 2 - Virtual Staging
    $wp_customize->add_setting('service2_title', array(
        'default' => 'Virtual Staging',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service2_title', array(
        'label' => 'Service 2 Title',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service2_icon', array(
        'default' => '🏡',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service2_icon', array(
        'label' => 'Service 2 Icon',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service2_description', array(
        'default' => 'Dàn dựng nội thất ảo (phòng khách, ngủ, sân vườn), nhiều phong cách: modern, scandinavian, coastal…',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('service2_description', array(
        'label' => 'Service 2 Description',
        'section' => 'services_content',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('service2_feature1', array(
        'default' => '3–5 set/ảnh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service2_feature1', array(
        'label' => 'Service 2 Feature 1',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service2_feature2', array(
        'default' => 'Bố cục hợp lý',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service2_feature2', array(
        'label' => 'Service 2 Feature 2',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service2_feature3', array(
        'default' => 'Bóng/ánh sáng chân thực',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service2_feature3', array(
        'label' => 'Service 2 Feature 3',
        'section' => 'services_content',
        'type' => 'text',
    ));

    // Service 3 - Floor Plan
    $wp_customize->add_setting('service3_title', array(
        'default' => 'Floor Plan & Site Plan',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service3_title', array(
        'label' => 'Service 3 Title',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service3_icon', array(
        'default' => '🧭',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service3_icon', array(
        'label' => 'Service 3 Icon',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service3_description', array(
        'default' => 'Vẽ 2D/3D, quy chuẩn kích thước, hướng, chú thích phòng; xuất PNG/PDF/SVG.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('service3_description', array(
        'label' => 'Service 3 Description',
        'section' => 'services_content',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('service3_feature1', array(
        'default' => 'Clean vector',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service3_feature1', array(
        'label' => 'Service 3 Feature 1',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service3_feature2', array(
        'default' => 'Branded style',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service3_feature2', array(
        'label' => 'Service 3 Feature 2',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service3_feature3', array(
        'default' => 'File gốc để sửa',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service3_feature3', array(
        'label' => 'Service 3 Feature 3',
        'section' => 'services_content',
        'type' => 'text',
    ));

    // Service 4 - Sky/Twilight Replace
    $wp_customize->add_setting('service4_title', array(
        'default' => 'Sky/Twilight Replace',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service4_title', array(
        'label' => 'Service 4 Title',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service4_icon', array(
        'default' => '🌅',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service4_icon', array(
        'label' => 'Service 4 Icon',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service4_description', array(
        'default' => 'Thay bầu trời & twilight tự nhiên, giữ chi tiết kiến trúc, ánh sáng phản chiếu hợp lý.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('service4_description', array(
        'label' => 'Service 4 Description',
        'section' => 'services_content',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('service4_feature1', array(
        'default' => 'Nhiều preset',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service4_feature1', array(
        'label' => 'Service 4 Feature 1',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service4_feature2', array(
        'default' => 'Không giả',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service4_feature2', array(
        'label' => 'Service 4 Feature 2',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service4_feature3', array(
        'default' => 'Consistent màu',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service4_feature3', array(
        'label' => 'Service 4 Feature 3',
        'section' => 'services_content',
        'type' => 'text',
    ));

    // Service 5 - Reels/Shorts
    $wp_customize->add_setting('service5_title', array(
        'default' => 'Reels/Shorts',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service5_title', array(
        'label' => 'Service 5 Title',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service5_icon', array(
        'default' => '🎥',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service5_icon', array(
        'label' => 'Service 5 Icon',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service5_description', array(
        'default' => 'Cắt dựng 15–60s, nhạc trend, subtitle rõ, hook mạnh — phù hợp agent marketing.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('service5_description', array(
        'label' => 'Service 5 Description',
        'section' => 'services_content',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('service5_feature1', array(
        'default' => 'Ratio 9:16/1:1/16:9',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service5_feature1', array(
        'label' => 'Service 5 Feature 1',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service5_feature2', array(
        'default' => 'Logo & brand kit',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service5_feature2', array(
        'label' => 'Service 5 Feature 2',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service5_feature3', array(
        'default' => 'Export đa nền tảng',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service5_feature3', array(
        'label' => 'Service 5 Feature 3',
        'section' => 'services_content',
        'type' => 'text',
    ));

    // Service 6 - Remove Objects
    $wp_customize->add_setting('service6_title', array(
        'default' => 'Remove Objects',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service6_title', array(
        'label' => 'Service 6 Title',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service6_icon', array(
        'default' => '🧹',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service6_icon', array(
        'label' => 'Service 6 Icon',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service6_description', array(
        'default' => 'Loại bỏ vật thể 1–10+ items, dọn dây, thùng rác, vết bẩn; đi texture & ánh sáng mượt.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('service6_description', array(
        'label' => 'Service 6 Description',
        'section' => 'services_content',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('service6_feature1', array(
        'default' => 'Seamless retouch',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service6_feature1', array(
        'label' => 'Service 6 Feature 1',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service6_feature2', array(
        'default' => 'Giữ chi tiết',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service6_feature2', array(
        'label' => 'Service 6 Feature 2',
        'section' => 'services_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('service6_feature3', array(
        'default' => 'Soát lỗi kỹ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('service6_feature3', array(
        'label' => 'Service 6 Feature 3',
        'section' => 'services_content',
        'type' => 'text',
    ));

    // Testimonials Section
    $wp_customize->add_section('testimonials_content', array(
        'title' => 'Testimonials Content',
        'priority' => 36,
    ));

    // Testimonial 1
    $wp_customize->add_setting('testimonial1_rating', array(
        'default' => '★★★★★',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonial1_rating', array(
        'label' => 'Testimonial 1 Rating',
        'section' => 'testimonials_content',
        'type' => 'text',
        'description' => 'Example: ★★★★★ (5 stars)',
    ));
    $wp_customize->add_setting('testimonial1_content', array(
        'default' => '"Ảnh consistent, window pull đẹp, giao nhanh 12h."',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('testimonial1_content', array(
        'label' => 'Testimonial 1 Content',
        'section' => 'testimonials_content',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('testimonial1_author', array(
        'default' => 'Ben',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonial1_author', array(
        'label' => 'Testimonial 1 Author',
        'section' => 'testimonials_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('testimonial1_location', array(
        'default' => 'Sydney',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonial1_location', array(
        'label' => 'Testimonial 1 Location',
        'section' => 'testimonials_content',
        'type' => 'text',
    ));

    // Testimonial 2
    $wp_customize->add_setting('testimonial2_rating', array(
        'default' => '★★★★★',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonial2_rating', array(
        'label' => 'Testimonial 2 Rating',
        'section' => 'testimonials_content',
        'type' => 'text',
        'description' => 'Example: ★★★★★ (5 stars)',
    ));
    $wp_customize->add_setting('testimonial2_content', array(
        'default' => '"Staging tự nhiên, khách xem là mê. Giá hợp lý."',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('testimonial2_content', array(
        'label' => 'Testimonial 2 Content',
        'section' => 'testimonials_content',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('testimonial2_author', array(
        'default' => 'Mark',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonial2_author', array(
        'label' => 'Testimonial 2 Author',
        'section' => 'testimonials_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('testimonial2_location', array(
        'default' => 'Melbourne',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonial2_location', array(
        'label' => 'Testimonial 2 Location',
        'section' => 'testimonials_content',
        'type' => 'text',
    ));

    // Testimonial 3
    $wp_customize->add_setting('testimonial3_rating', array(
        'default' => '★★★★★',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonial3_rating', array(
        'label' => 'Testimonial 3 Rating',
        'section' => 'testimonials_content',
        'type' => 'text',
        'description' => 'Example: ★★★★★ (5 stars)',
    ));
    $wp_customize->add_setting('testimonial3_content', array(
        'default' => '"Support nhiệt tình, sửa nhanh đúng ý."',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('testimonial3_content', array(
        'label' => 'Testimonial 3 Content',
        'section' => 'testimonials_content',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('testimonial3_author', array(
        'default' => 'Brian',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonial3_author', array(
        'label' => 'Testimonial 3 Author',
        'section' => 'testimonials_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('testimonial3_location', array(
        'default' => 'California',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonial3_location', array(
        'label' => 'Testimonial 3 Location',
        'section' => 'testimonials_content',
        'type' => 'text',
    ));

    // Contact Form Section
    $wp_customize->add_section('contact_form', array(
        'title' => 'Contact Form Content',
        'priority' => 37,
    ));

    // Contact Form Labels
    $wp_customize->add_setting('contact_name_label', array(
        'default' => 'Tên của bạn',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_name_label', array(
        'label' => 'Name Field Label',
        'section' => 'contact_form',
        'type' => 'text',
    ));
    $wp_customize->add_setting('contact_name_placeholder', array(
        'default' => 'Nguyen Nguyen',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_name_placeholder', array(
        'label' => 'Name Field Placeholder',
        'section' => 'contact_form',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_email_label', array(
        'default' => 'Email',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_email_label', array(
        'label' => 'Email Field Label',
        'section' => 'contact_form',
        'type' => 'text',
    ));
    $wp_customize->add_setting('contact_email_placeholder', array(
        'default' => 'you@email.com',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_email_placeholder', array(
        'label' => 'Email Field Placeholder',
        'section' => 'contact_form',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_message_label', array(
        'default' => 'Nội dung',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_message_label', array(
        'label' => 'Message Field Label',
        'section' => 'contact_form',
        'type' => 'text',
    ));
    $wp_customize->add_setting('contact_message_placeholder', array(
        'default' => 'Mô tả nhu cầu, số lượng ảnh, deadline…',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_message_placeholder', array(
        'label' => 'Message Field Placeholder',
        'section' => 'contact_form',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_button_text', array(
        'default' => 'Gửi yêu cầu',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_button_text', array(
        'label' => 'Submit Button Text',
        'section' => 'contact_form',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_success_message', array(
        'default' => 'Cảm ơn bạn! Chúng tôi sẽ phản hồi sớm nhất.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_success_message', array(
        'label' => 'Success Message',
        'section' => 'contact_form',
        'type' => 'text',
    ));

    // Buttons Section
    $wp_customize->add_section('buttons_content', array(
        'title' => 'Buttons & CTA Text',
        'priority' => 38,
    ));

    // Hero Buttons
    $wp_customize->add_setting('hero_button1_text', array(
        'default' => 'Bắt đầu ngay',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_button1_text', array(
        'label' => 'Hero Button 1 Text',
        'section' => 'buttons_content',
        'type' => 'text',
    ));
    $wp_customize->add_setting('hero_button2_text', array(
        'default' => 'Xem dịch vụ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_button2_text', array(
        'label' => 'Hero Button 2 Text',
        'section' => 'buttons_content',
        'type' => 'text',
    ));

    // Header Button
    $wp_customize->add_setting('header_button_text', array(
        'default' => 'Nhận báo giá',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('header_button_text', array(
        'label' => 'Header Button Text',
        'section' => 'buttons_content',
        'type' => 'text',
    ));

    // CTA Button
    $wp_customize->add_setting('cta_button_text', array(
        'default' => 'Nhận báo giá',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_button_text', array(
        'label' => 'CTA Section Button Text',
        'section' => 'buttons_content',
        'type' => 'text',
    ));

    // Pricing Buttons
    $wp_customize->add_setting('pricing_button_text', array(
        'default' => 'Chọn gói',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('pricing_button_text', array(
        'label' => 'Pricing Button Text',
        'section' => 'buttons_content',
        'type' => 'text',
    ));

    // Email Settings Section
    $wp_customize->add_section('email_settings', array(
        'title' => 'Email Settings',
        'priority' => 39,
    ));

    // Contact Form Recipient Email
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

    // Email Subject
    $wp_customize->add_setting('contact_email_subject', array(
        'default' => 'New Contact Form Submission - Foto Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_email_subject', array(
        'label' => 'Email Subject',
        'section' => 'email_settings',
        'type' => 'text',
    ));

    // Email From Name
    $wp_customize->add_setting('contact_email_from_name', array(
        'default' => 'Foto Services Website',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_email_from_name', array(
        'label' => 'Email From Name',
        'section' => 'email_settings',
        'type' => 'text',
    ));

    // Services Gallery Images Section
    $wp_customize->add_section('services_gallery_images', array(
        'title' => 'Services Gallery Images',
        'priority' => 39,
    ));

    // Services Gallery Images
    $service_names = array(
        'Single', 'HDR', 'Ambient Flash', '2D Floor Plan', '3D Floor Plan',
        'Virtual Staging', 'Clear the Room', 'Clear the Room + VS',
        'Item Removal', 'Natural Twilight', 'Virtual Twilight'
    );

    for ($i = 1; $i <= 11; $i++) {
        $service_name = $service_names[$i-1];

        $wp_customize->add_setting("service_gallery_image_{$i}", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "service_gallery_image_{$i}", array(
            'label' => "{$service_name} - Main Image",
            'section' => 'services_gallery_images',
            'settings' => "service_gallery_image_{$i}",
        )));

        // Add 6 thumbnail images for each service
        for ($j = 1; $j <= 6; $j++) {
            $wp_customize->add_setting("service_gallery_thumb_{$i}_{$j}", array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "service_gallery_thumb_{$i}_{$j}", array(
                'label' => "{$service_name} - Thumbnail {$j}",
                'section' => 'services_gallery_images',
                'settings' => "service_gallery_thumb_{$i}_{$j}",
            )));
        }
    }

    // Pricing Section
    $wp_customize->add_section('pricing_services', array(
        'title' => 'Pricing Services',
        'priority' => 35,
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

        // Service name
        $wp_customize->add_setting("pricing_{$service['id']}_name", array(
            'default' => $service['name'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("pricing_{$service['id']}_name", array(
            'label' => "{$service['name']} - Service Name",
            'section' => 'pricing_services',
            'type' => 'text',
        ));

        // Price
        $wp_customize->add_setting("pricing_{$service['id']}_price", array(
            'default' => $service['default_price'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("pricing_{$service['id']}_price", array(
            'label' => "{$service['name']} - Price",
            'section' => 'pricing_services',
            'type' => 'text',
        ));

        // Unit
        $wp_customize->add_setting("pricing_{$service['id']}_unit", array(
            'default' => $service['default_unit'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("pricing_{$service['id']}_unit", array(
            'label' => "{$service['name']} - Unit",
            'section' => 'pricing_services',
            'type' => 'text',
        ));

        // Features (3 features per service) with defaults
        $default_features = array();
        switch($service['id']) {
            case 'single':
                $default_features = ['1 exposure', 'No window blending', 'Natural light & basic edit'];
                break;
            case 'hdr':
                $default_features = ['3–5 exposures', 'HDR editing', 'Balanced tones & window pulls'];
                break;
            case 'hdr_flash':
                $default_features = ['3–5 exposures + 1 flash', 'Standard HDR & flash edit', 'Natural shadows & details'];
                break;
            case 'multi_flash':
                $default_features = ['Multiple flash frames', 'Clean composite edit', 'Consistent color & light'];
                break;
            case 'virtual_staging':
                $default_features = ['Realistic furniture placement', 'Multiple style options', 'Natural shadows & reflections'];
                break;
            case 'virtual_twilight':
                $default_features = ['Sunset/twilight sky replacement', 'Balanced warm tones', 'Natural building highlights'];
                break;
            case 'object_removal':
                $default_features = ['Remove 1–10 items', 'Seamless retouch', 'Preserve original details'];
                break;
            case 'clear_room':
                $default_features = ['Remove all furniture/objects', 'Clean background restoration', 'Ready for virtual staging'];
                break;
            case 'grass_replacement':
                $default_features = ['Replace patchy or dead grass', 'Natural green tones', 'Blends with surroundings'];
                break;
            case 'water_pool':
                $default_features = ['Add clear blue water', 'Natural reflections', 'Realistic depth look'];
                break;
            case 'floor_2d':
                $default_features = ['Accurate dimensions', 'Branded styling', 'Editable source file'];
                break;
            case 'floor_3d':
                $default_features = ['Realistic 3D modeling', 'Branded styling', 'High-res export'];
                break;
            case 'video_editing':
                $default_features = ['15–60s clips', 'Music & subtitles', 'Multi-platform formats'];
                break;
        }

        for ($i = 1; $i <= 3; $i++) {
            $default_feature = isset($default_features[$i-1]) ? $default_features[$i-1] : '';
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

    // Pricing Bottom Section
    $wp_customize->add_section('pricing_bottom', array(
        'title' => 'Pricing Bottom Section',
        'priority' => 36,
    ));

    // Title
    $wp_customize->add_setting('pricing_bottom_title', array(
        'default' => 'Flexible pricing for every studio',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('pricing_bottom_title', array(
        'label' => 'Bottom Title',
        'section' => 'pricing_bottom',
        'type' => 'text',
    ));

    // Subtitle
    $wp_customize->add_setting('pricing_bottom_subtitle', array(
        'default' => 'Volume-friendly quotes, transparent add-ons, and consistent turnaround. Ask for our rate card.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('pricing_bottom_subtitle', array(
        'label' => 'Bottom Subtitle',
        'section' => 'pricing_bottom',
        'type' => 'textarea',
    ));

    // Features
    $wp_customize->add_setting('pricing_bottom_feature1', array(
        'default' => 'No hidden fees',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('pricing_bottom_feature1', array(
        'label' => 'Feature 1',
        'section' => 'pricing_bottom',
        'type' => 'text',
    ));

    $wp_customize->add_setting('pricing_bottom_feature2', array(
        'default' => 'Next-morning delivery on most orders',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('pricing_bottom_feature2', array(
        'label' => 'Feature 2',
        'section' => 'pricing_bottom',
        'type' => 'text',
    ));

    $wp_customize->add_setting('pricing_bottom_feature3', array(
        'default' => 'Dedicated QC for key accounts',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('pricing_bottom_feature3', array(
        'label' => 'Feature 3',
        'section' => 'pricing_bottom',
        'type' => 'text',
    ));

    // Button Text
    $wp_customize->add_setting('pricing_bottom_button_text', array(
        'default' => 'Request Pricing',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('pricing_bottom_button_text', array(
        'label' => 'Button Text',
        'section' => 'pricing_bottom',
        'type' => 'text',
    ));

    // Button URL
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

    // Gallery Images Section
    $wp_customize->add_section('gallery_images', array(
        'title' => 'Gallery Images',
        'priority' => 40,
    ));

    // Gallery Images
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("gallery_image_{$i}", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "gallery_image_{$i}", array(
            'label' => "Gallery Image {$i}",
            'section' => 'gallery_images',
            'settings' => "gallery_image_{$i}",
        )));
    }

    // Hero Background Section
    $wp_customize->add_section('hero_background', array(
        'title' => 'Hero Background',
        'priority' => 41,
    ));

    // Hero Background Image
    $wp_customize->add_setting('hero_background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label' => 'Hero Background Image',
        'section' => 'hero_background',
        'settings' => 'hero_background_image',
    )));

    // Before/After Images Section
    $wp_customize->add_section('beforeafter_images', array(
        'title' => 'Before/After Images',
        'priority' => 42,
    ));

    // Before/After Image Sets
    for ($i = 1; $i <= 2; $i++) {
        $wp_customize->add_setting("beforeafter_before_{$i}", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "beforeafter_before_{$i}", array(
            'label' => "Before/After Set {$i} - Before Image",
            'section' => 'beforeafter_images',
            'settings' => "beforeafter_before_{$i}",
        )));

        $wp_customize->add_setting("beforeafter_after_{$i}", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "beforeafter_after_{$i}", array(
            'label' => "Before/After Set {$i} - After Image",
            'section' => 'beforeafter_images',
            'settings' => "beforeafter_after_{$i}",
        )));
    }

    // Color Scheme Section
    $wp_customize->add_section('color_scheme', array(
        'title' => 'Color Scheme',
        'priority' => 43,
    ));

    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#4f46e5',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => 'Primary Color',
        'section' => 'color_scheme',
        'settings' => 'primary_color',
    )));

    // Secondary Color
    $wp_customize->add_setting('secondary_color', array(
        'default' => '#1e293b',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label' => 'Secondary Color',
        'section' => 'color_scheme',
        'settings' => 'secondary_color',
    )));

    // Accent Color
    $wp_customize->add_setting('accent_color', array(
        'default' => '#a5b4fc',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label' => 'Accent Color',
        'section' => 'color_scheme',
        'settings' => 'accent_color',
    )));

    // Layout Options Section
    $wp_customize->add_section('layout_options', array(
        'title' => 'Layout Options',
        'priority' => 44,
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
}
add_action('customize_register', 'foto_services_customize_register');

// Add Custom Fields (ACF Alternative)
function foto_services_custom_fields() {
    // Service fields
    add_meta_box('service_details', 'Service Details', 'service_details_callback', 'service');

    // Portfolio fields
    add_meta_box('portfolio_details', 'Portfolio Details', 'portfolio_details_callback', 'portfolio');

    // Testimonial fields
    add_meta_box('testimonial_details', 'Testimonial Details', 'testimonial_details_callback', 'testimonial');
}
add_action('add_meta_boxes', 'foto_services_custom_fields');

function service_details_callback($post) {
    $icon = get_post_meta($post->ID, '_service_icon', true);
    $features = get_post_meta($post->ID, '_service_features', true);
    ?>
    <p>
        <label>Icon:</label>
        <input type="text" name="service_icon" value="<?php echo esc_attr($icon); ?>" placeholder="🖼️" />
    </p>
    <p>
        <label>Features (one per line):</label>
        <textarea name="service_features" rows="5" cols="50"><?php echo esc_textarea($features); ?></textarea>
    </p>
    <?php
}

function portfolio_details_callback($post) {
    $before_image = get_post_meta($post->ID, '_before_image', true);
    $after_image = get_post_meta($post->ID, '_after_image', true);
    ?>
    <p>
        <label>Before Image URL:</label>
        <input type="url" name="before_image" value="<?php echo esc_url($before_image); ?>" style="width:100%" />
    </p>
    <p>
        <label>After Image URL:</label>
        <input type="url" name="after_image" value="<?php echo esc_url($after_image); ?>" style="width:100%" />
    </p>
    <?php
}

function testimonial_details_callback($post) {
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    $author = get_post_meta($post->ID, '_testimonial_author', true);
    $location = get_post_meta($post->ID, '_testimonial_location', true);
    ?>
    <p>
        <label>Rating (1-5):</label>
        <input type="number" name="testimonial_rating" value="<?php echo esc_attr($rating); ?>" min="1" max="5" />
    </p>
    <p>
        <label>Author:</label>
        <input type="text" name="testimonial_author" value="<?php echo esc_attr($author); ?>" />
    </p>
    <p>
        <label>Location:</label>
        <input type="text" name="testimonial_location" value="<?php echo esc_attr($location); ?>" />
    </p>
    <?php
}

// Save custom fields
function save_custom_fields($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Service fields
    if (isset($_POST['service_icon'])) {
        update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
    }
    if (isset($_POST['service_features'])) {
        update_post_meta($post_id, '_service_features', sanitize_textarea_field($_POST['service_features']));
    }

    // Portfolio fields
    if (isset($_POST['before_image'])) {
        update_post_meta($post_id, '_before_image', esc_url_raw($_POST['before_image']));
    }
    if (isset($_POST['after_image'])) {
        update_post_meta($post_id, '_after_image', esc_url_raw($_POST['after_image']));
    }

    // Testimonial fields
    if (isset($_POST['testimonial_rating'])) {
        update_post_meta($post_id, '_testimonial_rating', intval($_POST['testimonial_rating']));
    }
    if (isset($_POST['testimonial_author'])) {
        update_post_meta($post_id, '_testimonial_author', sanitize_text_field($_POST['testimonial_author']));
    }
    if (isset($_POST['testimonial_location'])) {
        update_post_meta($post_id, '_testimonial_location', sanitize_text_field($_POST['testimonial_location']));
    }
}
add_action('save_post', 'save_custom_fields');

// Custom CSS output for color scheme
function foto_services_custom_css() {
    $primary_color = get_theme_mod('primary_color', '#4f46e5');
    $secondary_color = get_theme_mod('secondary_color', '#1e293b');
    $accent_color = get_theme_mod('accent_color', '#a5b4fc');
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html($primary_color); ?>;
            --secondary-color: <?php echo esc_html($secondary_color); ?>;
            --accent-color: <?php echo esc_html($accent_color); ?>;
        }

        /* Primary color overrides */
        .bg-indigo-600 {
            background-color: var(--primary-color) !important;
        }
        .hover\:bg-indigo-700:hover {
            background-color: color-mix(in srgb, var(--primary-color) 90%, black) !important;
        }
        .text-indigo-600 {
            color: var(--primary-color) !important;
        }
        .text-indigo-700 {
            color: color-mix(in srgb, var(--primary-color) 90%, black) !important;
        }
        .border-indigo-600 {
            border-color: var(--primary-color) !important;
        }

        /* Secondary color overrides */
        .bg-slate-900 {
            background-color: var(--secondary-color) !important;
        }
        .text-slate-900 {
            color: var(--secondary-color) !important;
        }

        /* Accent color overrides */
        .text-indigo-300 {
            color: var(--accent-color) !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'foto_services_custom_css');

// Contact form handler
function handle_contact_form() {
    if (isset($_POST['contact_form_submit'])) {
        $name = sanitize_text_field($_POST['contact_name']);
        $email = sanitize_email($_POST['contact_email']);
        $message = sanitize_textarea_field($_POST['contact_message']);

        // Get customizable email settings
        $to = get_theme_mod('contact_recipient_email', get_option('admin_email'));
        $subject = get_theme_mod('contact_email_subject', 'New Contact Form Submission - Foto Services');
        $from_name = get_theme_mod('contact_email_from_name', 'Foto Services Website');

        // Create email body
        $body = "You have received a new contact form submission:\n\n";
        $body .= "Name: " . $name . "\n";
        $body .= "Email: " . $email . "\n";
        $body .= "Message:\n" . $message . "\n\n";
        $body .= "---\n";
        $body .= "This email was sent from the contact form on " . get_bloginfo('name') . "\n";
        $body .= "Website: " . home_url() . "\n";
        $body .= "Time: " . current_time('Y-m-d H:i:s');

        // Set email headers
        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: ' . $from_name . ' <' . get_option('admin_email') . '>',
            'Reply-To: ' . $name . ' <' . $email . '>'
        );

        // Send email
        $sent = wp_mail($to, $subject, $body, $headers);

        // Enhanced debugging
        if (!$sent) {
            error_log('Contact form email failed to send. To: ' . $to . ', Subject: ' . $subject);
            // Store failed email for admin review
            update_option('foto_last_email_error', array(
                'to' => $to,
                'subject' => $subject,
                'body' => $body,
                'time' => current_time('Y-m-d H:i:s'),
                'error' => 'wp_mail returned false'
            ));
        } else {
            // Log successful send
            error_log('Contact form email sent successfully to: ' . $to);
            update_option('foto_last_email_success', array(
                'to' => $to,
                'subject' => $subject,
                'time' => current_time('Y-m-d H:i:s')
            ));
        }

        // Redirect with success message
        wp_redirect(add_query_arg('contact_sent', '1', wp_get_referer()));
        exit;
    }
}
add_action('init', 'handle_contact_form');

// Add admin menu for email debugging
function foto_services_admin_menu() {
    add_options_page(
        'Email Debug',
        'Email Debug',
        'manage_options',
        'foto-email-debug',
        'foto_services_email_debug_page'
    );
}
add_action('admin_menu', 'foto_services_admin_menu');

function foto_services_email_debug_page() {
    ?>
    <div class="wrap">
        <h1>Email Debug Status</h1>

        <?php
        $last_success = get_option('foto_last_email_success');
        $last_error = get_option('foto_last_email_error');
        $recipient_email = get_theme_mod('contact_recipient_email', get_option('admin_email'));
        ?>

        <h2>Current Settings</h2>
        <table class="form-table">
            <tr>
                <th>Recipient Email</th>
                <td><?php echo esc_html($recipient_email); ?></td>
            </tr>
            <tr>
                <th>WordPress Admin Email</th>
                <td><?php echo esc_html(get_option('admin_email')); ?></td>
            </tr>
        </table>

        <?php if ($last_success): ?>
        <h2>Last Successful Email</h2>
        <table class="form-table">
            <tr>
                <th>To</th>
                <td><?php echo esc_html($last_success['to']); ?></td>
            </tr>
            <tr>
                <th>Subject</th>
                <td><?php echo esc_html($last_success['subject']); ?></td>
            </tr>
            <tr>
                <th>Time</th>
                <td><?php echo esc_html($last_success['time']); ?></td>
            </tr>
        </table>
        <?php endif; ?>

        <?php if ($last_error): ?>
        <h2>Last Email Error</h2>
        <table class="form-table">
            <tr>
                <th>To</th>
                <td><?php echo esc_html($last_error['to']); ?></td>
            </tr>
            <tr>
                <th>Subject</th>
                <td><?php echo esc_html($last_error['subject']); ?></td>
            </tr>
            <tr>
                <th>Error</th>
                <td><?php echo esc_html($last_error['error']); ?></td>
            </tr>
            <tr>
                <th>Time</th>
                <td><?php echo esc_html($last_error['time']); ?></td>
            </tr>
            <tr>
                <th>Message Body</th>
                <td><pre><?php echo esc_html($last_error['body']); ?></pre></td>
            </tr>
        </table>
        <?php endif; ?>

        <h2>Send Test Email</h2>
        <?php if (isset($_POST['send_test_email'])): ?>
            <?php
            $test_to = sanitize_email($_POST['test_email']);
            if ($test_to) {
                $test_sent = wp_mail(
                    $test_to,
                    'Test Email from Foto Services',
                    "This is a test email sent at " . current_time('Y-m-d H:i:s') . "\n\nIf you received this, your email configuration is working!"
                );
                if ($test_sent) {
                    echo '<div class="notice notice-success"><p>Test email sent successfully to ' . esc_html($test_to) . '</p></div>';
                } else {
                    echo '<div class="notice notice-error"><p>Test email failed to send to ' . esc_html($test_to) . '</p></div>';
                }
            }
            ?>
        <?php endif; ?>

        <form method="post">
            <table class="form-table">
                <tr>
                    <th><label for="test_email">Send Test Email To:</label></th>
                    <td>
                        <input type="email" id="test_email" name="test_email" value="<?php echo esc_attr($recipient_email); ?>" class="regular-text" required />
                        <input type="submit" name="send_test_email" value="Send Test Email" class="button button-primary" />
                    </td>
                </tr>
            </table>
        </form>

        <h2>Troubleshooting</h2>
        <ul>
            <li><strong>Email not received?</strong> Check spam folder first</li>
            <li><strong>wp_mail failing?</strong> Your hosting may not support PHP mail(). Contact hosting provider</li>
            <li><strong>Want better delivery?</strong> Install SMTP plugin like "WP Mail SMTP"</li>
            <li><strong>Gmail users:</strong> Check "All Mail" and "Spam" folders</li>
        </ul>
    </div>
    <?php
}
?>