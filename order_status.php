<?php

include 'includes/config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}

// Fetch orders data
$sql = "SELECT id, user_id, total_price, order_date, status FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/order_status.css">
    <title>Order Status - Home Furniture</title>
</head>

<body>
<?php include 'navigation_bar.php'; ?>
    <div class="container">
        <h2>Order Status</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Total Price</th>
                    <th>Order Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td data-label="Order ID"><?= $row['id'] ?></td>
                            <td data-label="User ID"><?= $row['user_id'] ?></td>
                            <td data-label="Total Price">$<?= number_format($row['total_price'], 2) ?></td>
                            <td data-label="Order Date"><?= $row['order_date'] ?></td>
                            <td data-label="Status">
                                <span class="status <?= $row['status'] ?>"><?= $row['status'] ?></span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No orders found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php include './footer_bottom.php'; ?>
</body>

</html>
<?php
$conn->close();
?>