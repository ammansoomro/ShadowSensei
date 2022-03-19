<?php
include_once('check_cookie_admin.php');
?>


<?php
include_once('connect.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/New_Department.css" />
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">
    <?php include("Includes/NavBar_Departments.php") ?>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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

    swal({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success",
        button: "Aww yiss!",
    });
    </script>
    <div class="Details_Form">
        <a href="#">
            <div class="image">
                <img src="Pictures/Ninja_Logo.png">
            </div>
        </a>
        <div class="myform">
            <form method="POST" action="/Insert/Insert_Department_Details.php">
                <h2>New Department</h2>
                <input id="did" name="did" type="text" placeholder="Department Code">
                <input id="dname" name="dname" type="text" placeholder="Department Name">
                <button type="submit" onclick=alert{"Test"}>Add Department</button>
            </form>
        </div>
    </div>
</body>

</html>