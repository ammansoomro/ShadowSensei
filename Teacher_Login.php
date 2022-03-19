<!DOCTYPE html>
<html lang="en">

<?php
    $cookie_name = "faculty";
    setcookie($cookie_name);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login Page</title>
    <link rel="stylesheet" href="CSS/Teacher_Login.css">
</head>

<body>
    <div class="container">
        <a href="index.php">
            <div class="image">
                <img src="Pictures/Ninja_Logo.png">
            </div>
        </a>
        <div class="myform">
            <form method="POST" action="/Insert/Insert_Teacher_Login_Details.php">
                <h3>こんにちは</h3>
                <h2>Teacher Login</h2>
                <input id="uname" name="uname" type="text" placeholder="Username">
                <input id="pass" name="pass" type="password" placeholder="Password">
                <button type="submit">Login</button>
            </form>
        </div>

    </div>
</body>

</html>