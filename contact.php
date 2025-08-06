<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
    exit();
}

// Process form submission
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact (name, email, phone, subject, message) 
            VALUES ('$name', '$email', '$phone', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        $success = '<div class="alert success">Thank you! Your message has been sent successfully.</div>';
    } else {
        $success = '<div class="alert error">Error: ' . $sql . '<br>' . $conn->error . '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/Contact.css">
    <link rel="stylesheet" href="./assets/css/user_navigation.css">
    <link rel="stylesheet" href="./assets/css/user_footer.css">
    <title>Contact Us</title>
</head>

<body>
    <?php include "./user_navigation.php"; ?>

    <div class="container">
        <h1 class="page-title">Contact Home Furniture</h1>

        <div class="contact-container">
            <!-- Owner Information Section -->
            <div class="contact-left">
                <div class="owner-info">
                    <img src="./assets/image/profile-pic (3).png" alt="Professional headshot of John Doe, the owner of Home Furniture, wearing a suit with a warm smile" class="owner-image">
                    <h2 class="owner-name"> sajith MHD </h2>
                    <p class="owner-title">Founder & CEO</p>
                </div>

                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div>
                            <h3>Our Location</h3>
                            <p>123 Furniture Street Trincomalee</p>
                            <p>SriLanka</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3>Call Us</h3>
                            <p>+94 758 220 825</p>
                            <p>Mon - Fri: 9AM - 9PM</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h3>Email Us</h3>
                            <p>m.a.m.sajith114@gmail.com</p>
                            <p>mamsajith52@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form Section -->
            <div class="contact-right">
                <h2 class="section-title">Send us a message</h2>

                <?php echo $success; ?>

                <form method="POST" action="" id="contactForm">
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="name">Full Name*</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject*</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message*</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>

                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <?php include "./user_footer.php"; ?>

    <script src="./assets/js/contact.js"></script>
</body>

</html>