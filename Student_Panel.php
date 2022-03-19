<?php
include_once('check_cookie_student.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/Student_Panel.css" />
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">
    <?php include("Includes/NavBar_Student_Panel.php") ?>
        <!-- Dashboard Main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>


                <!-- User Image Box -->
                <div class="user">
                    <span class="icon"><img src="Pictures/UserIcon.jpg" width="80px" position="relative" /></span>
                </div>
            </div>

            <!-- Cards -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $_COOKIE['student']; ?></div>
                        <div class="cardName">Roll No</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo mysqli_fetch_assoc(mysqli_query($conn,"select * from student_details where student_id = '".$_COOKIE['student']."'"))['Name']; ?></div>
                        <div class="cardName">Name</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

            </div>
            <?php 
                $qString = "Select * from section_enrollment natural join section_details natural join course_details where Student_ID = '".$_COOKIE["student"]."' LIMIT 4";
                $res = $conn -> query($qString);
            
            ?>
            <!-- Details List -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Enrollments</h2>
                        <a href="Student_Courses.php" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Course Code</td>
                                <td>Course Name</td>
                                <td>Credit Hours</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(mysqli_num_rows($res) > 0){
                                    foreach($res as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row["Course_ID"]; ?></td>
                                <td><?php echo $row["Course_Name"]; ?></td>
                                <td><?php echo $row["Credit_Hours"]; ?></td>
                            </tr>
                            <?php
                                    }
                                } else {
                                    ?>
                            <tr>
                                <td colspan = "3">You are not enrolled in any class</td>
                            </tr>
                            <?php
                                }
                            ?>
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