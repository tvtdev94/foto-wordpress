<?php
/**
 * Gallery Images Content Customizer
 * Settings for 11 services with multiple gallery images
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

function foto_gallery_images_customizer($wp_customize) {
    // 11 Services matching service gallery
    $services = array(
        1 => array(
            'title' => 'HDR/Flambient',
            'description' => 'Blending multiple exposures to create bright, detailed, and true-to-life images that impress every viewer.',
            'images' => array(
                'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=800&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1560185007-cde436f6a4d0?q=80&w=800&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1486304873000-235643847519?q=80&w=800&auto=format&fit=crop'
            )
        ),
        2 => array(
            'title' => 'Virtual Staging',
            'description' => 'Instantly transform empty spaces into beautifully styled rooms with digital furniture and decor.',
            'images' => array(
                'https://images.unsplash.com/photo-1560185127-6ed189bf02f4?q=80&w=800&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=800&auto=format&fit=crop'
            )
        ),
        3 => array(
            'title' => 'Floor Plan & Site Plan',
            'description' => 'Simple and accurate layouts that help buyers clearly understand the property\'s structure.',
            'images' => array(
                'https://images.unsplash.com/photo-1493809842364-78817add7ffb?q=80&w=800&auto=format&fit=crop'
            )
        ),
        4 => array(
            'title' => 'Sky/Twilight Replace',
            'description' => 'Enhance exterior photos with a dramatic dusk effect, making every property stand out.',
            'images' => array(
                'https://images.unsplash.com/photo-1560185127-6ed189bf02f4?q=80&w=800&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=800&auto=format&fit=crop'
            )
        ),
        5 => array(
            'title' => 'Reels/Shorts',
            'description' => 'Short-form video content optimized for social media marketing and engagement.',
            'images' => array(
                'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=800&auto=format&fit=crop'
            )
        ),
        6 => array(
            'title' => 'Remove Objects',
            'description' => 'Say goodbye to unwanted objects or distractions, keeping your photos neat and professional.',
            'images' => array(
                'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?q=80&w=800&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=800&auto=format&fit=crop'
            )
        ),
        7 => array(
            'title' => 'Day to Dusk',
            'description' => 'Turn daytime shots into stunning twilight scenes with soft, natural evening light.',
            'images' => array(
                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=800&auto=format&fit=crop'
            )
        ),
        8 => array(
            'title' => 'Grass Enhancement',
            'description' => 'Replace patchy grass with lush, vibrant green lawns that enhance curb appeal.',
            'images' => array(
                'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?q=80&w=800&auto=format&fit=crop'
            )
        ),
        9 => array(
            'title' => 'Fire/Water Features',
            'description' => 'Add realistic fire and water effects to enhance property features and atmosphere.',
            'images' => array(
                'https://images.unsplash.com/photo-1486304873000-235643847519?q=80&w=800&auto=format&fit=crop'
            )
        ),
        10 => array(
            'title' => 'Color Correction',
            'description' => 'Professional color grading for consistent, appealing property photos across all listings.',
            'images' => array(
                'https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=800&auto=format&fit=crop'
            )
        ),
        11 => array(
            'title' => 'Perspective Correction',
            'description' => 'Fix distorted lines and angles for professional architectural shots that look perfect.',
            'images' => array(
                'https://images.unsplash.com/photo-1560185127-6ed189bf02f4?q=80&w=800&auto=format&fit=crop'
            )
        )
    );

    // Create individual sections for each service
    foreach ($services as $num => $service) {
        $section_id = "gallery_images_service_{$num}";

        // Create section for this service with dynamic title
        $wp_customize->add_section($section_id, array(
            'title' => get_theme_mod("gallery_service{$num}_title", $service['title']),
            'panel' => 'gallery_images',
            'priority' => $num * 10,
            'description' => "Cài đặt gallery images cho service này",
        ));

        // Service Title
        $wp_customize->add_setting("gallery_service{$num}_title", array(
            'default' => $service['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("gallery_service{$num}_title", array(
            'label' => 'Service Title',
            'section' => $section_id,
            'type' => 'text',
            'priority' => 1,
        ));

        // Service Description
        $wp_customize->add_setting("gallery_service{$num}_description", array(
            'default' => $service['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("gallery_service{$num}_description", array(
            'label' => 'Service Description',
            'section' => $section_id,
            'type' => 'textarea',
            'priority' => 1.5,
            'description' => 'Mô tả ngắn cho service này',
        ));

        // Number of images selector
        $default_image_count = count($service['images']);
        $image_choices = array();
        for ($s = 1; $s <= 30; $s++) {
            $image_choices[$s] = $s . ($s == 1 ? ' Image' : ' Images');
        }

        $wp_customize->add_setting("gallery_service{$num}_image_count", array(
            'default' => $default_image_count,
            'sanitize_callback' => 'absint',
        ));
        $wp_customize->add_control("gallery_service{$num}_image_count", array(
            'label' => 'Number of Images',
            'section' => $section_id,
            'type' => 'select',
            'priority' => 2,
            'choices' => $image_choices,
            'description' => 'Chọn số lượng hình cho service này (tối đa 30)',
        ));

        // Number of images for this service (up to 30)
        for ($i = 1; $i <= 30; $i++) {
            $default_image = isset($service['images'][$i-1]) ? $service['images'][$i-1] : '';

            // Gallery Image
            $wp_customize->add_setting("gallery_service{$num}_image{$i}", array(
                'default' => $default_image,
                'sanitize_callback' => 'esc_url_raw',
            ));
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "gallery_service{$num}_image{$i}", array(
                'label' => "Image {$i}",
                'section' => $section_id,
                'priority' => $i * 10 + 5,
            )));
        }
    }

}
add_action('customize_register', 'foto_gallery_images_customizer');

// Enqueue customizer JavaScript for show/hide images
function foto_gallery_images_customizer_js() {
    ?>
    <script type="text/javascript">
    (function($) {
        wp.customize.bind('ready', function() {
            // Handle all 11 services
            for (let serviceNum = 1; serviceNum <= 11; serviceNum++) {
                const settingId = 'gallery_service' + serviceNum + '_image_count';

                // Function to toggle image visibility
                function toggleImages(count) {
                    for (let i = 1; i <= 30; i++) {
                        const imageControl = wp.customize.control('gallery_service' + serviceNum + '_image' + i);

                        if (imageControl) {
                            if (i <= count) {
                                imageControl.container.show();
                            } else {
                                imageControl.container.hide();
                            }
                        }
                    }
                }

                // Initial state
                const initialCount = wp.customize(settingId)();
                toggleImages(initialCount);

                // Listen for image count changes
                wp.customize(settingId, function(setting) {
                    setting.bind(function(newValue) {
                        toggleImages(parseInt(newValue));
                    });
                });
            }
        });
    })(jQuery);
    </script>
    <?php
}
add_action('customize_controls_print_footer_scripts', 'foto_gallery_images_customizer_js');
