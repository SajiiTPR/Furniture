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
    <title>Your Cart</title>
</head>
<body>
    <h1>Your Shopping Cart</h1>

    <?php
    if (!empty($_SESSION['cart'])) {
        $total = 0;

        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th><th>Action</th></tr>";

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
            echo "<td><a href='cart.php?action=remove&id=$id'>Remove</a></td>";
            echo "</tr>";
        }

        echo "<tr><td colspan='3'><strong>Total</strong></td><td colspan='2'><strong>\$$total</strong></td></tr>";
        echo "</table>";

        echo "<br><a href='checkout.php'>Proceed to Checkout</a>";
    } else {
        echo "<p>Your cart is empty.</p>";
        
    }
    ?>
</body>
</html>
