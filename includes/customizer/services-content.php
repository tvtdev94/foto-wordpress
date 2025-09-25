<?php
/**
 * Services Content Customizer
 * Service descriptions, features, and contact form settings
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

function foto_services_services_customizer($wp_customize) {
    // Services Content Section
    $wp_customize->add_section('services_content', array(
        'title' => 'Services Content',
        'priority' => 34,
    ));

    $services = array(
        1 => array(
            'title' => 'HDR/Flambient',
            'icon' => '🖼️',
            'description' => 'Blend 3–5 phơi sáng, cân bằng trắng, kéo chi tiết cửa sổ tự nhiên, thẳng méo, xóa dây điện.',
            'features' => array('Window Pull tự nhiên', 'Color cast control', 'Sharpen sạch sẽ')
        ),
        2 => array(
            'title' => 'Virtual Staging',
            'icon' => '🏡',
            'description' => 'Dàn dựng nội thất ảo (phòng khách, ngủ, sân vườn), nhiều phong cách: modern, scandinavian, coastal…',
            'features' => array('3–5 set/ảnh', 'Bố cục hợp lý', 'Bóng/ánh sáng chân thực')
        ),
        3 => array(
            'title' => 'Floor Plan & Site Plan',
            'icon' => '🧭',
            'description' => 'Vẽ 2D/3D, quy chuẩn kích thước, hướng, chú thích phòng; xuất PNG/PDF/SVG.',
            'features' => array('Clean vector', 'Branded style', 'File gốc để sửa')
        ),
        4 => array(
            'title' => 'Sky/Twilight Replace',
            'icon' => '🌅',
            'description' => 'Thay bầu trời & twilight tự nhiên, giữ chi tiết kiến trúc, ánh sáng phản chiếu hợp lý.',
            'features' => array('Nhiều preset', 'Không giả', 'Consistent màu')
        ),
        5 => array(
            'title' => 'Reels/Shorts',
            'icon' => '🎥',
            'description' => 'Cắt dựng 15–60s, nhạc trend, subtitle rõ, hook mạnh — phù hợp agent marketing.',
            'features' => array('Ratio 9:16/1:1/16:9', 'Logo & brand kit', 'Export đa nền tảng')
        ),
        6 => array(
            'title' => 'Remove Objects',
            'icon' => '🧹',
            'description' => 'Loại bỏ vật thể 1–10+ items, dọn dây, thùng rác, vết bẩn; đi texture & ánh sáng mượt.',
            'features' => array('Seamless retouch', 'Giữ chi tiết', 'Soát lỗi kỹ')
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

    // Contact Form Section
    $wp_customize->add_section('contact_form', array(
        'title' => 'Contact Form Content',
        'priority' => 37,
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
}