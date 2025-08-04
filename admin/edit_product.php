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
    <link rel="stylesheet" href="./CSS/Navigation.css">
    <link rel="stylesheet" href="./CSS/edit.css">
    <title>All Products</title>
</head>

<body>
    <div class="topbar">
        <h1>Update Product</h1>
        <a class="logout-btn" href="../logout.php">Logout</a>
    </div>

    <?php include "./Navigation/Navigation.php"; ?>

    <main>
        <div class="table-container">
            <h2>Update Products</h2>
            <a href="dashboard.php" class="back-btn">&larr; Back to Dashboard</a>
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
                        <td>
                            <?= htmlspecialchars($row['name']); ?>
                        </td>
                        <td>LKR.
                            <?= number_format($row['price'], 2); ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($row['category']); ?>
                        </td>
                        <td><img src="../assets/images/<?= htmlspecialchars($row['image']); ?>" width="50"
                                alt="<?= htmlspecialchars($row['name']); ?>"></td>
                        <td class="act-btns">
                            <a class="action-btn edit-btn" href="update_product.php?id=<?= $row['id']; ?>">Edit</a>
                            <a class="action-btn delete-btn" href="delete_product.php?id=<?= $row['id']; ?>"
                                onclick="return confirm('Delete this product?');">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </main>

</body>

</html>