document.addEventListener('DOMContentLoaded', function () {
    // Image preview for dream submission
    const imageUpload = document.getElementById('dreamImage');
    const imagePreview = document.getElementById('imagePreview');

    if (imageUpload && imagePreview) {
        imageUpload.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function () {
                    imagePreview.style.display = 'block';
                    imagePreview.src = this.result;
                });

                reader.readAsDataURL(file);
            }
        });
    }

  


    // Delete dream confirmation
    const deleteButtons = document.querySelectorAll('.delete-dream');

    if (deleteButtons.length > 0) {
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (e) {
                if (!confirm('هل أنت متأكد من حذف هذا الحلم؟')) {
                    e.preventDefault();
                }
            });
        });
    }

    // Fulfill dream confirmation
    const fulfillButtons = document.querySelectorAll('.confirm-fulfill');

    if (fulfillButtons.length > 0) {
        fulfillButtons.forEach(function (button) {
            button.addEventListener('click', function (e) {
                if (!confirm('هل أنت متأكد من تحقيق هذا الحلم؟')) {
                    e.preventDefault();
                }
            });
        });
    }


   


});

// New ticker for fulfilled dreams - right to left scrolling without cloning
function setupNewTicker() {
    const tickerTrack = document.querySelector('.ticker-track');
    if (!tickerTrack || tickerTrack.children.length === 0) return;

    // Remove any previously cloned items
    const originalItems = tickerTrack.querySelectorAll('.ticker-item');
    const originalCount = originalItems.length;

    // Keep only the original items, remove any clones
    while (tickerTrack.children.length > originalCount) {
        tickerTrack.removeChild(tickerTrack.lastChild);
    }

    // Calculate appropriate duration based on content length and viewport
    const contentWidth = tickerTrack.scrollWidth;
    const viewportWidth = window.innerWidth;

    // Adjust the speed based on content amount
    let duration = contentWidth / 50; // px per second

    // Set minimum duration to prevent too fast movement
    duration = Math.max(duration, 20);

    // Apply animation duration
    tickerTrack.style.animationDuration = `${duration}s`;

    // Add infinite looping effect with CSS animation
    tickerTrack.style.animationName = 'ticker-slide';
    tickerTrack.style.animationTimingFunction = 'linear';
    tickerTrack.style.animationIterationCount = 'infinite';

    // Pause animation on hover
    const tickerContainer = document.querySelector('.ticker-container');
    if (tickerContainer) {
        tickerContainer.addEventListener('mouseenter', function () {
            tickerTrack.style.animationPlayState = 'paused';
        });

        tickerContainer.addEventListener('mouseleave', function () {
            tickerTrack.style.animationPlayState = 'running';
        });
    }
}

// Initialize the new ticker
setupNewTicker();

