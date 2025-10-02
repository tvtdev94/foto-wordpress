<!-- SERVICES MODAL -->
<div id="servicesModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.85), rgba(0,0,0,0.5), rgba(0,0,0,0.3));">
    <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] flex flex-col">
        <div class="p-6 border-b flex-shrink-0">
            <div class="flex items-center justify-between">
                <h2 id="modalTitle" class="text-2xl md:text-3xl font-extrabold"></h2>
                <button id="closeModal" class="text-gray-600 hover:text-gray-800 p-2 rounded-full border-2 border-gray-300 hover:border-gray-400 bg-white hover:bg-gray-50 transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="p-6 overflow-y-auto flex-1">
            <div class="mb-6">
                <p id="modalDescription" class="text-slate-600 mb-4"></p>
                <p id="modalDetails" class="text-slate-500 text-sm"></p>
            </div>

            <div id="modalThumbnails" class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <!-- Thumbnails sẽ được thêm bằng JavaScript -->
            </div>
        </div>
    </div>
</div>

<!-- IMAGE MODAL -->
<div id="imageModal" class="fixed inset-0 z-60 hidden items-center justify-center p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.85), rgba(0,0,0,0.5), rgba(0,0,0,0.3));">
    <div class="relative max-w-6xl w-full max-h-[90vh] flex items-center justify-center">
        <button id="closeImageModal" class="absolute top-4 right-4 text-white hover:text-gray-200 p-3 z-10 rounded-full border-2 border-white/30 hover:border-white/50 bg-black/20 hover:bg-black/30 backdrop-blur-sm transition-all duration-200">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <img id="modalImage" src="" alt="Full size image" class="max-w-full max-h-full object-contain rounded-lg shadow-2xl">
    </div>
</div>

<script>
// Pass PHP data to JavaScript
window.servicesGalleryData = {
    <?php
    // Default data
    $default_titles = array(
        'HDR/Flambient', 'Virtual Staging', 'Floor Plan & Site Plan', 'Sky/Twilight Replace',
        'Reels/Shorts', 'Remove Objects', 'Day to Dusk', 'Grass Enhancement',
        'Fire/Water Features', 'Color Correction', 'Perspective Correction'
    );
    $default_descriptions = array(
        'Blending multiple exposures to create bright, detailed, and true-to-life images.',
        'Transform empty spaces into beautifully styled rooms with digital furniture.',
        'Accurate layouts that help buyers clearly understand the property structure.',
        'Enhance photos with dramatic sky replacements and twilight effects.',
        'Short-form video content optimized for social media marketing.',
        'Clean removal of unwanted objects, keeping photos neat and professional.',
        'Turn daytime shots into stunning twilight scenes with natural evening light.',
        'Replace patchy grass with lush, vibrant green lawns.',
        'Add realistic fire and water effects to enhance property features.',
        'Professional color grading for consistent, appealing property photos.',
        'Fix distorted lines and angles for professional architectural shots.'
    );

    for ($i = 1; $i <= 11; $i++) :
        $title = get_theme_mod("gallery_service{$i}_title", $default_titles[$i-1]);
        $description = get_theme_mod("gallery_service{$i}_description", $default_descriptions[$i-1]);
        $image_count = get_theme_mod("gallery_service{$i}_image_count", 3);
    ?>
    <?php echo $i - 1; ?>: {
        title: '<?php echo esc_js($title); ?>',
        description: '<?php echo esc_js($description); ?>',
        thumbnails: [
            <?php for ($j = 1; $j <= $image_count; $j++) : ?>
            <?php
            $image = get_theme_mod("gallery_service{$i}_image{$j}", '');
            if (!$image) {
                // Fallback thumbnails
                $fallback_thumbs = array(
                    'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=400&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1486304873000-235643847519?q=80&w=400&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?q=80&w=400&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=400&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1560185007-cde436f6a4d0?q=80&w=400&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=400&auto=format&fit=crop'
                );
                $image = $fallback_thumbs[($j - 1) % 6];
            }
            ?>
            '<?php echo esc_url($image); ?>'<?php echo ($j < $image_count) ? ',' : ''; ?>
            <?php endfor; ?>
        ]
    }<?php echo ($i < 11) ? ',' : ''; ?>
    <?php endfor; ?>
};

// Keep old format for backward compatibility
window.servicesThumbnails = {};
for (let i = 0; i <= 10; i++) {
    window.servicesThumbnails[i] = window.servicesGalleryData[i].thumbnails;
}
</script>