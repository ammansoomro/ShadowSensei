<?php
include_once('check_cookie_faculty.php');
?>

<?php
include_once('connect.php');
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/Teacher_Panel.css" />
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">
        <?php include_once('Includes/NavBar_Teacher_Panel.php') ?>

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
            <?php 
                $qString = "Select * from teacher_details where Teacher_ID = '".$_COOKIE["faculty"]."'";
                $result = $conn -> query($qString);
                $row = $result->fetch_assoc();
                $qString = "Select * from section_details where Teacher_ID = '".$_COOKIE["faculty"]."'";
                $sectionsCount = mysqli_num_rows($conn -> query($qString));
            
            ?>

            


            <!-- Cards -->
            <div class="cardBox">
                <div class="card">
                    <div>

                        <div class="numbers"><?php echo $_COOKIE["faculty"]; ?></div>
                        <div class="cardName">TeacherID</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $row["Name"] ?></div>
                        <div class="cardName">Name</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $sectionsCount ?></div>
                        <div class="cardName">Sections</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

            </div>
            <?php 
                $qString = "Select * from section_details natural join course_details where Teacher_ID = '".$_COOKIE["faculty"]."'";
                $res = $conn -> query($qString);
            
            ?>
            <!-- Details List -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Courses and Sections</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Section</td>
                                <td>Course Name</td>
                                <td>Course ID</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(mysqli_num_rows($res) > 0){
                                    foreach($res as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row["Section_ID"]; ?></td>
                                <td><?php echo $row["Course_Name"]; ?></td>
                                <td><?php echo $row["Course_ID"]; ?></td>
                            </tr>
                            <?php
                                    }
                                } else {
                                    ?>
                            <tr>
                                <td colspan = "3">You are not teaching any section</td>
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