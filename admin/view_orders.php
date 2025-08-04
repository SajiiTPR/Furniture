<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch all orders with user name
$order_result = mysqli_query($conn, "
    SELECT orders.*, users.name AS user_name 
    FROM orders 
    JOIN users ON orders.user_id = users.id 
    WHERE orders.status = 'Pending'
    ORDER BY orders.order_date DESC
");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/Navigation.css">
    <link rel="stylesheet" href="./CSS/order.css">
    <title>View Orders</title>
</head>

<body>
    <div class="topbar">
        <h1>View Order List</h1>
        <a class="logout-btn" href="../logout.php">Logout</a>
    </div>

    <?php include "./Navigation/Navigation.php"; ?>

    <main>
        <div class="container">
            <h2>Customer Orders</h2>
            <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>

            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Total Price</th>
                    <th>Ordered At</th>
                    <th>Items</th>
                    <th>Status</th>
                </tr>

                <?php while ($order = mysqli_fetch_assoc($order_result)) { ?>
                    <tr>
                        <td><?= $order['id']; ?></td>
                        <td><?= htmlspecialchars($order['user_name']); ?></td>
                        <td>Rs <?= number_format($order['total_price'], 2); ?></td>
                        <td><?= $order['order_date']; ?></td>
                        <td>
                            <ul>
                                <?php
                                $items_result = mysqli_query($conn, "
                    SELECT order_items.quantity, products.name AS product_name 
                    FROM order_items 
                    JOIN products ON order_items.product_id = products.id 
                    WHERE order_items.order_id = {$order['id']}
                ");
                                if ($items_result && mysqli_num_rows($items_result) > 0) {
                                    while ($item = mysqli_fetch_assoc($items_result)) {
                                        echo "<li>" . htmlspecialchars($item['product_name']) . " x" . $item['quantity'] . "</li>";
                                    }
                                } else {
                                    echo "<li>No items found</li>";
                                }
                                ?>
                            </ul>
                        </td>
                        <td>
                            <form action="update_order_status.php" method="post">
                                <select name="status">
                                    <option value="Pending" <?= $order['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="Shipped" <?= $order['status'] == 'Shipped' ? 'selected' : '' ?>>Shipped</option>
                                    <option value="Delivered" <?= $order['status'] == 'Delivered' ? 'selected' : '' ?>>Delivered</option>
                                    <option value="Cancelled" <?= $order['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                </select>
                                <input type="hidden" name="order_id" value="<?= $order['id']; ?>">
                                <button type="submit" class="update-btn">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </main>

</body>

</html>