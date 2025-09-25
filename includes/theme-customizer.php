<?php
/**
 * Theme Customizer
 * Main customizer file - includes reorganized customizer structure
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include the reorganized customizer
require_once get_template_directory() . '/includes/customizer/reorganized-customizer.php';

// Add Theme Customizer
function foto_services_customize_register($wp_customize) {
    // Use the reorganized customizer function
    foto_services_reorganized_customizer($wp_customize);
}
add_action('customize_register', 'foto_services_customize_register');