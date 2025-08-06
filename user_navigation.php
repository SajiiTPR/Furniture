<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./user_navigation.css">
    <title>Furniture Hub Navigation</title>

</head>

<body>
    <nav class="top-bar">
        <div class="logo">
            <img src="./assets/image/Logo.png" alt="Modern furniture logo" class="logoimg">
            <a class="navbar-brand" href="./Home.php">Furniture Hub</a>
        </div>

        <div class="nav" id="navMenu">
            <a href="./Home.php"><i class="fa-solid fa-house"></i> Home</a>
            <a href="./product.php"><i class="fa-solid fa-shop"></i> Shop</a>
            <a href="./about.php"><i class="fa-solid fa-circle-info"></i> About</a>
            <a href="./contact.php"><i class="fa-regular fa-message"></i> Contact</a>
            <a href="./cart.php"><span class="cart-icon"><i class="fa-solid fa-cart-shopping"></i> Cart</span></a>
        </div>

        <div class="profile">
            <span class="username" onclick="toggleDropdown()"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['user_name'] ?></span>
            <div class="dropdown-content" id="dropdownMenu">
                <a href="setting.php"><i class="fa-solid fa-gear"></i> Settings</a>
                <a href="./logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </div>
        </div>

        <div class="menu-toggle" onclick="toggleSidebar()">&#9776;</div>
    </nav>

    <div class="sidebar" id="sidebar">
        <a href="#" class="closebtn" onclick="closeSidebar()">&times;</a>
        <a href="./Home.php"><i class="fa-regular fa-house"></i> Home</a>
        <a href="./product.php"><i class="fa-solid fa-shop"></i> Shop</a>
        <a href="./about.php"><i class="fa-solid fa-circle-info"></i> About</a>
        <a href="./contact.php"><i class="fa-regular fa-message"></i> Contact</a>
        <a href="./cart.php"><span class="cart-icon"><i class="fa-solid fa-cart-shopping"></i> Cart</span></a>
        <a href="setting.php"><i class="fa-solid fa-gear"></i> Settings</a>
        <a href="./logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
    </div>



    <script src="./assets/js/user_navigation.js"></script>
</body>

</html>