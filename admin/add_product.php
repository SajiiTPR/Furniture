<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../admin_page.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    // Save image
    $image = $_FILES['image']['name'];
    $targetDirectory = "../assets/images/";

    // Ensure the target directory exists
    if (!is_dir($targetDirectory)) {
        mkdir($targetDirectory, 0777, true); // Create directory if it doesn't exist
    }

    $target = $targetDirectory . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO products (name, description, price, image, category) 
                VALUES ('$name', '$desc', '$price', '$image', '$category')";

        if (mysqli_query($conn, $sql)) {
            header("Location:./dashboard.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image. Check file permissions or file size limits.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/Navigation.css">
    <link rel="stylesheet" href="./CSS/add.css">
    <title>Add Product</title>
</head>

<body>
    <div class="topbar">
        <h1>Add Product</h1>
        <a class="logout-btn" href="../logout.php">Logout</a>
    </div>

    <?php include "./Navigation/Navigation.php"; ?>

    <main class="container-box">
        <div class="form-container">
            <h2>Add Product</h2>
            <form method="post" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Product Name" required>
                <textarea name="description" placeholder="Description"></textarea>
                <input type="number" step="0.01" name="price" placeholder="Price" required>
                <input type="text" name="category" placeholder="Category" required>
                <input type="file" name="image" required>
                <button type="submit">Add Product</button>
            </form>
        </div>
    </main>

</body>

</html>