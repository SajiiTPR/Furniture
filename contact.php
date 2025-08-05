<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_messages (name, email, mobile, message) VALUES ('$name', '$email', '$mobile', '$message')";
    if ($conn->query($sql)) {
        $success_message = "Your message has been sent successfully!";
    } else {
        $error_message = "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="./assets/css/Contact_page.css">
    <link rel="stylesheet" href="./assets/css/user_navigation.css">
    <link rel="stylesheet" href="./assets/css/user_footer.css">
</head>

<body>
    <?php include "./user_navigation.php"; ?>

    <h1>Contact Us</h1>

    <div class="contact-container">


        <!-- Left Info Section -->
        <section class="info">
            <h2>About the Designer</h2>
            <p>Our furniture website is crafted by a team of passionate developers committed to blending innovation with functionality. With expertise in modern web technologies, we ensure seamless navigation, responsive designs, and an intuitive user experience. Dedicated to excellence, our developers prioritize performance and aesthetics to deliver a platform that elevates your furniture shopping journey.
            </p>
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
            <form method="POST" action="">
                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" id="mobile" name="mobile" required>
                </div>
                <div class="input-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </section>
    </div>

    <?php include "./user_footer.php"; ?>

    <script src="./assets/js/Contact.js" defer></script>
</body>

</html>