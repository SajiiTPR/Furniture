document.addEventListener('DOMContentLoaded', function() {
    const subscribeForm = document.getElementById('subscribeForm');
    subscribeForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const emailInput = subscribeForm.querySelector('input[type="email"]');
        alert(`Thank you for subscribing with ${emailInput.value}!`);
        emailInput.value = ''; // Clear the input field
    });
});
