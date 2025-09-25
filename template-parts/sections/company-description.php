<?php
/**
 * Company Description Section
 * Displays company information and description
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

$company_title = get_theme_mod('company_title', 'Foto Services');
$company_description = get_theme_mod('company_description_text', 'At Foto Services, we deliver world-class post-production for real estate and commercial photography. Our team in Vietnam is committed to uncompromising quality while keeping pricing competitive.

We proudly use 100% licensed software and work exclusively on macOS workstations with highly calibrated displays. This ensures absolute precision in color accuracy and consistency across every project.

By combining the power of AI technology with the artistry of our experienced editors, we provide the best performance-to-price ratio in the market. Every image, video, staging, or floor plan is refined to help your listings and products stand out from the competition.

Fast turnaround, professional QC, and dedicated support make Foto Services the trusted partner for agents, studios, and brands worldwide.');
?>

<section class="company-description-section py-16 bg-gray-50">
    <div class="w-full px-4">
        <div class="w-full">
            <div class="bg-white border border-gray-200 rounded-xl p-8 shadow-lg">
                <div class="text-center">
                    <?php if ($company_title): ?>
                        <h2 class="text-4xl font-bold text-blue-600 mb-6">
                            <?php echo esc_html($company_title); ?>
                        </h2>
                    <?php endif; ?>
                    
                    <?php if ($company_description): ?>
                        <div class="text-lg text-gray-700 leading-relaxed space-y-4">
                            <?php echo wp_kses_post(wpautop($company_description)); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
