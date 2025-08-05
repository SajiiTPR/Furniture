<?php

include 'includes/config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/Product_page.css">
    <link rel="stylesheet" href="./assets/css/view.css">
    <link rel="stylesheet" href="./assets/css/user_navigation.css">
    <link rel="stylesheet" href="./assets/css/user_footer.css">
    <title>Home Furniture Store</title>

</head>

<body>
    <?php include "./user_navigation.php"; ?>

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

    <?php include "./user_footer.php"; ?>

    <script src="./assets/js/product.js"></script>
    <script src="./assets/js/user_navigation.js"></script>

</body>

</html>