<?php
/**
 * Plugin Name: Disable Widgets
 * Description: Prevents widget-related errors in customizer
 * Version: 1.0
 */

// Disable the customize_register action for widgets early
add_action('customize_register', function($wp_customize) {
    // Remove widgets panel
    $wp_customize->remove_panel('widgets');

    // Remove all widget sections
    global $wp_registered_sidebars;
    if (!empty($wp_registered_sidebars)) {
        foreach ($wp_registered_sidebars as $sidebar) {
            $wp_customize->remove_section('sidebar-widgets-' . $sidebar['id']);
        }
    }
}, 1);

// Prevent WP_Customize_Widgets from loading
add_filter('customize_loaded_components', function($components) {
    return array_diff($components, array('widgets'));
}, 1);

// Register a dummy sidebar to prevent null errors
add_action('widgets_init', function() {
    register_sidebar(array(
        'name' => 'Unused Sidebar',
        'id' => 'unused-sidebar-1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}, 1);