<?php
include './includes/config.php';
session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']); // Consider using password_hash in production

    $select = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_id'] = $row['id'];
            header('location:admin_page.php');
            exit;
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_id'] = $row['id'];
            header('location:user_page.php');
            exit;
        }
    } else {
        $error[] = 'Incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
   <link rel="stylesheet" href="./assets/css/login_form.css"> 
</head>
<body>

<div class="form-container">
   <form action="" method="post">
      <h3>Login Now</h3>

      <?php
      if (isset($error)) {
         foreach ($error as $err) {
            echo '<span class="error-msg">' . $err . '</span>';
         }
      }
      ?>

      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login Now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register now</a></p>
   </form>
</div>

</body>
</html>
