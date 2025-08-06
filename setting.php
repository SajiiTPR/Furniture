<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user details from the database
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the updated details from the form
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Update user details in the database
    $update_query = "UPDATE users SET name = ?, email = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    // Corrected line: Changed "sssi" to "ssi"
    $update_stmt->bind_param("ssi", $name, $email, $user_id);

    if ($update_stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

// Close the statement
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/Setting.css">
    <link rel="stylesheet" href="./assets/css/user_navigation.css">
    <link rel="stylesheet" href="./assets/css/user_footer.css">
    <title>Edit Profile</title>
</head>

<body>
    <?php include "./user_navigation.php"; ?>
    <h1>Edit Profile</h1>
    <p>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</p>
    <form id="profile-form" method="POST" action="">
        <div class="form-group">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" id="name" class="form-input" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            <span class="error-message" id="name-error" style="display:none;">Please enter your full name</span>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" class="form-input" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            <span class="error-message" id="email-error" style="display:none;">Please enter a valid email address</span>
        </div>


        <button type="submit" value="Update Profile" class="submit-btn">Update Profile</button>
    </form>
    <?php include "./user_footer.php"; ?>
    <script src="./assets/js/Setting.js"></script>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>