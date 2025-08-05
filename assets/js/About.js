// Scroll reveal animation
document.addEventListener('DOMContentLoaded', function () {
    const revealElements = document.querySelectorAll('.scroll-reveal');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    revealElements.forEach(element => {
        observer.observe(element);
    });

    // Color change animation for headings
    const headings = document.querySelectorAll('h1, h2, h3');
    headings.forEach(heading => {
        heading.addEventListener('mouseover', () => {
            heading.style.transition = 'color 0.3s ease';
            heading.style.color = '#9b5b37';
        });
        heading.addEventListener('mouseout', () => {
            heading.style.color = '';
        });
    });
});