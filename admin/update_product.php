<?php
session_start();
include '../includes/config.php';

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
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Product</title>
    <style>
        body {
            background: #f4f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }
        .form-container {
            background: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            max-width: 450px;
            width: 100%;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-weight: 700;
            letter-spacing: 1px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px 15px;
            font-size: 16px;
            border: 1.8px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s ease;
            font-family: inherit;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        input[type="file"]:focus {
            border-color: #007bff;
            outline: none;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
            font-size: 15px;
        }
        button, .back-btn {
            background-color: #007bff;
            color: white;
            font-weight: 700;
            border: none;
            padding: 14px 0;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.25s ease;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }
        button:hover, .back-btn:hover {
            background-color: #0056b3;
        }
        .back-btn {
            margin-bottom: 25px;
            width: 150px;
        }
        .image-preview {
            text-align: center;
        }
        .image-preview img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 12px;
            object-fit: contain;
            border: 1.5px solid #ccc;
        }
    </style>
</head>
<body>

<div class="form-container">
    <a href="edit_product.php" class="back-btn">← Back</a>

    <h2>Edit Product</h2>

    <?php if (!empty($product['image']) && file_exists("../assets/images/" . $product['image'])): ?>
        <div class="image-preview">
            <img src="../assets/images/<?= htmlspecialchars($product['image']); ?>" alt="Current Product Image" />
        </div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']); ?>" placeholder="Product Name" required>

        <textarea name="description" placeholder="Product Description"><?= htmlspecialchars($product['description']); ?></textarea>

        <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['price']); ?>" placeholder="Price (e.g. 29.99)" required>

        <input type="text" name="category" value="<?= htmlspecialchars($product['category']); ?>" placeholder="Category" required>

        <input type="file" name="image" accept="image/*">

        <button type="submit">Update Product</button>
    </form>
</div>

</body>
</html>
