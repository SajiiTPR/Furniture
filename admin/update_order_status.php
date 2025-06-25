<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['order_id'], $_POST['status'])) {
        $order_id = intval($_POST['order_id']);
        $status = mysqli_real_escape_string($conn, trim($_POST['status']));

        // Allow only known status values
        $allowed = ['Pending', 'Shipped', 'Delivered', 'Cancelled'];
        if (!in_array($status, $allowed)) {
            $redirect = $_SERVER['HTTP_REFERER'] ?? 'dashboard.php';
            header("Location: $redirect?msg=invalid_status");
            exit();
        }

        $update = mysqli_query($conn, "UPDATE orders SET status = '$status' WHERE id = $order_id");

        $redirect = $_SERVER['HTTP_REFERER'] ?? 'dashboard.php';

        if ($update) {
            header("Location: $redirect?msg=updated");
        } else {
            header("Location: $redirect?msg=error");
        }
        exit();
    } else {
        $redirect = $_SERVER['HTTP_REFERER'] ?? 'dashboard.php';
        header("Location: $redirect?msg=missing_data");
        exit();
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>