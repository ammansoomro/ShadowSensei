

<?php
include_once('connect.php');
?>

<?php
    $cookie_name = "user";
    setcookie($cookie_name);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="CSS/Admin_Login.css">
</head>

<body>
    <div class="container">
        <a href="index.php">
            <div class="image">
                <img src="Pictures/Ninja_Logo.png">
            </div>
        </a>
        <div class="myform">
            <form method="POST" action="/Insert/login_admin.php">
                <h3>こんにちは</h3>
                <h2>Admin Login</h2>
                <input id="uname" name="uname" type="text" placeholder="Username">
                <input id="pass" name="pass" type="password" placeholder="Password">
                <button type="submit">Login</button>
            </form>
            <a href="Admin_Signup.php">
                <button type="submit">Signup</button>
            </a>
        </div>

    </div>
</body>

</html>