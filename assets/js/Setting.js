document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('profile-form');
            const successMessage = document.getElementById('success-message');
            const profileImageInput = document.getElementById('profile-image-input');
            const profileImage = document.querySelector('.profile-image');
            
            // Simulate existing user data (would come from backend in real app)
            const userData = {
                name: 'John Doe',
                email: 'john@example.com',
                address: '123 Main St, New York, NY'
            };
            
            // Populate form with existing user data
            document.getElementById('name').value = userData.name;
            document.getElementById('email').value = userData.email;
            document.getElementById('address').value = userData.address;
            
            // Handle image upload preview
            profileImageInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        profileImage.src = event.target.result;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
            
            // Form validation and submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                let isValid = true;
                
                // Validate name
                const nameInput = document.getElementById('name');
                if (nameInput.value.trim() === '') {
                    document.getElementById('name-error').style.display = 'block';
                    nameInput.classList.add('error');
                    isValid = false;
                } else {
                    document.getElementById('name-error').style.display = 'none';
                    nameInput.classList.remove('error');
                }
                
                // Validate email
                const emailInput = document.getElementById('email');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailInput.value.trim())) {
                    document.getElementById('email-error').style.display = 'block';
                    emailInput.classList.add('error');
                    isValid = false;
                } else {
                    document.getElementById('email-error').style.display = 'none';
                    emailInput.classList.remove('error');
                }
                
                // Validate address
                const addressInput = document.getElementById('address');
                if (addressInput.value.trim() === '') {
                    document.getElementById('address-error').style.display = 'block';
                    addressInput.classList.add('error');
                    isValid = false;
                } else {
                    document.getElementById('address-error').style.display = 'none';
                    addressInput.classList.remove('error');
                }
                
                if (isValid) {
                    // Simulate form submission (in a real app, this would be an API call)
                    setTimeout(() => {
                        successMessage.textContent = 'Profile updated successfully!';
                        successMessage.style.display = 'block';
                        
                        // Hide the success message after 3 seconds
                        setTimeout(() => {
                            successMessage.style.display = 'none';
                        }, 3000);
                    }, 500);
                }
            });
            
            // Add hover effect to inputs for better UX
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentNode.querySelector('.form-label').style.color = var(--primary-color);
                });
                
                input.addEventListener('blur', function() {
                    this.parentNode.querySelector('.form-label').style.color = '#334155';
                });
            });
        });