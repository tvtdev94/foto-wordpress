// Before/After range handler
function moveBA(input){
    const wrap = input.parentElement;
    const after = wrap.querySelector('.ba-after');
    const handle = wrap.querySelector('.ba-handle');
    const pct = input.value;
    after.style.width = pct + '%';
    handle.style.left = pct + '%';
    const dot = wrap.querySelector('.ba-dot');
    dot.style.left = pct + '%';
}

// Initialize Before/After sliders with mouse/touch drag
document.addEventListener('DOMContentLoaded', function() {
    const baWraps = document.querySelectorAll('.ba-wrap');

    baWraps.forEach(wrap => {
        const slider = wrap.querySelector('input[type="range"]');
        if (!slider) return;

        // Mouse drag
        wrap.addEventListener('mousedown', function(e) {
            if (e.target.tagName === 'INPUT') return;

            const rect = wrap.getBoundingClientRect();
            const updatePosition = (clientX) => {
                const x = clientX - rect.left;
                const pct = Math.max(0, Math.min(100, (x / rect.width) * 100));
                slider.value = pct;
                moveBA(slider);
            };

            updatePosition(e.clientX);

            const onMouseMove = (e) => updatePosition(e.clientX);
            const onMouseUp = () => {
                document.removeEventListener('mousemove', onMouseMove);
                document.removeEventListener('mouseup', onMouseUp);
            };

            document.addEventListener('mousemove', onMouseMove);
            document.addEventListener('mouseup', onMouseUp);
        });

        // Touch drag
        wrap.addEventListener('touchstart', function(e) {
            if (e.target.tagName === 'INPUT') return;

            const rect = wrap.getBoundingClientRect();
            const updatePosition = (clientX) => {
                const x = clientX - rect.left;
                const pct = Math.max(0, Math.min(100, (x / rect.width) * 100));
                slider.value = pct;
                moveBA(slider);
            };

            const touch = e.touches[0];
            updatePosition(touch.clientX);

            const onTouchMove = (e) => {
                const touch = e.touches[0];
                updatePosition(touch.clientX);
            };
            const onTouchEnd = () => {
                document.removeEventListener('touchmove', onTouchMove);
                document.removeEventListener('touchend', onTouchEnd);
            };

            document.addEventListener('touchmove', onTouchMove);
            document.addEventListener('touchend', onTouchEnd);
        });
    });
});

// Set current year in footer
document.addEventListener('DOMContentLoaded', function() {
    const yearElement = document.getElementById('year');
    if (yearElement) {
        yearElement.textContent = new Date().getFullYear();
    }
});

// Smooth scrolling for anchor links
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

// Services Gallery Modal
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('servicesModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');
    const modalDetails = document.getElementById('modalDetails');
    const modalThumbnails = document.getElementById('modalThumbnails');
    const closeModal = document.getElementById('closeModal');
    const galleryItems = document.querySelectorAll('.service-gallery-item');

    // Open modal when clicking gallery items
    galleryItems.forEach(item => {
        item.addEventListener('click', function() {
            const serviceIndex = parseInt(this.dataset.service);
            const serviceData = window.servicesGalleryData && window.servicesGalleryData[serviceIndex]
                ? window.servicesGalleryData[serviceIndex]
                : null;

            if (serviceData) {
                modalTitle.textContent = serviceData.title;
                modalDescription.textContent = serviceData.description;
                modalDetails.textContent = '';

                // Clear and populate thumbnails
                modalThumbnails.innerHTML = '';
                const thumbnails = serviceData.thumbnails;

                thumbnails.forEach((thumb, index) => {
                    const img = document.createElement('img');
                    img.src = thumb;
                    img.alt = `${serviceData.title} example ${index + 1}`;
                    img.className = 'w-full h-40 object-cover rounded-lg shadow-smooth cursor-pointer hover:scale-105 transition-transform duration-300';

                    // Add click handler for full view in modal
                    img.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        showImageModal(thumb.replace('w=400', 'w=1200'));
                    });

                    modalThumbnails.appendChild(img);
                });

                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }
        });
    });

    // Close modal
    function closeModalFunction() {
        const modal = document.getElementById('servicesModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    closeModal.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        closeModalFunction();
    });

    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModalFunction();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            // Check if image modal is open first
            const imageModal = document.getElementById('imageModal');
            if (imageModal && !imageModal.classList.contains('hidden')) {
                closeImageModal();
            } else if (!modal.classList.contains('hidden')) {
                closeModalFunction();
            }
        }
    });

    // Image modal functions
    function showImageModal(imageUrl) {
        const imageModal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const servicesModal = document.getElementById('servicesModal');

        // Hide services modal temporarily
        servicesModal.classList.add('hidden');
        servicesModal.classList.remove('flex');

        modalImage.src = imageUrl;
        imageModal.classList.remove('hidden');
        imageModal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeImageModal() {
        const imageModal = document.getElementById('imageModal');
        const servicesModal = document.getElementById('servicesModal');

        imageModal.classList.add('hidden');
        imageModal.classList.remove('flex');

        // Show services modal again
        servicesModal.classList.remove('hidden');
        servicesModal.classList.add('flex');
        document.body.style.overflow = 'hidden'; // Keep body overflow hidden because services modal is still open
    }

    // Add image modal close handlers
    document.getElementById('closeImageModal').addEventListener('click', closeImageModal);
    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeImageModal();
        }
    });
});

