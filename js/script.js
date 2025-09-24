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