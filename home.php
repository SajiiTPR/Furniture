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
    <link rel="stylesheet" href="./assets/css/home.css">
    <link rel="stylesheet" href="./includes/header.css">
    <link rel="stylesheet" href="./includes/footer.css">

    <title>Furniture Hub</title>
    <style>
        .logout-btn {
            display: inline-block;
            margin-left: 10px;
            padding: 5px 10px;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .logout-btn:hover {
            background-color: #d32f2f;
        }
    </style>

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
            <i class="fa-solid fa-user"></i>
            <span class="username"><?php echo $_SESSION['user_name']; ?></span>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>


    </header>

    <main class="main">

        <div class="content">
            <h1>Welcome to Furniture Hub</h1>
            <p>Furniture plays a vital role in enhancing the functionality, aesthetics, and comfort of living and working spaces. From essential types like chairs, tables, and beds to specialized furniture like ergonomic office chairs or modular shelves, each piece serves a distinct purpose. Modern web-based furniture systems make interaction seamless by allowing users to explore, customize, and visualize products online. Through virtual catalogs, augmented reality tools, and 3D models, users can evaluate furniture dimensions, styles, and materials. Filters for price, color, and design streamline choices, while interactive systems foster better decision-making, ensuring a personalized experience that transforms spaces into well-furnished havens.
            </p>
            <button class="buy-btn"><a href="./product.php">Buy Product</a></button>
        </div>

        <section class="product-img">

        </section>

    </main>

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