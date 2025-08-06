// JavaScript for any interactive elements
document.addEventListener('DOMContentLoaded', function () {
    // Example: Add a simple animation to the stat cards on load
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, index) => {
        card.style.opacity = 0;
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'opacity 0.5s, transform 0.5s';
            card.style.opacity = 1;
            card.style.transform = 'translateY(0)';
        }, index * 100); // Stagger the animation
    });
});
