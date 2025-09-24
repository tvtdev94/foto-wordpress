<?php get_header(); ?>

<!-- HERO -->
<section id="hero" class="relative">
    <div class="absolute inset-0 -z-10">
        <img src="<?php echo esc_url(get_theme_mod('hero_background_image', 'https://images.unsplash.com/photo-1505691723518-36a5ac3b2a69?q=80&w=1600&auto=format&fit=crop')); ?>" alt="Luxury interior" class="w-full h-full object-cover"/>
        <div class="absolute inset-0 bg-slate-900/50"></div>
    </div>
    <div class="container mx-auto px-4 py-20 md:py-28 text-white">
        <div class="max-w-2xl">
            <span class="badge inline-block px-3 py-1 rounded-full text-xs text-white/90 bg-white/10 border border-white/20"><?php echo esc_html(get_theme_mod('hero_badge_text', 'Ảnh BĐS • Virtual Staging • Floor Plan')); ?></span>
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

<!-- SERVICES --><?php if (get_theme_mod('show_services_section', true)) : ?>
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
                include 'template-parts/default-services.php';
            endif;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- BEFORE / AFTER -->
<?php if (get_theme_mod('show_beforeafter_section', true)) : ?>
<section id="beforeafter" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold"><?php echo esc_html(get_theme_mod('beforeafter_title', 'Before / After')); ?></h2>
            <p class="mt-3 text-slate-600"><?php echo esc_html(get_theme_mod('beforeafter_subtitle', 'Kéo thanh trượt để xem khác biệt.')); ?></p>
        </div>
        <div class="mt-10 grid md:grid-cols-2 gap-8">
            <?php
            $portfolio = new WP_Query(array(
                'post_type' => 'portfolio',
                'posts_per_page' => 2,
                'post_status' => 'publish'
            ));

            if ($portfolio->have_posts()) :
                while ($portfolio->have_posts()) : $portfolio->the_post();
                    $before_image = get_post_meta(get_the_ID(), '_before_image', true);
                    $after_image = get_post_meta(get_the_ID(), '_after_image', true);
            ?>
                <div class="ba-wrap aspect-[16/10] shadow-smooth">
                    <img src="<?php echo esc_url($before_image); ?>" alt="Before" />
                    <div class="ba-after" style="width:50%">
                        <img src="<?php echo esc_url($after_image); ?>" alt="After" />
                    </div>
                    <div class="ba-handle left-1/2"></div>
                    <div class="ba-dot">↔</div>
                    <input type="range" min="0" max="100" value="50" class="absolute bottom-3 left-1/2 -translate-x-1/2 w-4/5" oninput="moveBA(this)"/>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default before/after if no custom posts
                include 'template-parts/default-beforeafter.php';
            endif;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- GALLERY -->
<?php if (get_theme_mod('show_gallery_section', true)) : ?>
<section id="gallery" class="py-20 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold"><?php echo esc_html(get_theme_mod('gallery_title', 'Gallery')); ?></h2>
            <p class="mt-3 text-slate-600"><?php echo esc_html(get_theme_mod('gallery_subtitle', 'Một vài ảnh minh họa phong cách xử lý.')); ?></p>
        </div>
        <?php
        $default_images = array(
            'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1505692794403-34cb4b7c7263?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1504626835342-6b01071d182e?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1523217582562-09d0def993a6?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1493809842364-78817add7ffb?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=1200&auto=format&fit=crop'
        );

        $gallery_columns = get_theme_mod('gallery_columns', '3');
        $grid_class = 'grid-cols-2 md:grid-cols-' . $gallery_columns;
        ?>
        <div class="mt-10 grid <?php echo esc_attr($grid_class); ?> gap-4">
            <?php

            for ($i = 1; $i <= 6; $i++) :
                $image = get_theme_mod("gallery_image_{$i}", $default_images[$i-1]);
                if ($image) :
            ?>
                <img class="rounded-xl shadow-smooth aspect-[4/3] object-cover" src="<?php echo esc_url($image); ?>" alt="Gallery <?php echo $i; ?>"/>
            <?php
                endif;
            endfor; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- PRICING -->
