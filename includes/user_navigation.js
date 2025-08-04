// User Dropdown Functionality
const userDropdownBtn = document.getElementById('userDropdownBtn');
const userDropdown = document.getElementById('userDropdown');

userDropdownBtn.addEventListener('click', function () {
    userDropdown.classList.toggle('active');
});

// Close dropdown when clicking outside
document.addEventListener('click', function (event) {
    if (!userDropdown.contains(event.target) && event.target !== userDropdownBtn) {
        userDropdown.classList.remove('active');
    }
});

// Mobile Menu Functionality (placeholder - would need additional HTML)
const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
mobileMenuBtn.addEventListener('click', function () {
    alert('Mobile menu would open here in a complete implementation');
});