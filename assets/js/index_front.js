<script>
    document.addEventListener('DOMContentLoaded', function () {
    let navbar = document.querySelector('.navbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });
    }
});
</script>
