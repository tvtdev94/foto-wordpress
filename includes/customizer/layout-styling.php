<?php
/**
 * Layout and Styling Customizer
 * Color scheme and layout options
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

function foto_services_layout_styling_customizer($wp_customize) {
    // Color Scheme Section
    $wp_customize->add_section('color_scheme', array(
        'title' => 'Color Scheme',
        'priority' => 43,
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