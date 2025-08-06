// Form validation
document.getElementById('contactForm').addEventListener('submit', function (e) {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const subject = document.getElementById('subject').value.trim();
    const message = document.getElementById('message').value.trim();

    // Clear previous error highlights
    const errorFields = document.querySelectorAll('.error-field');
    errorFields.forEach(field => {
        field.classList.remove('error-field');
    });

    let isValid = true;

    if (!name) {
        document.getElementById('name').classList.add('error-field');
        isValid = false;
    }

    if (!email || !validateEmail(email)) {
        document.getElementById('email').classList.add('error-field');
        isValid = false;
    }

    if (!subject) {
        document.getElementById('subject').classList.add('error-field');
        isValid = false;
    }

    if (!message) {
        document.getElementById('message').classList.add('error-field');
        isValid = false;
    }

    if (!isValid) {
        e.preventDefault();

        // Scroll to first error
        const firstError = document.querySelector('.error-field');
        if (firstError) {
            firstError.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }

        // Show alert
        alert('Please fill in all required fields correctly');
        return false;
    }
});

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}