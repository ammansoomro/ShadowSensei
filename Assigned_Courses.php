<?php
include_once('check_cookie_admin.php');
?>

<?php
include_once "connect.php";
$query = "SELECT * FROM teacher_course_details";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/Assigned_Courses.css" />
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">

    <?php include("Includes/NavBar_Faculty.php") ?>


        <!-- Dashboard Main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <!-- Search Box -->
                <?php include("Includes/Searchbar.php") ?>
                <!-- User Image Box -->
                <div class="user">
                    <span class="icon"><img src="Pictures/UserIcon.jpg" width="80px" position="relative" /></span>
                </div>
            </div>

            <!-- Cards -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"> <?php include_once "connect.php";
                $count_rows = "SELECT Teacher_ID from teacher_course_details ORDER BY Teacher_ID";
                $count_rows_output = $conn->query($count_rows);
                $rows = mysqli_num_rows($count_rows_output);
                echo $rows; 
                ?></div>
                        <div class="cardName">Total Faculty</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- Details List -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Assigned Courses Details</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Teacher ID</td>
                                <td>Course ID</td>
                        </thead>
                        <tbody>
                            <?php while ($rows = $result->fetch_assoc()) { ?>
                            <tr>
                                <td> <?php echo $rows["Teacher_ID"]; ?> </td>
                                <td> <?php echo $rows["Course_ID"]; ?> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
</body>

</html>