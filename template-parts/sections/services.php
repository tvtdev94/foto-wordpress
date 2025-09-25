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
            $default_titles = array(
                1 => 'HDR/Flambient',
                2 => 'Virtual Staging',
                3 => 'Floor Plan & Site Plan',
                4 => 'Sky/Twilight Replace',
                5 => 'Reels/Shorts',
                6 => 'Remove Objects'
            );

            for ($i = 1; $i <= 6; $i++) {
                $title = get_theme_mod("service{$i}_title", $default_titles[$i]);
                if ($title && $title !== '') {
                    $has_services = true;
                    break;
                }
            }

            if ($has_services) :
                // Show configured services
                $default_services = array(
                    1 => array(
                        'title' => 'HDR/Flambient',
                        'icon' => '🖼️',
                        'description' => 'Blend 3–5 phơi sáng, cân bằng trắng, kéo chi tiết cửa sổ tự nhiên, thẳng méo, xóa dây điện.',
                        'features' => array('Window Pull tự nhiên', 'Color cast control', 'Sharpen sạch sẽ')
                    ),
                    2 => array(
                        'title' => 'Virtual Staging',
                        'icon' => '🏡',
                        'description' => 'Dàn dựng nội thất ảo (phòng khách, ngủ, sân vườn), nhiều phong cách: modern, scandinavian, coastal…',
                        'features' => array('3–5 set/ảnh', 'Bố cục hợp lý', 'Bóng/ánh sáng chân thực')
                    ),
                    3 => array(
                        'title' => 'Floor Plan & Site Plan',
                        'icon' => '🧭',
                        'description' => 'Vẽ 2D/3D, quy chuẩn kích thước, hướng, chú thích phòng; xuất PNG/PDF/SVG.',
                        'features' => array('Clean vector', 'Branded style', 'File gốc để sửa')
                    ),
                    4 => array(
                        'title' => 'Sky/Twilight Replace',
                        'icon' => '🌅',
                        'description' => 'Thay bầu trời & twilight tự nhiên, giữ chi tiết kiến trúc, ánh sáng phản chiếu hợp lý.',
                        'features' => array('Nhiều preset', 'Không giả', 'Consistent màu')
                    ),
                    5 => array(
                        'title' => 'Reels/Shorts',
                        'icon' => '🎥',
                        'description' => 'Cắt dựng 15–60s, nhạc trend, subtitle rõ, hook mạnh — phù hợp agent marketing.',
                        'features' => array('Ratio 9:16/1:1/16:9', 'Logo & brand kit', 'Export đa nền tảng')
                    ),
                    6 => array(
                        'title' => 'Remove Objects',
                        'icon' => '🧹',
                        'description' => 'Loại bỏ vật thể 1–10+ items, dọn dây, thùng rác, vết bẩn; đi texture & ánh sáng mượt.',
                        'features' => array('Seamless retouch', 'Giữ chi tiết', 'Soát lỗi kỹ')
                    )
                );

                for ($i = 1; $i <= 6; $i++) :
                    $default = isset($default_services[$i]) ? $default_services[$i] : array();
                    $title = get_theme_mod("service{$i}_title", $default['title'] ?? '');
                    if ($title) :
            ?>
                <div class="p-6 bg-white rounded-2xl shadow-smooth">
                    <div class="text-2xl flex items-center gap-3">
                        <span><?php echo esc_html(get_theme_mod("service{$i}_icon", $default['icon'] ?? '')); ?></span>
                        <span><?php echo esc_html($title); ?></span>
                    </div>
                    <p class="mt-2 text-slate-600"><?php echo esc_html(get_theme_mod("service{$i}_description", $default['description'] ?? '')); ?></p>
                    <ul class="mt-4 text-sm text-slate-600 space-y-2">
                        <?php
                        $feature1 = get_theme_mod("service{$i}_feature1", $default['features'][0] ?? '');
                        $feature2 = get_theme_mod("service{$i}_feature2", $default['features'][1] ?? '');
                        $feature3 = get_theme_mod("service{$i}_feature3", $default['features'][2] ?? '');

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