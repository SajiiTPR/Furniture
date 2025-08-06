<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $message = trim($_POST['message']);

    // Prepare SQL statement using prepared statements
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, mobile, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $mobile, $message);

    // Execute query and check for success
    if ($stmt->execute()) {
        $success_message = "Message sent successfully!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/Contact_page.css">
    <link rel="stylesheet" href="./assets/css/user_navigation.css">
    <link rel="stylesheet" href="./assets/css/user_footer.css">
    <title>Contact Us</title>
</head>

<body>
    <?php include "./user_navigation.php"; ?>

    <h1>Contact Us</h1>

    <div class="contact-container">

        <!-- Left Info Section -->
        <section class="info">
            <h2>About the Designer</h2>
            <p>Our furniture website is crafted by a team of passionate developers committed to blending innovation with functionality. With expertise in modern web technologies, we ensure seamless navigation, responsive designs, and an intuitive user experience. Dedicated to excellence, our developers prioritize performance and aesthetics to deliver a platform that elevates your furniture shopping journey.</p>
            <p>Designed by: Mohamed Sajith</p>
            <div class="details">
                <h3>Contact Information</h3>
                <div class="details-info">
                    <div class="cont">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>Thoppur-31250, Trincomalee, Eastern, SriLanka</p>
                    </div>
                    <div class="cont">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                        <p>+94 75 822 0825</p>
                    </div>
                    <div class="cont">
                        <i class="fa-solid fa-envelope"></i>
                        <p>m.a.m.sajith114@gmail.com</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Right Form Section -->
        <section class="form">
            <h2>Contact Us</h2>
            <?php if (isset($success_message)) echo "<p class='success-message'>$success_message</p>"; ?>
            <?php if (isset($error_message)) echo "<p class='error-message'>$error_message</p>"; ?>
            <div></div>
            <form method="POST" action="">
                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" >
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" >
                </div>
                <div class="input-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" id="mobile" name="mobile" >
                </div>
                <div class="input-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" ></textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </section>
    </div>

    <?php include "./user_footer.php"; ?>

    <script src="./assets/js/Contact.js" defer></script>
</body>

</html>
