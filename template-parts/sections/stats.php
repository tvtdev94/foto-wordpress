<!-- TRUST / STATS -->
<?php if (get_theme_mod('show_stats_section', true)) : ?>
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
        <div class="p-6 rounded-2xl bg-slate-50 shadow-smooth">
            <div class="text-3xl font-extrabold"><?php echo esc_html(get_theme_mod('stat1_number', '1.2M+')); ?></div>
            <div class="text-slate-500 text-sm"><?php echo esc_html(get_theme_mod('stat1_text', 'Ảnh đã xử lý')); ?></div>
        </div>
        <div class="p-6 rounded-2xl bg-slate-50 shadow-smooth">
            <div class="text-3xl font-extrabold"><?php echo esc_html(get_theme_mod('stat2_number', '12–24h')); ?></div>
            <div class="text-slate-500 text-sm"><?php echo esc_html(get_theme_mod('stat2_text', 'Tốc độ giao')); ?></div>
        </div>
        <div class="p-6 rounded-2xl bg-slate-50 shadow-smooth">
            <div class="text-3xl font-extrabold"><?php echo esc_html(get_theme_mod('stat3_number', '99.5%')); ?></div>
            <div class="text-slate-500 text-sm"><?php echo esc_html(get_theme_mod('stat3_text', 'Đúng hạn')); ?></div>
        </div>
        <div class="p-6 rounded-2xl bg-slate-50 shadow-smooth">
            <div class="text-3xl font-extrabold"><?php echo esc_html(get_theme_mod('stat4_number', '4.9/5')); ?></div>
            <div class="text-slate-500 text-sm"><?php echo esc_html(get_theme_mod('stat4_text', 'Đánh giá TB')); ?></div>
        </div>
    </div>
</section>
<?php endif; ?>