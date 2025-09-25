<?php
/**
 * Gallery and Testimonials Customizer
 * Gallery images and testimonials settings
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

function foto_services_gallery_testimonials_customizer($wp_customize) {
    // Testimonials Section
    $wp_customize->add_section('testimonials_content', array(
        'title' => 'Testimonials Content',
        'priority' => 36,
    ));

    $testimonials = array(
        1 => array('rating' => '★★★★★', 'content' => '"Ảnh consistent, window pull đẹp, giao nhanh 12h."', 'author' => 'Ben', 'location' => 'Sydney'),
        2 => array('rating' => '★★★★★', 'content' => '"Staging tự nhiên, khách xem là mê. Giá hợp lý."', 'author' => 'Mark', 'location' => 'Melbourne'),
        3 => array('rating' => '★★★★★', 'content' => '"Support nhiệt tình, sửa nhanh đúng ý."', 'author' => 'Brian', 'location' => 'California')
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

    // Services Gallery Images Section
    $wp_customize->add_section('services_gallery_images', array(
        'title' => 'Services Gallery Images',
        'priority' => 39,
    ));

    $service_names = array(
        'Single', 'HDR', 'Ambient Flash', '2D Floor Plan', '3D Floor Plan',
        'Virtual Staging', 'Clear the Room', 'Clear the Room + VS',
        'Item Removal', 'Natural Twilight', 'Virtual Twilight'
    );

    for ($i = 1; $i <= 11; $i++) {
        $service_name = $service_names[$i-1];

        // Visible checkbox for each service
        $wp_customize->add_setting("service_gallery_visible_{$i}", array(
            'default' => true,
            'sanitize_callback' => 'wp_validate_boolean',
        ));
        $wp_customize->add_control("service_gallery_visible_{$i}", array(
            'label' => "Show {$service_name}",
            'section' => 'services_gallery_images',
            'type' => 'checkbox',
        ));

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

    // Gallery Section
    $wp_customize->add_section('gallery_section', array(
        'title' => 'Gallery Section',
        'priority' => 39,
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
}