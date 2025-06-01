<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/about.css">
    <link rel="stylesheet" href="./includes/header.css">
    <link rel="stylesheet" href="./includes/footer.css">
    <title>About Us</title>
</head>

<body>
    <header class="sidebar">
        <div class="logo">
            <img src="./assets/image/Logo-removebg-preview.png" alt="Furniture Logo" class="logoimg">
            <a class="navbar-brand" href="#">Furniture Hub</a>
        </div>

        <div class="nav">

            <a href="./home.php">Home</a>
            <a href="./product.php">shop</a>
            <a href="./about.php">About</a>
            <a href="./contact.php">contact</a>
            <a href="./cart.php"><i class="fa-solid fa-cart-shopping"></i></a>

        </div>
        <div class="profile">

            <p><i class="fa-solid fa-user"></i> <?php echo $_SESSION['user_name'] ?></p>
        </div>
    </header>

    <section class="about">
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;
            Welcome to Furniture Hub, where elegance meets functionality in every piece of furniture. We are passionate about transforming houses into homes by offering timeless designs, exceptional quality, and unmatched customer service.
            <br>
            At Furniture Hub, we believe that furniture is more than just a utility—it’s a reflection of your personality and lifestyle. That’s why we curate a diverse range of styles, from modern minimalism to rustic charm, ensuring there’s something for everyone. Whether you're redesigning your living room, upgrading your workspace, or creating a cozy bedroom retreat, our collections are crafted to blend aesthetics with practicality.
            <br>
            Quality is at the heart of everything we do. We partner with skilled artisans and trusted manufacturers to bring you furniture that stands the test of time. Every piece is meticulously crafted from premium materials to ensure durability, comfort, and style.
            <br>
            Shopping with us is seamless and enjoyable. Our user-friendly website makes it easy to browse, compare, and purchase, while our detailed product descriptions and visuals help you envision how each piece will fit your space. Need guidance? Our dedicated customer support team is here to assist you every step of the way.
            <br>
            Discover a world of furniture that inspires creativity, comfort, and connection. At Furniture Hub, your dream space is just a click away. Start your journey with us today and redefine your living experience.

        </p>
        <img src="./assets/furnitures/about1.jpg" alt="Beautiful furniture collection">


    </section>
    <div class="btn-click">
        <button onclick="window.open('https://www.srilankanfurniture.lk', '_blank')">Furniture Website</button>
    </div>

    <footer class="footer">
        <nav>
            <h2>navigation</h2>
            <a href="./home.php">Home</a>
            <a href="./product.php">Product</a>
            <a href="./cart.php">Cart</a>
            <a href="./checkout.php">Checkout</a>
            <a href="./about.php">About</a>
        </nav>
        <section class="social">
            <a href="https://www.facebook.com/share/1Vu1yYmDuu/" class="text-white mx-2" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/sajith_mhd114/profilecard/?igsh=ZXc0dWxrOHNrcDZt" class="text-white mx-2" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.tiktok.com/@sajith_mhd.114?_t=ZS-8wWVgUxqwWQ&_r=1" class="text-white mx-2" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
            <a href="https://github.com/SajiiTPR" class="text-white mx-2" target="_blank"><i class="fa-brands fa-github"></i></a>
        </section>
        <address>
            <h2>contact</h2>
            <p class="address">Furniture Hub,</p>
            <p>Trincomalee,</p>
            <p>varothayanagar,</p>
            <p>tel: +94 758220825</p>
        </address>

        <div class="copyright">
            <p>&copy; Furniture System 2025 [ HNDIT ]</p>
        </div>

    </footer>
</body>

</html>