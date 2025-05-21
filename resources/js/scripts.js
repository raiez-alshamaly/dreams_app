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

const canvas = document.getElementById("dreamfield");
const ctx = canvas.getContext("2d");
let w, h, particles = [];

function resize() {
    w = canvas.width = window.innerWidth;
    h = canvas.height = window.innerHeight;
    createParticles();
}
function createParticles() {
    particles = [];
    for (let i = 0; i < 120; i++) {
        particles.push({
            x: Math.random() * w,
            y: Math.random() * h,
            r: Math.random() * 2 + 1,
            vx: (Math.random() - 0.5) * 1,
            vy: (Math.random() - 0.5) * 1,
            color: `hsla(${Math.random() * 360}, 80%, 60%, 0.5)`
        });
    }
}

function draw() {
    ctx.clearRect(0, 0, w, h);

    // روابط بين الأقرب
    for (let i = 0; i < particles.length; i++) {
        for (let j = i + 1; j < particles.length; j++) {
            const a = particles[i], b = particles[j];
            const dist = Math.hypot(a.x - b.x, a.y - b.y);
            if (dist < 100) {
                ctx.beginPath();
                ctx.moveTo(a.x, a.y);
                ctx.lineTo(b.x, b.y);
                ctx.strokeStyle = `rgba(255,255,255,${1 - dist / 100})`;
                ctx.lineWidth = 0.2;
                ctx.stroke();
            }
        }
    }

    // نقاط تتحرك
    for (let p of particles) {
        p.x += p.vx;
        p.y += p.vy;

        if (p.x < 0 || p.x > w) p.vx *= -1;
        if (p.y < 0 || p.y > h) p.vy *= -1;

        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fillStyle = p.color;
        ctx.fill();
    }

    requestAnimationFrame(draw);
}

resize();
window.addEventListener("resize", resize);
draw();
