<!-- HERO -->
<section id="hero" class="relative">
    <div class="absolute inset-0 -z-10">
        <img src="<?php echo esc_url(get_theme_mod('hero_background_image', 'https://images.unsplash.com/photo-1501183638710-841dd1904471?q=80&w=1600&auto=format&fit=crop')); ?>" alt="Luxury interior" class="w-full h-full object-cover"/>
        <div class="absolute inset-0 bg-slate-900/50"></div>
    </div>
    <div class="container mx-auto px-4 py-20 md:py-28 text-white">
        <div class="max-w-2xl">
            <span class="badge inline-block px-3 py-1 rounded-full text-xs text-slate-900 bg-white/90 border border-white/20 font-medium"><?php echo esc_html(get_theme_mod('hero_badge_text', 'Ảnh BĐS • Virtual Staging • Floor Plan')); ?></span>
            <h1 class="mt-4 text-4xl md:text-6xl font-extrabold leading-tight">
                <?php echo esc_html(get_theme_mod('hero_title', 'Biến ảnh thô thành')); ?>
                <span class="text-indigo-300"><?php echo esc_html(get_theme_mod('hero_title_highlight', 'tác phẩm bán hàng')); ?></span>
            </h1>
            <p class="mt-4 text-white/90 text-lg">
                <?php echo esc_html(get_theme_mod('hero_description', 'Đối tác hậu kỳ đáng tin cậy cho nhiếp ảnh BĐS: HDR/Flambient, xóa vật thể, sky replacement, twilight, virtual staging, video ngắn & sơ đồ mặt bằng.')); ?>
            </p>
            <div class="mt-8 flex items-center gap-3">
                <a href="#contact" class="rounded-2xl bg-indigo-600 px-6 py-3 font-semibold hover:bg-indigo-700 shadow-smooth"><?php echo esc_html(get_theme_mod('hero_button1_text', 'Bắt đầu ngay')); ?></a>
                <a href="#services" class="rounded-2xl bg-white/80 text-slate-900 px-6 py-3 font-semibold hover:bg-white shadow-smooth"><?php echo esc_html(get_theme_mod('hero_button2_text', 'Xem dịch vụ')); ?></a>
            </div>
            <div class="mt-8 flex items-center gap-6 text-white/80 text-sm">
                <div><?php echo esc_html(get_theme_mod('hero_badge1', '⚡ Turnaround 12–24h')); ?></div>
                <div><?php echo esc_html(get_theme_mod('hero_badge2', '🛡️ QC 2 lớp')); ?></div>
                <div><?php echo esc_html(get_theme_mod('hero_badge3', '🌍 Khách hàng AU/US')); ?></div>
            </div>
        </div>
    </div>
</section>