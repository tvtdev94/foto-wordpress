<!-- CTA -->
<?php if (get_theme_mod('show_cta_section', true)) : ?>
<section class="py-16 bg-indigo-600 text-white">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-6">
        <div>
            <h3 class="text-2xl md:text-3xl font-extrabold"><?php echo esc_html(get_theme_mod('cta_title', 'Sẵn sàng tăng chất lượng listing của bạn?')); ?></h3>
            <p class="text-white/90 mt-1"><?php echo esc_html(get_theme_mod('cta_subtitle', 'Gửi thử 10 ảnh — nhận kết quả trong 12–24h.')); ?></p>
        </div>
        <a href="#contact" class="rounded-2xl bg-white text-indigo-700 px-6 py-3 font-semibold hover:bg-slate-100"><?php echo esc_html(get_theme_mod('cta_button_text', 'Nhận báo giá')); ?></a>
    </div>
</section>
<?php endif; ?>