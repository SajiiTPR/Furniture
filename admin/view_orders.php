<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$orders = mysqli_query($conn, "SELECT orders.*, users.name FROM orders JOIN users ON orders.user_id = users.id ORDER BY orders.created_at DESC");
?>

<h2>Customer Orders</h2>
<form method="post" action="update_order_status.php">
<tr>
    <td><?= $order['id']; ?></td>
    <td><?= $order['name']; ?></td>
    <td>$<?= $order['total_price']; ?></td>
    <td><?= $order['created_at']; ?></td>
    <td>
        <ul>
            <?php
                $items = mysqli_query($conn, "SELECT order_items.*, products.name FROM order_items JOIN products ON order_items.product_id = products.id WHERE order_id = " . $order['id']);
                while ($item = mysqli_fetch_assoc($items)) {
                    echo "<li>" . $item['name'] . " x" . $item['quantity'] . "</li>";
                }
            ?>
        </ul>
    </td>
    <td>
        <select name="status">
            <option value="Pending" <?= $order['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
            <option value="Shipped" <?= $order['status'] == 'Shipped' ? 'selected' : '' ?>>Shipped</option>
            <option value="Delivered" <?= $order['status'] == 'Delivered' ? 'selected' : '' ?>>Delivered</option>
        </select>
        <input type="hidden" name="order_id" value="<?= $order['id']; ?>">
        <button type="submit">Update</button>
    </td>
</tr>
</form>

