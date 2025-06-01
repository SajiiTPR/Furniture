<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch products
$result = mysqli_query($conn, "SELECT * FROM products");
?>

<h2>All Products</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['name']; ?></td>
        <td>$<?= $row['price']; ?></td>
        <td><?= $row['category']; ?></td>
        <td><img src="../assets/images/<?= $row['image']; ?>" width="50"></td>
        <td>
            <a href="update_product.php?id=<?= $row['id']; ?>">Edit</a> |
            <a href="delete_product.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this product?');">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
