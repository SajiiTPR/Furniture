
<?php
include 'includes/config.php';
session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Please <a href='login_form.php'>login</a> to checkout.";
    exit();
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
<html>
<head>
    <title>Order Confirmed</title>
</head>
<body>
    <h1>Thank you!</h1>
    <p>Your order has been placed successfully.</p>
    <p><a href="product.php">Continue Shopping</a></p>
</body>
</html>