// Before/After Modal Handler
document.addEventListener('DOMContentLoaded', function() {
    const baModal = document.getElementById('ba-modal');
    if (!baModal) return;

    const baModalTitle = document.getElementById('ba-modal-title');
    const baModalContent = document.getElementById('ba-modal-content');
    const baModalClose = document.getElementById('ba-modal-close');
    const baTitles = document.querySelectorAll('.service-ba-title');

    // Open modal when clicking service title only
    baTitles.forEach(title => {
        title.addEventListener('click', function(e) {
            e.stopPropagation();

            const container = this.parentElement;
            const serviceId = parseInt(container.dataset.serviceId);
            const serviceName = container.dataset.serviceName;

            // Set modal title
            baModalTitle.textContent = serviceName;

            // Get slides from window.baServicesData
            const slides = window.baServicesData && window.baServicesData[serviceId - 1]
                ? window.baServicesData[serviceId - 1]
                : [];

            // Populate modal content
            baModalContent.innerHTML = '';

            if (slides.length > 0) {
                slides.forEach(slide => {
                    const baWrap = document.createElement('div');
                    baWrap.className = 'ba-wrap aspect-[16/10] shadow-smooth rounded-lg overflow-hidden relative';
                    baWrap.innerHTML = `
                        <img src="${slide.before}" alt="Before" />
                        <div class="ba-after" style="width:50%">
                            <img src="${slide.after}" alt="After" />
                        </div>
                        <div class="ba-handle left-1/2"></div>
                        <div class="ba-dot">↔</div>
                        <input type="range" min="0" max="100" value="50" style="display:none;" />
                    `;
                    baModalContent.appendChild(baWrap);
                });

                // Re-initialize drag for modal sliders
                setTimeout(() => {
                    const modalWraps = baModalContent.querySelectorAll('.ba-wrap');
                    modalWraps.forEach(wrap => {
                        const slider = wrap.querySelector('input[type="range"]');
                        if (!slider) return;

                        // Mouse drag
                        wrap.addEventListener('mousedown', function(e) {
                            const rect = wrap.getBoundingClientRect();
                            const updatePosition = (clientX) => {
                                const x = clientX - rect.left;
                                const pct = Math.max(0, Math.min(100, (x / rect.width) * 100));
                                slider.value = pct;
                                moveBA(slider);
                            };

                            updatePosition(e.clientX);

                            const onMouseMove = (e) => updatePosition(e.clientX);
                            const onMouseUp = () => {
                                document.removeEventListener('mousemove', onMouseMove);
                                document.removeEventListener('mouseup', onMouseUp);
                            };

                            document.addEventListener('mousemove', onMouseMove);
                            document.addEventListener('mouseup', onMouseUp);
                        });

                        // Touch drag
                        wrap.addEventListener('touchstart', function(e) {
                            const rect = wrap.getBoundingClientRect();
                            const updatePosition = (clientX) => {
                                const x = clientX - rect.left;
                                const pct = Math.max(0, Math.min(100, (x / rect.width) * 100));
                                slider.value = pct;
                                moveBA(slider);
                            };

                            const touch = e.touches[0];
                            updatePosition(touch.clientX);

                            const onTouchMove = (e) => {
                                const touch = e.touches[0];
                                updatePosition(touch.clientX);
                            };
                            const onTouchEnd = () => {
                                document.removeEventListener('touchmove', onTouchMove);
                                document.removeEventListener('touchend', onTouchEnd);
                            };

                            document.addEventListener('touchmove', onTouchMove);
                            document.addEventListener('touchend', onTouchEnd);
                        });
                    });
                }, 100);
            } else {
                baModalContent.innerHTML = '<div class="col-span-2 text-center py-8">No slides available.</div>';
            }

            // Show modal
            baModal.classList.remove('hidden');
            baModal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        });
    });

    // Close modal
    function closeBaModal() {
        baModal.classList.add('hidden');
        baModal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    baModalClose.addEventListener('click', closeBaModal);

    // Close when clicking outside
    baModal.addEventListener('click', function(e) {
        if (e.target === baModal) {
            closeBaModal();
        }
    });

    // Close with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !baModal.classList.contains('hidden')) {
            closeBaModal();
        }
    });
});