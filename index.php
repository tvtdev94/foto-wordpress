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
            <?php foreach ($services_gallery as $index => $service) : ?>
                <div class="relative group cursor-pointer service-gallery-item" data-service="<?php echo $index; ?>">
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
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SERVICES MODAL -->
<div id="servicesModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 id="modalTitle" class="text-2xl md:text-3xl font-extrabold"></h2>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700 p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="mb-8">
                <p id="modalDescription" class="text-slate-600 mb-4"></p>
                <p id="modalDetails" class="text-slate-500 text-sm"></p>
            </div>

            <div id="modalThumbnails" class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <!-- Thumbnails sẽ được thêm bằng JavaScript -->
            </div>
        </div>
    </div>
</div>

<script>
// Pass PHP data to JavaScript
window.servicesThumbnails = {
    <?php for ($i = 1; $i <= 11; $i++) : ?>
    <?php echo $i - 1; ?>: [
        <?php for ($j = 1; $j <= 6; $j++) : ?>
        <?php
        $thumb = get_theme_mod("service_gallery_thumb_{$i}_{$j}", '');
        if (!$thumb) {
            // Fallback thumbnails
            $fallback_thumbs = array(
                'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=400&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1486304873000-235643847519?q=80&w=400&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?q=80&w=400&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=400&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1560185007-cde436f6a4d0?q=80&w=400&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=400&auto=format&fit=crop'
            );
            $thumb = $fallback_thumbs[($j - 1) % 6];
        }
        ?>
        '<?php echo esc_url($thumb); ?>'<?php echo ($j < 6) ? ',' : ''; ?>
        <?php endfor; ?>
    ]<?php echo ($i < 11) ? ',' : ''; ?>
    <?php endfor; ?>
};
</script>

<!-- IMAGE MODAL -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-90 z-60 hidden items-center justify-center p-4">
    <div class="relative max-w-6xl w-full max-h-[90vh] flex items-center justify-center">
        <button id="closeImageModal" class="absolute top-4 right-4 text-white hover:text-gray-300 p-2 z-10">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <img id="modalImage" src="" alt="Full size image" class="max-w-full max-h-full object-contain rounded-lg shadow-2xl">
    </div>
</div>
<?php endif; ?>

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
            include 'template-parts/default-pricing.php';
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