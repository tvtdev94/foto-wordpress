<?php
/**
 * Theme Customizer
 * Main customizer file - includes all modular customizer components
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include all customizer components
require_once get_template_directory() . '/includes/customizer/homepage-settings.php';
require_once get_template_directory() . '/includes/customizer/services-content.php';
require_once get_template_directory() . '/includes/customizer/pricing-settings.php';
require_once get_template_directory() . '/includes/customizer/gallery-testimonials.php';
require_once get_template_directory() . '/includes/customizer/layout-styling.php';

// Add Theme Customizer
function foto_services_customize_register($wp_customize) {
    // Include all customizer sections
    foto_services_homepage_customizer($wp_customize);
    foto_services_services_customizer($wp_customize);
    foto_services_pricing_customizer($wp_customize);
    foto_services_gallery_testimonials_customizer($wp_customize);
    foto_services_layout_styling_customizer($wp_customize);
}
add_action('customize_register', 'foto_services_customize_register');