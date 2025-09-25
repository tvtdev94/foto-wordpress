<!-- SERVICES -->
<?php if (get_theme_mod('show_services_section', true)) : ?>
<section id="services" class="py-20 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-extrabold"><?php echo esc_html(get_theme_mod('services_title', 'Dịch vụ của chúng tôi')); ?></h2>
            <p class="mt-3 text-slate-600"><?php echo esc_html(get_theme_mod('services_subtitle', 'Tối ưu cho nhiếp ảnh BĐS: chất lượng nhất quán, quy trình rõ ràng, chi phí hợp lý.')); ?></p>
        </div>
        <div class="mt-10 grid md:grid-cols-3 gap-6">
            <?php
            // Check if any services are configured
            $has_services = false;
            for ($i = 1; $i <= 6; $i++) {
                if (get_theme_mod("service{$i}_title", '')) {
                    $has_services = true;
                    break;
                }
            }

            if ($has_services) :
                // Show configured services
                for ($i = 1; $i <= 6; $i++) :
                    $title = get_theme_mod("service{$i}_title", '');
                    if ($title) :
            ?>
                <div class="p-6 bg-white rounded-2xl shadow-smooth">
                    <div class="text-2xl flex items-center gap-3">
                        <span><?php echo esc_html(get_theme_mod("service{$i}_icon", '')); ?></span>
                        <span><?php echo esc_html($title); ?></span>
                    </div>
                    <p class="mt-2 text-slate-600"><?php echo esc_html(get_theme_mod("service{$i}_description", '')); ?></p>
                    <ul class="mt-4 text-sm text-slate-600 space-y-2">
                        <?php
                        $feature1 = get_theme_mod("service{$i}_feature1", '');
                        $feature2 = get_theme_mod("service{$i}_feature2", '');
                        $feature3 = get_theme_mod("service{$i}_feature3", '');

                        if ($feature1) : ?>
                            <li class="service-feature"><?php echo esc_html($feature1); ?></li>
                        <?php endif; ?>
                        <?php if ($feature2) : ?>
                            <li class="service-feature"><?php echo esc_html($feature2); ?></li>
                        <?php endif; ?>
                        <?php if ($feature3) : ?>
                            <li class="service-feature"><?php echo esc_html($feature3); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php
                    endif;
                endfor;
            else :
                // Show default services
                include get_template_directory() . '/template-parts/default-services.php';
            endif;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>