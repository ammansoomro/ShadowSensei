<?php
include_once('check_cookie_admin.php');
?>

<?php
include_once "connect.php";
$query = "SELECT * FROM student_details";
$result = $conn->query($query);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/Student1_Details.css" />
    <script src="Includes/jquery-3.6.0.min.js"></script>
    <?php include("Includes/Alerts.php") ?>
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">
        <?php include("Includes/NavBar_Student.php") ?>
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
                        <div class="numbers"> <?php
                $count_rows = "SELECT Student_ID from student_details ORDER BY Student_ID";
                $count_rows_output = $conn->query($count_rows);
                $rows = mysqli_num_rows($count_rows_output);
                echo $rows; 
                ?></div>
                        <div class="cardName">Total Students</div>
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
                        <h2>Student Details</h2>

                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Student ID</td>
                                <td>Gender</td>
                                <td>Address</td>
                                <td>Password</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_GET['search']))
                            {
                                $filteredvalues = $_GET['search'];
                                $filter_query = "SELECT * FROM student_details WHERE CONCAT(Name, Student_ID) LIKE '%$filteredvalues%'";
                                $filter_output = $conn->query($filter_query);
                                if(mysqli_num_rows($filter_output) > 0) {

                                    foreach($filter_output as $items)
                                    {
                                        ?>
                            <tr id = <?php echo $items["Student_ID"]; ?>>
                                <td><?php echo $items["Name"]; ?></td>
                                <td><?php echo $items["Student_ID"]; ?></td>
                                <td><?php echo $items["Gender"]; ?></td>
                                <td><?php echo $items["Address"]; ?></td>
                                <td><?php echo $items["Password"]; ?></td>
                                <td>
                                <button onclick="editStudent(this.closest('tr').id)"><ion-icon name="create-outline">Edit</ion-icon></button>
                                    <button  onclick="deleteStudent(this.closest('tr').id)"><ion-icon name="trash-outline">Delete</ion-icon></button>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                                else
                                {
                                    ?>
                            <tr>
                                <td colspan="5">
                                    No Record Found
                                </td>
                            </tr>
                            <?php
                                }
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

    let editing = -1;
    let orig = 0;
    
    function revert(id) {
        row = document.getElementById(id);
        row.replaceWith(orig);
        editing = -1;
    }
    function editStudent(id) {
        row = document.getElementById(id);
        if (editing != -1 && editing != id) {
            revert(editing);
            editStudent(id);
        } else {
            
            orig = row.cloneNode(true);
            row.childNodes[1].innerHTML = '<input type="text" class="sname" name="sname" value ="'+ row.childNodes[1].innerHTML +'">';
            row.childNodes[3].innerHTML = '<input type="text" class="sid" name="sid" value ="'+ row.childNodes[3].innerHTML +'">';
            row.childNodes[5].innerHTML = '<input type="text" class="gender" name="gender" value ="'+ row.childNodes[5].innerHTML +'">';
            row.childNodes[7].innerHTML = '<input type="text" class="address" name="address" value ="'+ row.childNodes[7].innerHTML +'">';
            row.childNodes[9].innerHTML = '<input type="text" class="password" name="password" value ="'+ row.childNodes[9].innerHTML +'">';
            row.childNodes[11].innerHTML =  `<button onclick="updateStudent(this.closest('tr').id)"><ion-icon name="checkmark-done-outline">Submit</ion-icon></button>
                                            <button onclick="revert(this.closest('tr').id)"><ion-icon name="close-outline">Cancel</ion-icon></button>`
        }
        editing = id;
    }

    function updateStudent(id) {
        let previd = id;
        row = document.getElementById(id);
        $.ajax({  
            type: 'POST',  
            url: '/Update/Update_Student.php', 
            data: 
            { 
                previd: previd,
                sid: row.getElementsByClassName('sid')[0].value,
                sname: row.getElementsByClassName('sname')[0].value,
                gender: row.getElementsByClassName('gender')[0].value,
                address: row.getElementsByClassName('address')[0].value,
                password: row.getElementsByClassName('password')[0].value,
            },
            success: function(response) {
                if(response == '1') {
                    location.reload();
                } else {
                    Warning_Student_Update();
                }
            }
        });
    }

    function deleteStudent(sid) {
        $.ajax({  
            type: 'POST',  
            url: '/Delete/Delete_Student.php', 
            data: { id: sid },
            success: function(response) {
                if(response == '1') {
                    Success_Delete();
                } else {
                    Error_Student_Delete();
                }
            }
        });
    }

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