<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Handle deletion if requested via GET
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    // Prevent deleting admins by mistake (extra safety)
    $check = mysqli_query($conn, "SELECT user_type FROM users WHERE id = $delete_id");
    if ($check && mysqli_num_rows($check) > 0) {
        $row = mysqli_fetch_assoc($check);
        if ($row['user_type'] != 'admin') {
            mysqli_query($conn, "DELETE FROM users WHERE id = $delete_id");
            header("Location: manage_users.php");
            exit();
        }
    }
}

// Fetch all non-admin users
$query = "SELECT id, name, email, user_type, created_at FROM users WHERE user_type != 'admin' ORDER BY id ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/nav.css">
    <link rel="stylesheet" href="./Navigation/sitebar.css">
    <title>Manage Users</title>
    <style>
        *{
            padding: 0px;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f7f9fc;           

        }
        main{
            margin-left: 20em;
        }

        main .container {
            margin: 0 auto;
            width: 70vw;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);            
        }

        h2 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            
        }
        th {
            background-color: #4b6cb7;
            text-shadow: 0 0 2px rgb(0, 0, 0);
            color: white;
            text-align: left;
        }
        tr:hover {
            background-color: #f1f5f9;
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
        .remove-btn {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        .remove-btn:hover {
            background-color: #b02a37;
        }
    </style>
    <script>
        function confirmRemove(name) {
            return confirm("Are you sure you want to remove user '" + name + "'?");
        }
    </script>
</head>
<body>
    <div class="topbar">
        <h1>Manage Users</h1>
        <a class="logout-btn" href="../logout.php">Logout</a>
    </div>

    <?php include "./Navigation/nav.php";?>
<main>
    <div class="container">
        <h2>Manage Users</h2>
        <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(mysqli_num_rows($result) > 0): 
                    $serial = 1;
                    while ($user = mysqli_fetch_assoc($result)): 
                ?>
                    <tr>
                        <td><?= $serial++; ?></td>
                        <td><?= htmlspecialchars($user['name']); ?></td>
                        <td><?= htmlspecialchars($user['email']); ?></td>
                        <td><?= htmlspecialchars($user['user_type']); ?></td>
                        <td>
                            <a href="manage_users.php?delete_id=<?= $user['id']; ?>" 
                               class="remove-btn" 
                               onclick="return confirmRemove('<?= htmlspecialchars($user['name']); ?>');">
                                Remove
                            </a>
                        </td>
                    </tr>
                <?php endwhile; else: ?>
                    <tr><td colspan="5" style="text-align:center;">No users found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
