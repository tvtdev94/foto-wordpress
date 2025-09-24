<!-- Detailed Pricing Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php
    // Define all pricing services with their defaults
    $pricing_services = array(
        array(
            'id' => 'single',
            'name' => 'Single',
            'price' => '$0.5',
            'unit' => '/photo',
            'features' => array('1 exposure', 'No window blending', 'Natural light & basic edit'),
            'featured' => false
        ),
        array(
            'id' => 'hdr',
            'name' => 'HDR',
            'price' => '$0.75',
            'unit' => '/photo',
            'features' => array('3–5 exposures', 'HDR editing', 'Balanced tones & window pulls'),
            'featured' => false
        ),
        array(
            'id' => 'hdr_flash',
            'name' => 'HDR + Flash Composite',
            'price' => '$0.85',
            'unit' => '/photo',
            'features' => array('3–5 exposures + 1 flash', 'Standard HDR & flash edit', 'Natural shadows & details'),
            'featured' => true
        ),
        array(
            'id' => 'multi_flash',
            'name' => 'Multi Flash',
            'price' => '$1.25',
            'unit' => '/photo',
            'features' => array('Multiple flash frames', 'Clean composite edit', 'Consistent color & light'),
            'featured' => false
        ),
        array(
            'id' => 'virtual_staging',
            'name' => 'Virtual Staging',
            'price' => '$12',
            'unit' => '/photo',
            'features' => array('Realistic furniture placement', 'Multiple style options', 'Natural shadows & reflections'),
            'featured' => false
        ),
        array(
            'id' => 'virtual_twilight',
            'name' => 'Virtual Twilight',
            'price' => '$5',
            'unit' => '/photo',
            'features' => array('Sunset/twilight sky replacement', 'Balanced warm tones', 'Natural building highlights'),
            'featured' => false
        ),
        array(
            'id' => 'object_removal',
            'name' => 'Object Removal',
            'price' => '$2–5',
            'unit' => '/photo',
            'features' => array('Remove 1–10 items', 'Seamless retouch', 'Preserve original details'),
            'featured' => false
        ),
        array(
            'id' => 'clear_room',
            'name' => 'Clear the Room',
            'price' => '$12',
            'unit' => '/photo',
            'features' => array('Remove all furniture/objects', 'Clean background restoration', 'Ready for virtual staging'),
            'featured' => false
        ),
        array(
            'id' => 'grass_replacement',
            'name' => 'Grass Replacement',
            'price' => '$2',
            'unit' => '/photo',
            'features' => array('Replace patchy or dead grass', 'Natural green tones', 'Blends with surroundings'),
            'featured' => false
        ),
        array(
            'id' => 'water_pool',
            'name' => 'Water in Pool',
            'price' => '$2',
            'unit' => '/photo',
            'features' => array('Add clear blue water', 'Natural reflections', 'Realistic depth look'),
            'featured' => false
        ),
        array(
            'id' => 'floor_2d',
            'name' => 'Custom 2D Floor Plan',
            'price' => 'From $10',
            'unit' => '/floor',
            'features' => array('Accurate dimensions', 'Branded styling', 'Editable source file'),
            'featured' => false
        ),
        array(
            'id' => 'floor_3d',
            'name' => 'Custom 3D Floor Plan',
            'price' => 'From $25',
            'unit' => '/floor',
            'features' => array('Realistic 3D modeling', 'Branded styling', 'High-res export'),
            'featured' => false
        ),
        array(
            'id' => 'video_editing',
            'name' => 'Video Editing',
            'price' => 'From $15',
            'unit' => '/video',
            'features' => array('15–60s clips', 'Music & subtitles', 'Multi-platform formats'),
            'featured' => false,
            'full_width' => true
        )
    );

    $visible_services = array();
    foreach ($pricing_services as $service) {
        // Check if service is visible
        $is_visible = get_theme_mod("pricing_{$service['id']}_visible", true);
        if (!$is_visible) continue;

        // Get customized values or use defaults
        $service['name'] = get_theme_mod("pricing_{$service['id']}_name", $service['name']);
        $service['price'] = get_theme_mod("pricing_{$service['id']}_price", $service['price']);
        $service['unit'] = get_theme_mod("pricing_{$service['id']}_unit", $service['unit']);

        // Get features from customizer - now has defaults so always get them
        $custom_features = array();
        for ($i = 1; $i <= 3; $i++) {
            // Since we now have defaults in customizer, always get the value
            $default_feature = isset($service['features'][$i-1]) ? $service['features'][$i-1] : '';
            $feature = get_theme_mod("pricing_{$service['id']}_feature{$i}", $default_feature);
            if ($feature) {
                $custom_features[] = $feature;
            }
        }
        // Always use features from customizer (which includes defaults)
        $service['features'] = $custom_features;

        $visible_services[] = $service;
    }

    // Display services
    $total_services = count($visible_services);
    foreach ($visible_services as $index => $service) :
        $borderClass = $service['featured'] ? 'border-2 border-indigo-600 bg-white' : 'border border-slate-200 bg-white';

        // Check if this is the last service and it's alone on different screen sizes
        $remainder_desktop = $total_services % 3;  // lg: 3 columns
        $remainder_tablet = $total_services % 2;   // md: 2 columns

        $is_last_alone_desktop = ($remainder_desktop == 1) && ($index == $total_services - 1);
        $is_last_alone_tablet = ($remainder_tablet == 1) && ($index == $total_services - 1);

        // Don't use full width if it's the last item alone
        $colSpanClass = '';
        $featuresClass = '';

        // Only use full width for video editing if there are enough items or it's not alone
        if (isset($service['full_width']) && $service['full_width']) {
            // Desktop (lg): full width if not alone
            if (!$is_last_alone_desktop) {
                $colSpanClass .= ' lg:col-span-3';
            }

            // Tablet (md): full width if not alone
            if (!$is_last_alone_tablet) {
                $colSpanClass .= ' md:col-span-2';
            }

            // Features layout: horizontal on larger screens if full width
            if (!$is_last_alone_desktop) {
                $featuresClass = 'lg:flex lg:space-y-0 lg:space-x-8';
            }
        }
    ?>
    <div class="rounded-2xl p-6 shadow-smooth <?php echo $borderClass; ?> <?php echo $colSpanClass; ?>">
        <div class="text-sm font-semibold text-indigo-600"><?php echo esc_html($service['name']); ?></div>
        <div class="mt-2 text-4xl font-extrabold">
            <?php echo esc_html($service['price']); ?>
            <span class="text-base text-slate-500"><?php echo esc_html($service['unit']); ?></span>
        </div>
        <ul class="mt-4 text-sm text-slate-600 space-y-2 <?php echo $featuresClass; ?>">
            <?php foreach ($service['features'] as $feature) : ?>
            <li class="service-feature"><?php echo esc_html($feature); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endforeach; ?>
