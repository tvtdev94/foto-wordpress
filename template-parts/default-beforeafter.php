<!-- Default Before/After Sliders -->
<?php
$default_before_images = array(
    'https://images.unsplash.com/photo-1501183638710-841dd1904471?q=80&w=1600&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1519710164239-da123dc03ef4?q=80&w=1600&auto=format&fit=crop'
);
$default_after_images = array(
    'https://images.unsplash.com/photo-1493809842364-78817add7ffb?q=80&w=1600&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=1600&auto=format&fit=crop'
);

for ($i = 1; $i <= 2; $i++) :
    $before_image = get_theme_mod("beforeafter_before_{$i}", $default_before_images[$i-1]);
    $after_image = get_theme_mod("beforeafter_after_{$i}", $default_after_images[$i-1]);

    if ($before_image && $after_image) :
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
    endif;
endfor;
?>