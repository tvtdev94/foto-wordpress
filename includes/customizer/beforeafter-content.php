<?php
/**
 * Before/After Content Customizer
 * Settings for 11 services with multiple before/after slides
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

function foto_beforeafter_content_customizer($wp_customize) {
    // 11 Services matching service gallery
    $services = array(
        1 => array(
            'title' => 'HDR/Flambient',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1560185007-cde436f6a4d0?q=80&w=800&auto=format&fit=crop'
                ),
                array(
                    'before' => 'https://images.unsplash.com/photo-1486304873000-235643847519?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?q=80&w=800&auto=format&fit=crop'
                ),
                array(
                    'before' => 'https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        2 => array(
            'title' => 'Virtual Staging',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1560185127-6ed189bf02f4?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=800&auto=format&fit=crop'
                ),
                array(
                    'before' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        3 => array(
            'title' => 'Floor Plan & Site Plan',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1493809842364-78817add7ffb?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        4 => array(
            'title' => 'Sky/Twilight Replace',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1560185127-6ed189bf02f4?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=800&auto=format&fit=crop'
                ),
                array(
                    'before' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        5 => array(
            'title' => 'Reels/Shorts',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1486304873000-235643847519?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        6 => array(
            'title' => 'Remove Objects',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=800&auto=format&fit=crop'
                ),
                array(
                    'before' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1560185127-6ed189bf02f4?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        7 => array(
            'title' => 'Day to Dusk',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        8 => array(
            'title' => 'Grass Enhancement',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        9 => array(
            'title' => 'Fire/Water Features',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1486304873000-235643847519?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        10 => array(
            'title' => 'Color Correction',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        11 => array(
            'title' => 'Perspective Correction',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1560185127-6ed189bf02f4?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=800&auto=format&fit=crop'
                )
            )
        )
    );

    foreach ($services as $num => $service) {
        // Service Title
        $wp_customize->add_setting("ba_service{$num}_title", array(
            'default' => $service['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("ba_service{$num}_title", array(
            'label' => "Service {$num} - Title",
            'section' => 'beforeafter_images',
            'type' => 'text',
        ));

        // Number of slides for this service (up to 10)
        $slide_count = count($service['slides']);
        for ($i = 1; $i <= 10; $i++) {
            $default_before = isset($service['slides'][$i-1]['before']) ? $service['slides'][$i-1]['before'] : '';
            $default_after = isset($service['slides'][$i-1]['after']) ? $service['slides'][$i-1]['after'] : '';

            // Before Image
            $wp_customize->add_setting("ba_service{$num}_slide{$i}_before", array(
                'default' => $default_before,
                'sanitize_callback' => 'esc_url_raw',
            ));
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "ba_service{$num}_slide{$i}_before", array(
                'label' => "Service {$num} - Slide {$i} Before",
                'section' => 'beforeafter_images',
            )));

            // After Image
            $wp_customize->add_setting("ba_service{$num}_slide{$i}_after", array(
                'default' => $default_after,
                'sanitize_callback' => 'esc_url_raw',
            ));
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "ba_service{$num}_slide{$i}_after", array(
                'label' => "Service {$num} - Slide {$i} After",
                'section' => 'beforeafter_images',
            )));
        }
    }
}
add_action('customize_register', 'foto_beforeafter_content_customizer');
