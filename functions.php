<?php
/**
 * Foto Services Theme Functions
 * Main functions file - includes all modular components
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include all theme components
require_once get_template_directory() . '/includes/theme-setup.php';
require_once get_template_directory() . '/includes/custom-post-types.php';
require_once get_template_directory() . '/includes/theme-customizer.php';
require_once get_template_directory() . '/includes/custom-fields.php';
require_once get_template_directory() . '/includes/contact-form.php';
require_once get_template_directory() . '/includes/admin-functions.php';