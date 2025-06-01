<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // If new image uploaded
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "../assets/images/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $sql = "UPDATE products SET name='$name', description='$desc', price=$price, category='$category', image='$image' WHERE id=$id";
    } else {
        $sql = "UPDATE products SET name='$name', description='$desc', price=$price, category='$category' WHERE id=$id";
    }

    mysqli_query($conn, $sql);
    header("Location: edit_product.php");
}
?>

<h2>Edit Product</h2>
<form method="post" enctype="multipart/form-data">
    <input type="text" name="name" value="<?= $product['name']; ?>" required><br>
    <textarea name="description"><?= $product['description']; ?></textarea><br>
    <input type="number" step="0.01" name="price" value="<?= $product['price']; ?>" required><br>
    <input type="text" name="category" value="<?= $product['category']; ?>" required><br>
    <input type="file" name="image"><br>
    <button type="submit">Update Product</button>
</form>
