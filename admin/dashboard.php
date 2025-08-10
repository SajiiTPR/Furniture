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
    <link rel="stylesheet" href="./CSS/Navigation.css">
    <link rel="stylesheet" href="./CSS/Dashboard.css">
    <title>Admin Dashboard</title>
    <script defer>
        function confirmRemove(name) {
            return confirm("Are you sure you want to remove user '" + name + "'?");
        }
    </script>
</head>

<body>
    <div class="topbar">
        <h1>Admin Dashboard</h1>
        <a class="logout-btn" href="../logout.php">Logout</a>
    </div>

    <!-- Navigation placeholder (would be replaced by PHP include in actual file) -->

    <?php include "./Navigation/Navigation.php"; ?>

    <h2>Welcome, <span><?php echo htmlspecialchars($_SESSION['admin_name']); ?></span></h2>

    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-title">Total Income (Delivered Orders): </div>
            <div class="stat-value"><span>Rs. <?= number_format($total_income, 2); ?></span></div>
        </div>
        <div class="stat-card">
            <div class="stat-title">New Orders</div>
            <div class="stat-value">24</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Pending Messages</div>
            <div class="stat-value">12</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Products</div>
            <div class="stat-value">136</div>
        </div>
    </div>

    <div class="contacts-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>subject</th>
                    <th>message</th>
                    <th>submission_date</th>
                    
                </tr>
            </thead>

            <tbody>
                <?php
                // SQL query to fetch data from contact table
                $sql = "SELECT id, name, email, phone, subject, message, submission_date FROM contact";
                $result = $conn->query($sql);

                // Check if there are results
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["phone"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["subject"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["message"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["submission_date"]) . "</td>";
                        
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>
            <td colspan='8'>No records found</td>
        </tr>";
                }
                ?>
            </tbody>

        </table>

    </div>

    <script src="./js/Dashboard.js"></script>

</body>

</html>

<?php
// Close the database connection
$conn->close();
?>