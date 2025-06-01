<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./header.css">
    <title>header</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .sidebar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            height: 15vh;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .sidebar .logo a {
            font-size: 1.8em;
            flex: 2;
            color: aliceblue;
            text-decoration: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 35px;
            left: 7rem;
        }

        .sidebar .logo a:hover {
            text-decoration: none;
        }

        .sidebar .logo .logoimg {
            width: 15%;
        }

        .sidebar .nav a {
            flex: 4;
            color: white;
            text-decoration: none;
            font-size: 1.3em;
            margin: 0 10px;
        }

        .sidebar a:hover {
            text-decoration: underline;
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.1);
        }

        .logout-btn {
            flex: 1;
            background: none;
            border: none;
            padding: 0;
        }

        .logout-btn .btnlog {
            background-color: #ff4d4d;
            color: white;
            font-size: 1.3em;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .logout-btn .btnlog:hover {
            background-color: #c70c0c;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header class="sidebar">
        <div class="logo">
            <img src="./assets/image/Logo-removebg-preview.png" alt="Furniture Logo" class="logoimg">
            <a class="navbar-brand" href="#">Furniture Hub</a>
        </div>

        <div class="nav">

            <a href="./home.php">Home</a>
            <a href="./product.php">shop</a>
            <a href="./about.php">About</a>
            <a href="./contact.php">contact</a>
            <a href="./cart.php"><i class="fa-solid fa-cart-shopping"></i></a>

        </div>
        <div class="profile">
            
            <p><i class="fa-solid fa-user"></i> <?php echo $_SESSION['user_name'] ?></p>
        </div>
    </header>

</body>

</html>