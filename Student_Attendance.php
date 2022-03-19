<?php
include_once('check_cookie_student.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="Includes/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="CSS/Student_Attendance.css" />
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

            </div>

            <!-- Details List -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Attendance</h2>
                    </div>
                    <label for="section">Choose a course: </label>
                    <select name="section" id="section" onchange="showAttendance(this.value);" style="margin-right:40px; margin-left:10px">
                        <?php
                        $qString = "Select * from section_enrollment natural join section_details natural join course_details where Student_ID = '" . $_COOKIE["student"] . "'";
                        $res = $conn->query($qString);
                        while ($rows = $res->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $rows['Section_ID'] ?>"> <?php echo $rows['Course_Name'] ?> </option>
                            <?php
                        }
                            ?>
                    </select>
                

                <table>
                    <thead>
                        <tr>
                            <td>Lecture Number</td>
                            <td>Date</td>
                            <td>Attendance</td>
                        </tr>
                    </thead>
                    <tbody id='attendance'>
                        
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

        
        function showAttendance(secid) {
            $.post("get_attendance_student.php", {
                secid: secid,
                studid: "<?php echo $_COOKIE['student']; ?>"
            },
            function(data, value) {
                let table = '';
                console.log(data);
                let obj = JSON.parse(data);
                for(let i = 0; i < obj.length; i++) {
                    if(obj[i].length == 0) {
                        continue;
                    }
                    table += `<tr>
                                    <td>` + obj[i][0] + `</td>
                                    <td>` + obj[i][1] + `</td>
                                    <td>` + obj[i][2].toUpperCase() + `</td>
                              </tr>`
                }
                $('#attendance').html(table);
            });
        }
        showAttendance(document.getElementById("section").options[0].value);

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