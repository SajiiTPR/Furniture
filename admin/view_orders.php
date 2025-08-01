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
    <link rel="stylesheet" href="./CSS/nav.css">
    <link rel="stylesheet" href="./Navigation/sitebar.css">
    <title>View Orders</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;

        }

        body {
            font-family: Arial, sans-serif;
            background: #f7f9fc;

        }

        main{
            margin-left: 20em;
        }

        main .container {
            margin: 0 auto;
            width: 75vw;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);            
            
        }

        h2 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            vertical-align: top;
        }

        th {
            background-color: #4b6cb7;
            text-shadow: 0 0 2px rgb(0, 0, 0);
            color: white;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        .back-btn {
            display: inline-block;
            padding: 8px 16px;
            margin-bottom: 20px;
            background: linear-gradient(to right, #182848, #4b6cb7);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            text-shadow: 0 0 2px rgb(0, 0, 0);
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background: linear-gradient(to right, #4b6cb7, #182848);
        }

        .update-btn {
            background-color: #28a745;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            margin-top: 8px;
            transition: background-color 0.3s ease;
        }

        .update-btn:hover {
            background-color: #218838;
        }

        select {
            padding: 5px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="topbar">
        <h1>View Order List</h1>
        <a class="logout-btn" href="../logout.php">Logout</a>
    </div>

    <?php include "./Navigation/nav.php"; ?>
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