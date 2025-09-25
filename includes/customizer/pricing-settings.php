<?php
/**
 * Pricing Settings Customizer
 * Pricing services and bottom section configuration
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

function foto_services_pricing_customizer($wp_customize) {
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

    // Pricing Bottom Section
    $wp_customize->add_section('pricing_bottom', array(
        'title' => 'Pricing Bottom Section',
        'priority' => 36,
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
}