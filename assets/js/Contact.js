document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Simple validation (you can expand this)
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const mobile = document.getElementById("mobile").value;
        const message = document.getElementById("message").value;

        if (name && email && mobile && message) {
            // Here you can add your AJAX request to send the form data
            console.log("Form submitted successfully!");
            alert("Thank you for your message!");
            form.reset(); // Reset the form after submission
        } else {
            alert("Please fill in all fields.");
        }
    });
});
