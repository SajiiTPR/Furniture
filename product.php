<?php

include 'includes/config.php';
session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/product.css">
    <link rel="stylesheet" href="./assets/css/view.css">
    <link rel="stylesheet" href="./includes/header.css">
    <link rel="stylesheet" href="./includes/footer.css">
    <link rel="stylesheet" href="./assets/css/search.css">
    <title>Home Furniture Store</title>

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

    <h1>buy to Furnitures</h1>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search for products..." oninput="filterProducts()">
    </div>

    <!-- Product List -->
    <div class="product-cart" id="productList">
        <?php
        // Fetch products from DB
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product' data-name='" . strtolower($row['name']) . "'>";
            echo "<img src='./assets/furnitures/" . $row['image'] . "' alt='" . $row['name'] . "'>";
            echo "<h3>" . $row['name'] . "</h3>";
            echo "<p>Price: LKR." . $row['price'] . "</p>";
            echo "<div class='cart-option'>";
            echo "<a class='view-details' href='view.php?id=" . $row['id'] . "'>View Details</a>";
            echo "<a class='add-cart' href='cart.php?action=add&id=" . $row['id'] . "'>Add to Cart</a>";
            echo "</div>";
            echo "</div>";
        }
        ?>
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
            <h2>Contact</h2>
            <p class="address">Furniture Hub,</p>
            <p>Trincomalee,</p>
            <p>varothayanagar,</p>
            <p>tel: +94 758220825</p>
        </address>

        <div class="copyright">
            <p>&copy; Furniture System 2025 [ HNDIT ]</p>
        </div>

    </footer>

    <script src="./assets/javascript/product.js"></script>

</body>

</html>