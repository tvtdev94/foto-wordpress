<!-- SERVICES GALLERY -->
<?php if (get_theme_mod('show_gallery_section', true)) : ?>
<section id="gallery" class="py-20 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold"><?php echo esc_html(get_theme_mod('gallery_title', 'Services Gallery')); ?></h2>
            <p class="mt-3 text-slate-600"><?php echo esc_html(get_theme_mod('gallery_subtitle', 'Click on each service to view detailed sample images.')); ?></p>
        </div>

        <?php
        // Default images as fallback
        $default_images = array(
            'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1504626835342-6b01071d182e?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1523217582562-09d0def993a6?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1493809842364-78817add7ffb?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1560185127-6ed189bf02f4?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=800&auto=format&fit=crop'
        );

        // Default titles and descriptions
        $default_data = array(
            array('title' => 'HDR/Flambient', 'description' => 'Blending multiple exposures to create bright, detailed, and true-to-life images.'),
            array('title' => 'Virtual Staging', 'description' => 'Transform empty spaces into beautifully styled rooms with digital furniture.'),
            array('title' => 'Floor Plan & Site Plan', 'description' => 'Accurate layouts that help buyers clearly understand the property structure.'),
            array('title' => 'Sky/Twilight Replace', 'description' => 'Enhance photos with dramatic sky replacements and twilight effects.'),
            array('title' => 'Reels/Shorts', 'description' => 'Short-form video content optimized for social media marketing.'),
            array('title' => 'Remove Objects', 'description' => 'Clean removal of unwanted objects, keeping photos neat and professional.'),
            array('title' => 'Day to Dusk', 'description' => 'Turn daytime shots into stunning twilight scenes with natural evening light.'),
            array('title' => 'Grass Enhancement', 'description' => 'Replace patchy grass with lush, vibrant green lawns.'),
            array('title' => 'Fire/Water Features', 'description' => 'Add realistic fire and water effects to enhance property features.'),
            array('title' => 'Color Correction', 'description' => 'Professional color grading for consistent, appealing property photos.'),
            array('title' => 'Perspective Correction', 'description' => 'Fix distorted lines and angles for professional architectural shots.')
        );

        // Build services gallery from customizer
        $services_gallery = array();
        for ($i = 1; $i <= 11; $i++) {
            $image_count = get_theme_mod("gallery_service{$i}_image_count", 1);
            $main_image = get_theme_mod("gallery_service{$i}_image1", $default_images[$i-1]);

            $services_gallery[] = array(
                'title' => get_theme_mod("gallery_service{$i}_title", $default_data[$i-1]['title']),
                'description' => get_theme_mod("gallery_service{$i}_description", $default_data[$i-1]['description']),
                'image' => $main_image,
                'image_count' => $image_count
            );
        }
        ?>

        <div class="mt-10 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php
            foreach ($services_gallery as $index => $service) :
            ?>
                <div class="relative group cursor-pointer service-gallery-item" data-service="<?php echo $index; ?>">
                    <img src="<?php echo esc_url($service['image']); ?>"
                         alt="<?php echo esc_attr($service['title']); ?>"
                         class="w-full h-48 object-cover rounded-xl shadow-smooth transition-all duration-300 group-hover:scale-105">

                    <div class="absolute inset-0 rounded-xl flex items-center justify-center transition-all duration-300" style="background: linear-gradient(to top, rgba(0,0,0,0.85), rgba(0,0,0,0.5), rgba(0,0,0,0.3));">
                        <div class="text-center text-white px-4">
                            <h3 class="text-lg font-bold mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><?php echo esc_html($service['title']); ?></h3>
                            <p class="text-xs leading-relaxed hidden md:block" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.7);"><?php echo esc_html($service['description']); ?></p>
                        </div>
                    </div>

                    <div class="absolute top-3 right-3 bg-white bg-opacity-20 rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>