<!-- PRICING -->
<?php if (get_theme_mod('show_pricing_section', true)) : ?>
<section id="pricing" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold"><?php echo esc_html(get_theme_mod('pricing_title', 'Pricing')); ?></h2>
            <p class="mt-3 text-slate-600"><?php echo esc_html(get_theme_mod('pricing_subtitle', 'Reference pricing — final rates depend on project volume and requirements.')); ?></p>
        </div>
        <div class="mt-10">
            <?php
            // Always show the new detailed pricing template
            include get_template_directory() . '/template-parts/default-pricing.php';
            ?>
        </div>
    </div>
</section>
<?php endif; ?>