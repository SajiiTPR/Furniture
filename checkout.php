<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}


// Ensure cart is not empty
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "Your cart is empty. <a href='./product.php'>Go shopping</a>";
    exit();
}

$user_id = $_SESSION['user_id'];
$total = 0;

// Calculate total
foreach ($_SESSION['cart'] as $id => $quantity) {
    $result = mysqli_query($conn, "SELECT price FROM products WHERE id=$id");
    $product = mysqli_fetch_assoc($result);
    $total += $product['price'] * $quantity;
}

// Insert into orders table
$sql = "INSERT INTO orders (user_id, total_price) VALUES ($user_id, $total)";
mysqli_query($conn, $sql);
$order_id = mysqli_insert_id($conn);

// Insert each product into order_items table
foreach ($_SESSION['cart'] as $id => $quantity) {
    mysqli_query($conn, "INSERT INTO order_items (order_id, product_id, quantity) VALUES ($order_id, $id, $quantity)");
}

// Clear the cart
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/checkout.css">
    
    <title>Order Confirmed</title>
</head>

<body>
    <i class="fas fa-check-circle icon"></i>
    <h1>Thank you!</h1>
    <p>Your order has been placed successfully.</p>
    <p><a href="./product.php">Continue Shopping</a></p>
</body>

</html>
