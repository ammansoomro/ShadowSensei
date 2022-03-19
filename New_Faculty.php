<?php
include_once('check_cookie_admin.php');
?>

<?php
include_once "connect.php";
$query = "SELECT * FROM department_details";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/New_Faculty.css" />
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">

    <?php include("Includes/NavBar_Faculty.php") ?>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
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
    </script>
    <div class="Details_Form">
        <a href="#">
            <div class="image">
                <img src="Pictures/Ninja_Logo.png">
            </div>
        </a>
        <div class="myform">
            <form method="POST" action="/Insert/Insert_Faculty_Details.php">
                <h2>New Teacher</h2>
                <input id="fname" name="fname" type="text" placeholder="Full Name">
                <input id="gender" name="gender" type="text" placeholder="Gender">
                <input id="address" name="address" type="text" placeholder="Address">
                <input id="salary" name="salary" type="text" placeholder="Salary">
                <input id="tid" name="tid" type="text" placeholder="Teacher ID">
                <input id="password" name="password" type="password" placeholder="Password">
                <option value="">Select Department</option>
                <select name="did" id="did">
                    <?php while($rows = $result->fetch_assoc()) { ?>

                    <option value="<?php echo $rows["Department_ID"]?>" name="sid" id="sid">
                        <?php echo $rows["Department_ID"]?></option>
                    <?php 
                    } 
                    ?>
                </select>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>
</body>

</html>