<?php
include '../includes/db.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    $order_id = $_POST['order_id'];

    $sql = "UPDATE orders SET status='$status' WHERE id=$order_id";
    mysqli_query($conn, $sql);
    header("Location: view_orders.php");
}
?>
