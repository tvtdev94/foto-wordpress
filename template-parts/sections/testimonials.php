<!-- TESTIMONIALS -->
<?php if (get_theme_mod('show_testimonials_section', true)) : ?>
<section class="py-20 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold"><?php echo esc_html(get_theme_mod('testimonials_title', 'Khách hàng nói gì')); ?></h2>
            <p class="mt-3 text-slate-600"><?php echo esc_html(get_theme_mod('testimonials_subtitle', 'Từ agent & studio ở AU/US.')); ?></p>
        </div>
        <div class="mt-10 grid md:grid-cols-3 gap-6">
            <?php
            // Check if any testimonials are configured
            $has_testimonials = false;
            for ($i = 1; $i <= 3; $i++) {
                if (get_theme_mod("testimonial{$i}_content", '')) {
                    $has_testimonials = true;
                    break;
                }
            }

            if ($has_testimonials) :
                // Show configured testimonials
                for ($i = 1; $i <= 3; $i++) :
                    $content = get_theme_mod("testimonial{$i}_content", '');
                    if ($content) :
            ?>
                <div class="bg-white rounded-2xl p-6 shadow-smooth">
                    <div class="text-yellow-500"><?php echo esc_html(get_theme_mod("testimonial{$i}_rating", '')); ?></div>
                    <p class="mt-3 text-slate-700"><?php echo esc_html($content); ?></p>
                    <div class="mt-4 text-sm text-slate-500">
                        — <?php echo esc_html(get_theme_mod("testimonial{$i}_author", '')); ?>,
                        <?php echo esc_html(get_theme_mod("testimonial{$i}_location", '')); ?>
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