<?php if (get_theme_mod('show_pricing_section', true)) : ?>
<section id="pricing" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold"><?php echo esc_html(get_theme_mod('pricing_title', 'Bảng giá minh họa')); ?></h2>
            <p class="mt-3 text-slate-600"><?php echo esc_html(get_theme_mod('pricing_subtitle', 'Giá demo để tham khảo. Có thể tùy chỉnh theo khối lượng và yêu cầu.')); ?></p>
        </div>
        <div class="mt-10 grid md:grid-cols-3 gap-6">
            <?php
            // Check if any pricing plans are configured
            $has_pricing = false;
            for ($i = 1; $i <= 3; $i++) {
                if (get_theme_mod("price{$i}_label", '')) {
                    $has_pricing = true;
                    break;
                }
            }

            if ($has_pricing) :
                // Show configured pricing
                for ($i = 1; $i <= 3; $i++) :
                    $label = get_theme_mod("price{$i}_label", '');
                    if ($label) :
                        $borderClass = ($i == 2) ? 'border-2 border-indigo-600 bg-white' : 'border border-slate-200 bg-slate-50';
            ?>
                <div class="rounded-2xl p-6 shadow-smooth <?php echo $borderClass; ?>">
                    <div class="text-sm font-semibold text-indigo-600"><?php echo esc_html($label); ?></div>
                    <div class="mt-2 text-4xl font-extrabold">
                        <?php echo esc_html(get_theme_mod("price{$i}_price", '')); ?>
                        <span class="text-base text-slate-500"><?php echo esc_html(get_theme_mod("price{$i}_unit", '')); ?></span>
                    </div>
                    <ul class="mt-4 text-sm text-slate-600 space-y-2">
                        <?php
                        $feature1 = get_theme_mod("price{$i}_feature1", '');
                        $feature2 = get_theme_mod("price{$i}_feature2", '');
                        $feature3 = get_theme_mod("price{$i}_feature3", '');

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
                    <a href="#contact" class="mt-6 inline-block w-full text-center rounded-xl bg-indigo-600 text-white py-2.5 font-semibold hover:bg-indigo-700"><?php echo esc_html(get_theme_mod('pricing_button_text', 'Chọn gói')); ?></a>
                </div>
            <?php
                    endif;
                endfor;
            else :
                // Show default pricing
                include 'template-parts/default-pricing.php';
            endif;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>

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
                include 'template-parts/default-testimonials.php';
            endif;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>

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

<!-- CONTACT -->
<section id="contact" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-10 items-start">
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold"><?php echo esc_html(get_theme_mod('contact_title', 'Liên hệ')); ?></h2>
                <p class="mt-3 text-slate-600"><?php echo esc_html(get_theme_mod('contact_subtitle', 'Cho chúng tôi biết nhu cầu của bạn, team sẽ phản hồi ngay.')); ?></p>
                <ul class="mt-6 space-y-2 text-slate-700">
                    <li>✉️ <?php echo esc_html(get_theme_mod('contact_email', 'hello@fotoservices.com')); ?></li>
                    <li>📞 <?php echo esc_html(get_theme_mod('contact_phone', '+84 90 000 0000')); ?></li>
                    <li>🌐 <?php echo esc_html(get_theme_mod('contact_website', 'www.fotoservices.com')); ?></li>
                </ul>
                <?php if (isset($_GET['contact_sent'])) : ?>
                    <div class="mt-8 p-4 rounded-xl bg-green-50 border border-green-200 text-sm text-green-600">
                        <?php echo esc_html(get_theme_mod('contact_success_message', 'Cảm ơn bạn! Chúng tôi sẽ phản hồi sớm nhất.')); ?>
                    </div>
                <?php endif; ?>
            </div>
            <form method="POST" class="bg-slate-50 rounded-2xl p-6 border border-slate-200 shadow-smooth">
                <label class="block text-sm font-medium"><?php echo esc_html(get_theme_mod('contact_name_label', 'Tên của bạn')); ?></label>
                <input name="contact_name" required class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2" placeholder="<?php echo esc_attr(get_theme_mod('contact_name_placeholder', 'Nguyen Nguyen')); ?>" />

                <label class="block text-sm font-medium mt-4"><?php echo esc_html(get_theme_mod('contact_email_label', 'Email')); ?></label>
                <input name="contact_email" required type="email" class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2" placeholder="<?php echo esc_attr(get_theme_mod('contact_email_placeholder', 'you@email.com')); ?>" />

                <label class="block text-sm font-medium mt-4"><?php echo esc_html(get_theme_mod('contact_message_label', 'Nội dung')); ?></label>
                <textarea name="contact_message" rows="4" class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2" placeholder="<?php echo esc_attr(get_theme_mod('contact_message_placeholder', 'Mô tả nhu cầu, số lượng ảnh, deadline…')); ?>"></textarea>

                <button name="contact_form_submit" type="submit" class="mt-5 w-full rounded-xl bg-indigo-600 text-white py-2.5 font-semibold hover:bg-indigo-700"><?php echo esc_html(get_theme_mod('contact_button_text', 'Gửi yêu cầu')); ?></button>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>