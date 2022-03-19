<?php
include_once('check_cookie_admin.php');
?>

<?php
include_once "connect.php";
$query = "SELECT * FROM teacher_details";
$result = $conn->query($query);

$query2 = "SELECT * FROM course_details";
$result2 = $conn->query($query2);
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/Assign_Course.css" />
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
            <form method="POST" action="/Insert/Insert_Assign_Course.php">
                <h2>Assign Course</h2>
                <option value="">Select Teacher</option>
                <select name="Teacher_ID" id="Teacher_ID">
                    <?php while($rows = $result->fetch_assoc()) { ?>

                    <option value="<?php echo $rows["Teacher_ID"]?>" name="Select_Teacher" id="Select_Teacher">
                        <?php echo $rows["Teacher_ID"]?></option>
                    <?php 
                    } 
                    ?>
                </select>
                <option value="">Select Course</option>
                <select name="Course_ID" id="Course_ID">
                    <?php while($row = $result2->fetch_assoc()) { ?>

                    <option value="<?php echo $row["Course_ID"]?>" name="Select_Course" id="Select_Course">
                        <?php echo $row["Course_ID"]?></option>
                    <?php 
                    } 
                    ?>
                </select>
                <button type="submit">Assign Course</button>
            </form>
        </div>
    </div>
</body>

</html>