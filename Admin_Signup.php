
<?php
include_once('connect.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup Page</title>
    <link rel="stylesheet" href="CSS/Admin_Signup.css">
</head>

<body>
    <div class="container">
        <a href="index.php">
            <div class="image">
                <img src="Pictures/Ninja_Logo.png">
            </div>
        </a>
        <div class="myform">
            <form method="POST" action="/Insert/Insert_Admin_Details.php">
                <h2>New Ninja?</h2>
                <input id="fname" name="fname" type="text" placeholder="First Name">
                <input id="lname" name="lname" type="text" placeholder="Last Name"">
                <input id=" email" name="email" type="text" placeholder="Email">
                <input id="username" name="username" type="text" placeholder="Username">
                <input id="password" name="password" type="password" placeholder="Password">
                <!-- <input id="rPassword" name="rPassword" type="password" placeholder="Re-Enter Password"> -->
                <button type="submit">Sign Up</button>
            </form>
            <!-- <a href="HTML_Admin_Login.html">
                <button type="submit">Login</button>
            </a> -->
        </div>

    </div>
</body>

</html>