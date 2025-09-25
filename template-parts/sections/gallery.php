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
            'https://images.unsplash.com/photo-1505692794403-34cb4b7c7263?q=80&w=800&auto=format&fit=crop',
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

        $services_gallery = array(
            array(
                'title' => 'Single',
                'description' => 'Perfect for quick edits with natural lighting adjustments, giving your photos a clean and polished look.',
                'image' => get_theme_mod('service_gallery_image_1', $default_images[0])
            ),
            array(
                'title' => 'HDR',
                'description' => 'Blending multiple exposures to create bright, detailed, and true-to-life images that impress every viewer.',
                'image' => get_theme_mod('service_gallery_image_2', $default_images[1])
            ),
            array(
                'title' => 'Ambient Flash',
                'description' => 'Combining ambient light and flash shots for balanced lighting and natural colors in every room.',
                'image' => get_theme_mod('service_gallery_image_3', $default_images[2])
            ),
            array(
                'title' => '2D Floor Plan',
                'description' => 'Simple and accurate layouts that help buyers clearly understand the property\'s structure.',
                'image' => get_theme_mod('service_gallery_image_4', $default_images[3])
            ),
            array(
                'title' => '3D Floor Plan',
                'description' => 'Realistic 3D layouts that bring the property to life with depth and perspective.',
                'image' => get_theme_mod('service_gallery_image_5', $default_images[4])
            ),
            array(
                'title' => 'Virtual Staging',
                'description' => 'Instantly transform empty spaces into beautifully styled rooms with digital furniture and decor.',
                'image' => get_theme_mod('service_gallery_image_6', $default_images[5])
            ),
            array(
                'title' => 'Clear the Room',
                'description' => 'Showcase the true size of a space by removing all furniture and clutter.',
                'image' => get_theme_mod('service_gallery_image_7', $default_images[6])
            ),
            array(
                'title' => 'Clear the Room + VS',
                'description' => 'Start with a clean, empty room and then add stylish virtual staging for maximum impact.',
                'image' => get_theme_mod('service_gallery_image_8', $default_images[7])
            ),
            array(
                'title' => 'Item Removal',
                'description' => 'Say goodbye to unwanted objects or distractions, keeping your photos neat and professional.',
                'image' => get_theme_mod('service_gallery_image_9', $default_images[8])
            ),
            array(
                'title' => 'Natural Twilight',
                'description' => 'Turn daytime shots into stunning twilight scenes with soft, natural evening light.',
                'image' => get_theme_mod('service_gallery_image_10', $default_images[9])
            ),
            array(
                'title' => 'Virtual Twilight',
                'description' => 'Enhance exterior photos with a dramatic dusk effect, making every property stand out.',
                'image' => get_theme_mod('service_gallery_image_11', $default_images[10])
            )
        );
        ?>

        <div class="mt-10 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php
            $visible_index = 0;
            foreach ($services_gallery as $index => $service) :
                // Check if this service should be visible
                $is_visible = get_theme_mod("service_gallery_visible_" . ($index + 1), true);
                if (!$is_visible) continue;
            ?>
                <div class="relative group cursor-pointer service-gallery-item" data-service="<?php echo $visible_index; ?>">
                    <img src="<?php echo esc_url($service['image']); ?>"
                         alt="<?php echo esc_attr($service['title']); ?>"
                         class="w-full h-48 object-cover rounded-xl shadow-smooth transition-all duration-300 group-hover:scale-105">

                    <div class="absolute inset-0 bg-black bg-opacity-50 rounded-xl flex items-center justify-center transition-all duration-300 group-hover:bg-opacity-40">
                        <div class="text-center text-white px-4">
                            <h3 class="text-lg font-bold mb-2"><?php echo esc_html($service['title']); ?></h3>
                            <p class="text-xs opacity-90 leading-relaxed hidden md:block"><?php echo esc_html($service['description']); ?></p>
                        </div>
                    </div>

                    <div class="absolute top-3 right-3 bg-white bg-opacity-20 rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                </div>
            <?php
                $visible_index++;
            endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>