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