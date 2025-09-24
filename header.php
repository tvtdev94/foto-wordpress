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
    <div class="container mx-auto px-4 py-2 flex items-center justify-between">
        <span>📸 Foto Services — Real Estate Photo Editing</span>
        <div class="flex items-center gap-4 opacity-90">
            <a href="#contact" class="hover:underline">✉️ <?php echo esc_html(get_theme_mod('contact_email', 'hello@fotoservices.com')); ?></a>
            <a href="#contact" class="hover:underline">📞 <?php echo esc_html(get_theme_mod('contact_phone', '+84 90 000 0000')); ?></a>
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

        <a href="#contact" class="inline-flex items-center gap-2 rounded-2xl bg-indigo-600 text-white px-5 py-2.5 text-sm font-semibold hover:bg-indigo-700 shadow-smooth"><?php echo esc_html(get_theme_mod('header_button_text', 'Nhận báo giá')); ?></a>
    </div>
</header>

<?php
function foto_services_fallback_menu() {
    ?>
    <a href="#services" class="hover:text-indigo-600">Dịch vụ</a>
    <a href="#beforeafter" class="hover:text-indigo-600">Before/After</a>
    <a href="#gallery" class="hover:text-indigo-600">Gallery</a>
    <a href="#pricing" class="hover:text-indigo-600">Bảng giá</a>
    <a href="#faq" class="hover:text-indigo-600">FAQ</a>
    <?php
}
?>