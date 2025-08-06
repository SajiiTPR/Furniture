document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const messageContainer = document.createElement("div");
    messageContainer.classList.add("form-message");
    form.insertBefore(messageContainer, form.firstChild); // Insert message container at the top of the form

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Simple validation (you can expand this)
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const mobile = document.getElementById("mobile").value;
        const message = document.getElementById("message").value;

        if (name && email && mobile && message) {            
            form.reset(); // Reset the form after submission
        } else {
            
        }
    });
});
