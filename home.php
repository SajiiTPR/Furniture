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
    <link rel="stylesheet" href="./assets/css/user_navigation.css">
    <link rel="stylesheet" href="./assets/css/Home.css">
    <title>Furniture Hub</title>

</head>

<body>

    <?php include "./user_navigation.php"; ?>

    <section class="hero">
        <img src="./assets/image/poster.jpg" alt="Modern living room with minimalist furniture, neutral tones, and natural lighting showcasing our signature collection" />
        <div class="hero-content">
            <h1>Crafting Comfort with Elegance</h1>
            <p>Discover handcrafted furniture that blends timeless design with modern functionality.</p>
            <a href="./cart.php" class="btn">Explore Collections</a>
        </div>
    </section>

    <section class="featured">
        <div class="featured-img">
            <img src="./assets/image/baner.jpg" alt="Featured designer chair with ergonomic design and premium leather upholstery in our showroom" />
        </div>
        <div class="featured-content">
            <h2>Signature Collection</h2>
            <p>Our designer-curated collection represents the pinnacle of craftsmanship and innovative design. Each piece is created with sustainability and longevity in mind.</p>
            <p>Available for a limited time with custom upholstery options and personalization available upon request.</p>
            <a href="#" class="btn">View Collection</a>
        </div>
    </section>

    <section class="section-title">
        <h2>What Our Customers Say</h2>
        <p>Trusted by homeowners and designers worldwide</p>
    </section>

    <div class="testimonials">
        <div class="testimonial-card">
            <p>"The quality of Modernā's furniture is exceptional. Our living room has never looked better!"</p>
            <div class="testimonial-author">
                <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/20e070e4-35ee-4c66-9538-3e081135fb12.png" alt="Portrait of Sarah J. smiling outdoors" />
                <div>
                    <div class="author-name">Sarah J.</div>
                    <div>Interior Designer</div>
                </div>
            </div>
        </div>
        <div class="testimonial-card">
            <p>"Attention to detail and customer service are unmatched. Highly recommend!"</p>
            <div class="testimonial-author">
                <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/b5674b15-53a0-429b-8c99-9d86c04001c8.png" alt="Portrait of Michael T. in a business setting" />
                <div>
                    <div class="author-name">Michael T.</div>
                    <div>Homeowner</div>
                </div>
            </div>
        </div>
        <div class="testimonial-card">
            <p>"Sustainable materials without compromising on design. Exactly what I was looking for."</p>
            <div class="testimonial-author">
                <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/8da9f987-cee0-44db-9294-0cacd81fad5d.png" alt="Portrait of Emily R. with cityscape background" />
                <div>
                    <div class="author-name">Emily R.</div>
                    <div>Architect</div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./user_footer.php"; ?>

    <script src="./includes/user_navigation.js"></script>




</body>

</html>