document.addEventListener("DOMContentLoaded", () => {
    const popup = document.getElementById("popup");
    const popupDetails = document.getElementById("popup-details");
    const closeBtn = document.querySelector(".close");

    document.querySelectorAll(".view-details").forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            const productId = btn.getAttribute("data-id");

            fetch(`view.php?id=${productId}`)
                .then((response) => response.json())
                .then((data) => {
                    if (data.error) {
                        popupDetails.innerHTML = `<p>${data.error}</p>`;
                    } else {
                        popupDetails.innerHTML = `
                            <img src="./assets/furnitures/${data.image}" alt="${data.name}">
                            <h3>${data.name}</h3>
                            <p>Price: LKR. ${data.price}</p>
                            <p>${data.description}</p>
                        `;
                    }
                    popup.style.display = "block";
                });
        });
    });

    closeBtn.addEventListener("click", () => {
        popup.style.display = "none";
    });

    window.addEventListener("click", (e) => {
        if (e.target === popup) {
            popup.style.display = "none";
        }
    });
});
