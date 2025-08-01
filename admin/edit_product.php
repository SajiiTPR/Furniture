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
    <link rel="stylesheet" href="./Navigation/sitebar.css">
    <title>All Products</title>
    <style>
        * {
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
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 8px 16px;
            background: linear-gradient(to right, #182848, #4b6cb7);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            text-shadow: 0 0 2px rgb(0, 0, 0);
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background: linear-gradient(to right, #4b6cb7, #182848);
        }
        main{
            margin-left: 20em;
        }

        main .table-container {
            margin: 0 auto;
            width: 75vw;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: left;
            padding: 12px 15px;
            vertical-align: top;
        }

        th {
            background-color: #4b6cb7;
            text-shadow: 0 0 2px rgb(0, 0, 0);
            color: white;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        img {
            border-radius: 5px;
        }

        .act-btns {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 10px;
        }

        a.action-btn {
            width: 4vw;
            padding: 6px 12px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            text-shadow: 0 0 2px rgb(0, 0, 0);
            text-align: center;
        }

        a.edit-btn {
            background-color: cornflowerblue;
        }

        a.edit-btn:hover {
            background-color: #182848;
        }

        a.delete-btn {
            background-color: #ed2f68;
        }

        a.delete-btn:hover {
            background-color: #a71322;
        }

        @media (max-width: 600px) {

            th,
            td {
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

    <?php include "./Navigation/nav.php"; ?>
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