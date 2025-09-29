<?php
/**
 * Theme Setup Functions
 * Contains all theme setup and enqueue functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

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
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap', array(), null);

    // Enqueue Tailwind CSS (local)
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/assets/css/tailwind.css', array(), wp_get_theme()->get('Version'));

    // Enqueue theme styles
    wp_enqueue_style('foto-services-style', get_stylesheet_uri(), array('tailwindcss'), wp_get_theme()->get('Version'));

    // Enqueue custom JS
    wp_enqueue_script('foto-services-script', get_template_directory_uri() . '/js/script.js', array(), time(), true);
}
add_action('wp_enqueue_scripts', 'foto_services_scripts');

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