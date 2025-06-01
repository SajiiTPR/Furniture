<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Welcome, Admin!</h1>
<ul>
    <li><a href="add_product.php">Add New Product</a></li>
    <li><a href="edit_product.php">Edit Products</a></li>
    <li><a href="view_orders.php">View Orders</a></li>
    <li><a href="../logout.php">Logout</a></li>
</ul>
