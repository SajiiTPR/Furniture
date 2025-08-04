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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./CSS/Navigation.css">
    <link rel="stylesheet" href="./CSS/dashboard.css">
</head>
<body>

    <div class="topbar">
        <h1>Admin Dashboard</h1>
        <a class="logout-btn" href="../logout.php">Logout</a>
    </div>

    <!-- Navigation placeholder (would be replaced by PHP include in actual file) -->
    
    <?php include "./Navigation/Navigation.php";?>

    <section class="detailed">
        <h2>Welcome, <span><?php echo $_SESSION['admin_name'] ?></span></h2>
        <h3>Total Income (Delivered Orders): <span>Rs. <?= number_format($total_income, 2); ?></span></h3>
    </section>

</body>
</html>
