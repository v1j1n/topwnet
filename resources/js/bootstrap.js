import axios from 'axios';

// Configure axios with optimizations
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Set reasonable timeout
window.axios.defaults.timeout = 10000;

// Enable request/response compression
window.axios.defaults.headers.common['Accept-Encoding'] = 'gzip, deflate';

// Lazy loading utility for images
document.addEventListener('DOMContentLoaded', () => {
    // Native lazy loading for images
    const images = document.querySelectorAll('img[data-src]');

    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));
    } else {
        // Fallback for older browsers
        images.forEach(img => {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
        });
    }
});

// Performance monitoring (optional - can be removed in production)
if (window.performance && window.performance.mark) {
    window.addEventListener('load', () => {
        setTimeout(() => {
            const perfData = window.performance.getEntriesByType('navigation')[0];
            if (perfData) {
                console.log('Page Load Time:', perfData.loadEventEnd - perfData.fetchStart, 'ms');
            }
        }, 0);
    });
}

