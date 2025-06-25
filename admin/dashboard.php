<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Get total income from delivered orders
$income_result = mysqli_query($conn, "SELECT SUM(total_price) AS total_income FROM orders WHERE status = 'Delivered'");
$income_row = mysqli_fetch_assoc($income_result);
$total_income = $income_row['total_income'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/nav.css">
    <link rel="stylesheet" href="./Navigation/nav.css">
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f0f2f5;
            min-height: 100vh;
            position: relative;
        }

        .detailed {
            cursor: default;
            display: block;
            text-align: center;
            margin-left: 20rem;
            margin-top: 15vh;
            font-size: 1.3em;
            line-height: 3em;
            text-transform: capitalize;
        }

        .detailed h2 span {
            color: #0056b3;
            text-transform: capitalize;
        }

        .detailed h3 {
            color: #cc0000;
        }

        .detailed h3 span {
            color: #28a745;
        }
    </style>
</head>

<body>

    <div class="topbar">
        <h1>Admin Dashboard</h1>
        <a class="logout-btn" href="../logout.php">Logout</a>
    </div>

    <?php include "./Navigation/nav.php";?>

    <section class="detailed">
        <h2>Welcome, <span><?php echo $_SESSION['admin_name'] ?></span></h2>
        <h3>Total Income (Delivered Orders): <span>Rs. <?= number_format($total_income, 2); ?></span></h3>
    </section>

</body>

</html>