<?php
session_start();
include 'includes/config.php';

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found!";
        exit;
    }
} else {
    echo "Invalid product ID!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .product-details {
            max-width: 800px;
            margin: auto;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .product-details img {
            max-width: 100%;
            border-radius: 10px;
        }
        .product-details h1 {
            font-size: 24px;
            margin: 20px 0;
        }
        .product-details p {
            font-size: 16px;
            color: #555;
        }
        .product-details .price {
            font-size: 20px;
            color: #000;
            margin-top: 20px;
        }
        .product-details .category {
            font-size: 14px;
            color: #777;
            margin-bottom: 20px;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007BFF;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="product-details">
        <img src="./assets/furnitures/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
        <h1><?php echo htmlspecialchars($product['name']); ?></h1>
        <p class="category">Category: <?php echo htmlspecialchars($product['category']); ?></p>
        <p class="price">Price: LKR.<?php echo htmlspecialchars($product['price']); ?></p>
        <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
        <a href="./sell_product.php" class="back-link">Back to Products</a>
    </div>
</body>
</html>
