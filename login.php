<?php

session_start();
$connection = mysqli_connect('localhost', 'root', '', 'madingonline') or die ('koneksi db tidak  terhubung!')
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">
    <title>Admin Login</title>
</head>
<body>
<div class="login-form">
      <form action="login.php" method="post" class="loginlogin-form">
        <h1 class="loginh1">Admin Mading Online</h1>
    <div class="formInput">
      <label class="lblform">Username</label>
      <input type="text" name="username" placeholder="Username" required="" class="input-form"
      />
      <span class="span-form"></span>
    </div>
    <div class="formInput">
      <label class="lblform">Password</label>
      <input type="password" name="password" placeholder="Password" required="" class="input-form"
      />
      <span class="span-form"></span>
    </div>  
    <button type="submit" name="login" value="Login" class="btn-login">Submit</button>
      </form>
    </div>

<?php
    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

    $select = mysqli_query($connection," SELECT * FROM user WHERE username = '$username' AND password = '$password' ");
    $row = mysqli_fetch_array($select);

    if(is_array($row)) {
        $_SESSION["username"] = $row['username'];
        $_SESSION["password"] = $row['password'];
    } else {
        echo '<script type = "text/javascript">';
        echo 'alert("username atau password salah!");';
        echo 'window.location.href = "login.php" ';
        echo '</script>';
    }
    }
    if(isset($_SESSION["username"])){
        header("Location:dashboard.php");
    }
?>


</body>
</html>