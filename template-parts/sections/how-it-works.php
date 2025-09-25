<?php
/**
 * How It Works Section
 * Displays the 4-step process
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

$section_title = get_theme_mod('how_it_works_title', 'How It Works');
$section_subtitle = get_theme_mod('how_it_works_subtitle', 'A simple, clear process from upload to delivery.');

// Get all steps with default values
$steps = array();
$default_steps = array(
    1 => array(
        'title' => 'Upload',
        'description' => 'Send your RAW/JPEG photos via Google Drive, Dropbox, or other links.'
    ),
    2 => array(
        'title' => 'Relax',
        'description' => 'Rest well while our editors carefully process all your files overnight.'
    ),
    3 => array(
        'title' => 'Quality Check',
        'description' => 'Two-step QC ensures accuracy, consistency, and professional results.'
    ),
    4 => array(
        'title' => 'Delivery',
        'description' => 'Receive your results within 12–24 hours. Usually ready the next morning, fully edited and ready to download.'
    )
);

for ($i = 1; $i <= 4; $i++) {
    $steps[$i] = array(
        'title' => get_theme_mod("how_it_works_step_{$i}_title", $default_steps[$i]['title']),
        'description' => get_theme_mod("how_it_works_step_{$i}_description", $default_steps[$i]['description'])
    );
}
?>

<section class="how-it-works-section py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center mb-12">
            <?php if ($section_title): ?>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    <?php echo esc_html($section_title); ?>
                </h2>
            <?php endif; ?>
            
            <?php if ($section_subtitle): ?>
                <p class="text-xl text-gray-600">
                    <?php echo esc_html($section_subtitle); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($steps as $step_num => $step): ?>
                    <?php if ($step['title'] && $step['description']): ?>
                        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="text-center">
                                <div class="bg-blue-600 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="text-xl font-bold text-white"><?php echo $step_num; ?></span>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">
                                    <?php echo esc_html($step['title']); ?>
                                </h3>
                                <p class="text-gray-600 leading-relaxed text-sm">
                                    <?php echo esc_html($step['description']); ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
