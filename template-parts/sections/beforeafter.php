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
                include get_template_directory() . '/template-parts/default-beforeafter.php';
            endif;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>