</div>


<!-- Bottom Section -->
<div class="mt-12 bg-white rounded-2xl p-8 shadow-smooth border border-slate-100">
    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-8">
        <!-- Left side: Text content -->
        <div class="lg:flex-1">
            <h3 class="text-2xl font-bold text-slate-900"><?php echo esc_html(get_theme_mod('pricing_bottom_title', 'Flexible pricing for every studio')); ?></h3>
            <p class="mt-2 text-slate-600"><?php echo esc_html(get_theme_mod('pricing_bottom_subtitle', 'Volume-friendly quotes, transparent add-ons, and consistent turnaround. Ask for our rate card.')); ?></p>

            <div class="mt-6 space-y-3 text-sm text-slate-600">
                <?php
                $features = array(
                    get_theme_mod('pricing_bottom_feature1', 'No hidden fees'),
                    get_theme_mod('pricing_bottom_feature2', 'Next-morning delivery on most orders'),
                    get_theme_mod('pricing_bottom_feature3', 'Dedicated QC for key accounts')
                );

                foreach ($features as $feature) :
                    if ($feature) :
                ?>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span><?php echo esc_html($feature); ?></span>
                </div>
                <?php
                    endif;
                endforeach;
                ?>
            </div>
        </div>

        <!-- Right side: Button -->
        <div class="lg:flex-shrink-0 lg:self-center text-center lg:text-right">
            <a href="<?php echo esc_url(get_theme_mod('pricing_bottom_button_url', '#contact')); ?>" class="inline-block rounded-2xl bg-slate-900 text-white px-8 py-3 font-semibold hover:bg-slate-800 shadow-smooth"><?php echo esc_html(get_theme_mod('pricing_bottom_button_text', 'Request Pricing')); ?></a>
        </div>
    </div>
</div>