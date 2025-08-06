<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/About_Page.css">
    <link rel="stylesheet" href="./assets/css/user_navigation.css">
    <link rel="stylesheet" href="./assets/css/user_footer.css">
    <title>About Us</title>
</head>

<body>
    <?php include "./user_navigation.php"; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Crafting Spaces, <span class="highlight">Defining Lifestyles</span></h1>
            <p>We blend artistry with functionality to create furniture that transforms houses into homes.</p>
            <a href="#story" class="btn">Our Story</a>
        </div>
    </section>

    <!-- Our Story Section -->
    <section id="story" class="story">
        <div class="container">
            <h2>Our <span class="highlight">Journey</span></h2>
            <p>Founded in 2010, our furniture system began with a simple vision: to create pieces that marry timeless design with modern functionality.</p>
            <p>What started as a small workshop has grown into a renowned design studio, but we've never lost sight of our craft-first approach.</p>
            <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/bc66ab0d-810e-4858-81d4-4ead4498f62d.png" alt="Craftsmen at work" class="story-image">
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2>Our <span class="highlight">Approach</span></h2>
            <div class="feature-cards">
                <div class="feature-card">
                    <h3>Premium Materials</h3>
                    <p>We source only the finest woods and fabrics, ensuring durability and beauty that lasts generations.</p>
                </div>
                <div class="feature-card">
                    <h3>Thoughtful Design</h3>
                    <p>Every curve and corner is deliberately designed for both aesthetic appeal and practical functionality.</p>
                </div>
                <div class="feature-card">
                    <h3>Sustainable Craft</h3>
                    <p>We're committed to environmentally responsible practices at every stage of production.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team">
        <div class="container">
            <h2>Meet The <span class="highlight">Makers</span></h2>
            <div class="team-cards">
                <div class="team-card">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/f00ca021-9d3e-4170-87dd-b7678d15b89d.png" alt="Robert Lang">
                    <h3>Robert Lang</h3>
                    <p>Master Craftsman</p>
                </div>
                <div class="team-card">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/d1d390a1-31fe-4a53-8cee-023db3ca1104.png" alt="Sophia Chen">
                    <h3>Sophia Chen</h3>
                    <p>Lead Designer</p>
                </div>
                <div class="team-card">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/ec1da980-fff7-4d6f-a6fa-eaffe444a434.png" alt="James Wilson">
                    <h3>James Wilson</h3>
                    <p>Operations Director</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Transform Your Space?</h2>
            <p>Discover how our furniture system can elevate your home or office.</p>
            <div class="cta-buttons">
                <a href="./product.php" class="btn">Browse Collections</a>
                <a href="./contact.php" class="btn secondary">Book Consultation</a>
            </div>
        </div>
    </section>

    <?php include "./user_footer.php"; ?>

    <script src="./assets/js/About.js"></script>
</body>

</html>