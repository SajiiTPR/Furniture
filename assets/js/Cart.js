document.addEventListener('DOMContentLoaded', function() {
    const removeLinks = document.querySelectorAll('a[href*="action=remove"]');
    
    removeLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            const confirmation = confirm("Are you sure you want to remove this item from your cart?");
            if (!confirmation) {
                event.preventDefault(); // Prevent the default action if the user cancels
            }
        });
    });
});
