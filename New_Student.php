<?php
include_once('check_cookie_admin.php');
?>

<?php
include_once('connect.php');
$query = "SELECT * FROM section_details";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/New_Student.css" />
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">
    <?php include("Includes/NavBar_Student.php") ?>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <div class="Details_Form">
        <a href="#">
            <div class="image">
                <img src="Pictures/Ninja_Logo.png">
            </div>
        </a>
        <div class="myform">
            <form method="POST" action="/Insert/Insert_Student_Details.php">
                <h2>New Student</h2>
                <input id="fname" name="fname" type="text" placeholder="Full Name">
                <input id="gender" name="gender" type="text" placeholder="Gender">
                <input id="address" name="address" type="text" placeholder="Address">
                <input id="sid" name="sid" type="text" placeholder="Student ID">
                <input id="password" name="password" type="password" placeholder="Password">
                <button type="submit">Add Student</button>
            </form>
        </div>
    </div>
    <script>
    //Menu Toggle
    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");

    toggle.onclick = function() {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };
    // <!-- Adding Hovered Class in Selected list -->
    let list = document.querySelectorAll(".navigation li");
    function activeLink() {
        list.forEach((item) => item.classList.remove("hovered"));
        this.classList.add("hovered");
    }
    list.forEach((item) => item.addEventListener("mouseover", activeLink));
    </script>
</body>

</html>