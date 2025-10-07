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
require_once get_template_directory() . '/includes/customizer/export-import-settings.php';

// Bật hỗ trợ widget truyền thống
function mytheme_setup() {
    add_theme_support( 'widgets' );
    add_theme_support( 'customize-widgets' ); // để dùng trong Customizer
}
add_action( 'after_setup_theme', 'mytheme_setup' );

// Add favicon
function mytheme_add_favicon() {
    echo '<link rel="icon" type="image/png" href="' . get_template_directory_uri() . '/favicon.png">';
}
add_action( 'wp_head', 'mytheme_add_favicon' );

// Đăng ký sidebar/widget area
function mytheme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'mytheme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Main Sidebar', 'mytheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'mytheme_widgets_init' );