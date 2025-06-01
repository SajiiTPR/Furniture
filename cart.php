<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}

// Initialize cart if not already
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart
if (isset($_GET['action']) && $_GET['action'] == 'add') {
    $id = $_GET['id'];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
    header("Location: cart.php");
    exit();
}

// Handle remove from cart
if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
    header("Location: ./product.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/cart.css">
    <link rel="stylesheet" href="./includes/footer.css">
    <title>Your Cart</title>
</head>
<body>
    <?php include "./includes/header.php";?>
    <h1>Your Shopping Cart</h1>

    <?php
    if (!empty($_SESSION['cart'])) {
        $total = 0;

        echo "<div class='table-container'>";
            echo "<table border='1' cellpadding='10'>";
            echo "<tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>";

            foreach ($_SESSION['cart'] as $id => $quantity) {
                $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
                $product = mysqli_fetch_assoc($result);

                $price = $product['price'];
                $name = $product['name'];
                $subtotal = $price * $quantity;
                $total += $subtotal;

                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$quantity</td>";
                echo "<td>\$$price</td>";
                echo "<td>\$$subtotal</td>";
                echo "<td><a href='cart.php?action=remove&id=$id'><i class='fa-solid fa-trash'></i></a></td>";
                echo "</tr>";
            }

            echo "<tr><td colspan='3'><strong>Total</strong></td><td colspan='2'><strong>\$$total</strong></td></tr>";
            echo "</table>";
        

        echo "<a class='check-out' href='checkout.php'>Proceed to Checkout</a>";
        echo "</div>";
    } else {
        echo "<p class='empty-msg'>Your cart is empty.</p>";
        
    }
    ?>

    <?php include "./includes/footer.php";?>
</body>
</html>
