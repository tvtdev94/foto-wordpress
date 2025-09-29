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

// Get bold keywords from customizer (comma-separated)
$bold_keywords = get_theme_mod('company_bold_keywords', 'world-class post-production,100% licensed software and,macOS workstations,AI technology');
?>

<section class="company-description-section py-20 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl p-8 shadow-smooth">
                <div class="text-center">
                    <?php if ($company_title): ?>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-blue-600 mb-6">
                            <?php echo esc_html($company_title); ?>
                        </h2>
                    <?php endif; ?>
                    
                    <?php if ($company_description): ?>
                        <div class="text-lg text-slate-700 leading-relaxed space-y-4">
                            <?php
                            $formatted_description = $company_description;

                            // Apply bold formatting to keywords
                            if ($bold_keywords) {
                                $keywords_array = array_map('trim', explode(',', $bold_keywords));
                                foreach ($keywords_array as $keyword) {
                                    if (!empty($keyword)) {
                                        $formatted_description = str_replace($keyword, '<strong>' . $keyword . '</strong>', $formatted_description);
                                    }
                                }
                            }

                            echo wp_kses_post(wpautop($formatted_description));
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
