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
    <link rel="stylesheet" href="./CSS/add_product.css">
    <link rel="stylesheet" href="./CSS/nav.css">
    <link rel="stylesheet" href="./Navigation/sitebar.css">
    <title>Add Product</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;

        }
        .container-box{
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            height: 90vh;
            margin-left: 21em;
            
        }

        .container-box .form-container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

        }

        .container-box .form-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: auto;
            margin: 0 auto;
        }

        .container-box .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: linear-gradient(to right, #182848, #4b6cb7);
        }

        .form-container input,
        .form-container textarea,
        .form-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-container button {
            background: linear-gradient(to right, #182848, #4b6cb7);
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.2s ease-in-out;
        }

        .form-container button:hover {
            background: linear-gradient(to right, #4b6cb7, #182848);
        }

        .form-container button:active {
            letter-spacing: .1em;
            color: aqua;
        }

        .form-container input[type="file"] {
            padding: 5px;
        }

        .form-container input:focus,
        .form-container textarea:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 15px;
            }

            .form-container h2 {
                font-size: 1.5rem;
            }

            .form-container input,
            .form-container textarea,
            .form-container button {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="topbar">
        <h1>Add Product</h1>
        <a class="logout-btn" href="../logout.php">Logout</a>
    </div>

    <?php include "./Navigation/nav.php";?>

    <div class="container-box">
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
    </div>
</body>

</html>