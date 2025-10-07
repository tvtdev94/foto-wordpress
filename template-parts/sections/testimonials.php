<!-- TESTIMONIALS -->
<?php if (get_theme_mod('show_testimonials_section', true)) : ?>
<section class="py-20 bg-blue-50">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"><?php echo esc_html(get_theme_mod('testimonials_title', 'What Our Clients Say')); ?></h2>
            <p class="text-lg text-gray-600"><?php echo esc_html(get_theme_mod('testimonials_subtitle', 'Real feedback from professionals who trust Foto Services.')); ?></p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
            <?php
            // Check if any testimonials are configured
            $has_testimonials = false;
            for ($i = 1; $i <= 6; $i++) {
                if (get_theme_mod("testimonial{$i}_content", '')) {
                    $has_testimonials = true;
                    break;
                }
            }

            if ($has_testimonials) :
                // Show configured testimonials
                for ($i = 1; $i <= 6; $i++) :
                    $content = get_theme_mod("testimonial{$i}_content", '');
                    if ($content) :
            ?>
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-yellow-400 text-lg mb-3"><?php echo esc_html(get_theme_mod("testimonial{$i}_rating", '')); ?></div>
                    <p class="text-gray-700 text-base leading-relaxed mb-4"><?php echo esc_html($content); ?></p>
                    <div class="text-sm text-gray-600">
                        — <span class="font-extrabold"><?php echo esc_html(get_theme_mod("testimonial{$i}_author", '')); ?>,
                        <?php echo esc_html(get_theme_mod("testimonial{$i}_location", '')); ?></span>
                    </div>
                </div>
            <?php
                    endif;
                endfor;
            else :
                // Show default testimonials
                include get_template_directory() . '/template-parts/default-testimonials.php';
            endif;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>