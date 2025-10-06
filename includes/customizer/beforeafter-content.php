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
            'title' => 'Single Exposure',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1560185007-cde436f6a4d0?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        2 => array(
            'title' => 'HDR',
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
        3 => array(
            'title' => 'Ambient Flash',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1486304873000-235643847519?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        4 => array(
            'title' => '2D Floor Plan',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1493809842364-78817add7ffb?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        5 => array(
            'title' => '3D Floor Plan',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1493809842364-78817add7ffb?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        6 => array(
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
        7 => array(
            'title' => 'Clear the Room',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1560185127-6ed189bf02f4?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        8 => array(
            'title' => 'Virtual Renovation',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        9 => array(
            'title' => 'Item Removal',
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
        10 => array(
            'title' => 'Natural Twilight',
            'slides' => array(
                array(
                    'before' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=800&auto=format&fit=crop',
                    'after' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=800&auto=format&fit=crop'
                )
            )
        ),
        11 => array(
            'title' => 'Virtual Twilight',
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
        )
    );

    // Create individual sections for each service
    foreach ($services as $num => $service) {
        $section_id = "beforeafter_service_{$num}";

        // Create section for this service with dynamic title
        $wp_customize->add_section($section_id, array(
            'title' => get_theme_mod("ba_service{$num}_title", $service['title']),
            'panel' => 'beforeafter_images',
            'priority' => $num * 10,
            'description' => "Cài đặt hình before/after cho service này",
        ));

        // Service Title
        $wp_customize->add_setting("ba_service{$num}_title", array(
            'default' => $service['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("ba_service{$num}_title", array(
            'label' => 'Service Title',
            'section' => $section_id,
            'type' => 'text',
            'priority' => 1,
        ));

        // Number of slides selector
        $default_slide_count = count($service['slides']);
        $slide_choices = array();
        for ($s = 1; $s <= 30; $s++) {
            $slide_choices[$s] = $s . ($s == 1 ? ' Slide' : ' Slides');
        }

        $wp_customize->add_setting("ba_service{$num}_slide_count", array(
            'default' => $default_slide_count,
            'sanitize_callback' => 'absint',
        ));
        $wp_customize->add_control("ba_service{$num}_slide_count", array(
            'label' => 'Number of Slides',
            'section' => $section_id,
            'type' => 'select',
            'priority' => 2,
            'choices' => $slide_choices,
            'description' => 'Chọn số lượng slide before/after cho service này (tối đa 30)',
        ));

        // Number of slides for this service (up to 30)
        $slide_count = count($service['slides']);
        for ($i = 1; $i <= 30; $i++) {
            $default_before = isset($service['slides'][$i-1]['before']) ? $service['slides'][$i-1]['before'] : '';
            $default_after = isset($service['slides'][$i-1]['after']) ? $service['slides'][$i-1]['after'] : '';

            // Before Image
            $wp_customize->add_setting("ba_service{$num}_slide{$i}_before", array(
                'default' => $default_before,
                'sanitize_callback' => 'esc_url_raw',
            ));
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "ba_service{$num}_slide{$i}_before", array(
                'label' => "Slide {$i} - Before",
                'section' => $section_id,
                'priority' => $i * 10 + 5,
            )));

            // After Image
            $wp_customize->add_setting("ba_service{$num}_slide{$i}_after", array(
                'default' => $default_after,
                'sanitize_callback' => 'esc_url_raw',
            ));
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "ba_service{$num}_slide{$i}_after", array(
                'label' => "Slide {$i} - After",
                'section' => $section_id,
                'priority' => $i * 10 + 6,
            )));
        }
    }

}
add_action('customize_register', 'foto_beforeafter_content_customizer');

// Enqueue customizer JavaScript for show/hide slides
function foto_beforeafter_customizer_js() {
    ?>
    <script type="text/javascript">
    (function($) {
        wp.customize.bind('ready', function() {
            // Handle all 11 services
            for (let serviceNum = 1; serviceNum <= 11; serviceNum++) {
                const settingId = 'ba_service' + serviceNum + '_slide_count';
                const titleSettingId = 'ba_service' + serviceNum + '_title';
                const sectionId = 'beforeafter_service_' + serviceNum;

                // Function to toggle slide visibility
                function toggleSlides(count) {
                    for (let i = 1; i <= 30; i++) {
                        const beforeControl = wp.customize.control('ba_service' + serviceNum + '_slide' + i + '_before');
                        const afterControl = wp.customize.control('ba_service' + serviceNum + '_slide' + i + '_after');

                        if (beforeControl && afterControl) {
                            if (i <= count) {
                                beforeControl.container.show();
                                afterControl.container.show();
                            } else {
                                beforeControl.container.hide();
                                afterControl.container.hide();
                            }
                        }
                    }
                }

                // Function to update section title (real-time)
                function updateSectionTitle(newTitle) {
                    const section = wp.customize.section(sectionId);
                    if (section) {
                        const $titleButton = section.container.find('.accordion-section-title');

                        // Find the first text node and update its value directly
                        const firstTextNode = $titleButton.contents().filter(function() {
                            return this.nodeType === 3; // Text node
                        }).get(0);

                        if (firstTextNode) {
                            firstTextNode.nodeValue = newTitle;
                        }
                    }
                }

                // Initial state
                const initialCount = wp.customize(settingId)();
                toggleSlides(initialCount);

                // Real-time title update
                wp.customize(titleSettingId, function(setting) {
                    setting.bind(function(newValue) {
                        updateSectionTitle(newValue);
                    });
                });

                // Listen for slide count changes
                wp.customize(settingId, function(setting) {
                    setting.bind(function(newValue) {
                        toggleSlides(parseInt(newValue));
                    });
                });
            }
        });
    })(jQuery);
    </script>
    <?php
}
add_action('customize_controls_print_footer_scripts', 'foto_beforeafter_customizer_js');
