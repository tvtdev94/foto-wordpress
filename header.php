<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-slate-50 text-slate-900'); ?>>

<!-- Top Bar -->
<div class="bg-slate-900 text-white text-sm">
    <div class="container mx-auto px-4 py-2 flex items-center justify-between top-bar-container">
        <span class="top-bar-title">📸 Foto Services — Real Estate Photo Editing</span>
        <div class="flex items-center gap-4 opacity-90 top-bar-contacts">
            <a href="#contact" class="hover:underline">✉️ <?php echo esc_html(get_theme_mod('contact_email', 'hello@fotoservices.com')); ?></a>
            <a href="#contact" class="hover:underline inline-flex items-center gap-1">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="red" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                </svg>
                <?php echo esc_html(get_theme_mod('contact_phone', '+84 90 000 0000')); ?>
            </a>
        </div>
    </div>
</div>

<!-- Navbar -->
<header class="sticky top-0 z-40 bg-white/80 backdrop-blur border-b border-slate-200">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <a href="<?php echo home_url(); ?>" class="font-extrabold text-xl tracking-tight">
            <span class="text-slate-900">Foto</span><span class="text-indigo-600">Services</span>
        </a>

        <nav class="hidden md:flex items-center gap-6 text-sm">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'flex items-center gap-6 text-sm',
                'fallback_cb' => 'foto_services_fallback_menu'
            ));
            ?>
        </nav>

        <a href="#contact" class="inline-flex items-center gap-2 rounded-2xl bg-indigo-600 text-white px-5 py-2.5 text-sm font-semibold hover:bg-indigo-700 shadow-smooth header-cta-button"><?php echo esc_html(get_theme_mod('header_button_text', 'Nhận báo giá')); ?></a>
    </div>
</header>

<?php
function foto_services_fallback_menu() {
    $menu_items = array(
        1 => array('default_text' => 'Services', 'default_url' => '#services'),
        2 => array('default_text' => 'Before/After', 'default_url' => '#beforeafter'),
        3 => array('default_text' => 'Gallery', 'default_url' => '#gallery'),
        4 => array('default_text' => 'Pricing', 'default_url' => '#pricing'),
        5 => array('default_text' => 'FAQ', 'default_url' => '#faq')
    );

    foreach ($menu_items as $num => $item) {
        $text = get_theme_mod("nav_menu_item{$num}_text", $item['default_text']);
        $url = get_theme_mod("nav_menu_item{$num}_url", $item['default_url']);
        echo '<a href="' . esc_url($url) . '" class="hover:text-indigo-600">' . esc_html($text) . '</a>';
    }
}
?>