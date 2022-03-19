<?php
include_once('check_cookie_student.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/Student_Marks.css" />
    <title>Student Marks</title>
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
            </div>
            <?php 
                $qString = "Select * from section_enrollment natural join section_details natural join course_details where Student_ID = '".$_COOKIE["student"]."'";
                $res = $conn -> query($qString);
            
            ?>
            <!-- Details List -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Marks</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Course</td>
                                <td>Assignment</td>
                                <td>Quiz</td>
                                <td>Mid I</td>
                                <td>Mid II</td>
                                <td>Finals</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(mysqli_num_rows($res) > 0){
                                    foreach($res as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row["Course_Name"]; ?></td>
                                <td><?php echo $row["as_marks"]; ?></td>
                                <td><?php echo $row["quiz_marks"]; ?></td>
                                <td><?php echo $row["mid1_marks"]; ?></td>
                                <td><?php echo $row["mid2_marks"]; ?></td>
                                <td><?php echo $row["final_marks"]; ?></td>
                                <td><?php echo $row["as_marks"] + $row["quiz_marks"] + $row["mid1_marks"] + $row["mid2_marks"] + $row["final_marks"]; ?></td>
                            </tr>
                            <?php
                                    }
                                } else {
                                    ?>
                            <tr>
                                <td colspan = "6">You are not enrolled in any class</td>
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