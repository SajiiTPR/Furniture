function toggleDropdown() {
    const dropdown = document.getElementById("dropdownMenu");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
}

function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    if (sidebar.style.left === "0px") {
        sidebar.style.left = "-250px"; // Hide sidebar
    } else {
        sidebar.style.left = "0px"; // Show sidebar
    }
}

function closeSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.style.left = "-250px"; // Hide sidebar
}
