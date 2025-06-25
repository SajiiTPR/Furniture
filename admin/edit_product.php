<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch products
$result = mysqli_query($conn, "SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/nav.css">
    <title>All Products</title>
    <style>
        *{
            padding: 0px;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            margin-top: 20px;
            padding: 8px 16px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #5a6268;
        }

        .table-container {
            max-width: 1000px;
            margin: auto;
            overflow-x: auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 12px 15px;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        img {
            border-radius: 5px;
        }

        a.action-btn {
            padding: 6px 12px;
            margin-right: 5px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-size: 14px;
        }

        a.edit-btn {
            background-color: #28a745;
        }

        a.edit-btn:hover {
            background-color: #218838;
        }

        a.delete-btn {
            background-color: #dc3545;
        }

        a.delete-btn:hover {
            background-color: #c82333;
        }

        @media (max-width: 600px) {
            th, td {
                font-size: 14px;
                padding: 10px;
            }

            a.action-btn {
                display: inline-block;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
<div class="topbar">
        <h1>Update Product</h1>
        <a class="logout-btn" href="../logout.php">Logout</a>
    </div>
<a href="dashboard.php" class="back-btn">&larr; Back to Dashboard</a>

<h2>All Products</h2>
<div class="table-container">
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td>$<?= number_format($row['price'], 2); ?></td>
            <td><?= htmlspecialchars($row['category']); ?></td>
            <td><img src="../assets/images/<?= htmlspecialchars($row['image']); ?>" width="50" alt="<?= htmlspecialchars($row['name']); ?>"></td>
            <td>
                <a class="action-btn edit-btn" href="update_product.php?id=<?= $row['id']; ?>">Edit</a>
                <a class="action-btn delete-btn" href="delete_product.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this product?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
