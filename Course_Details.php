<?php
include_once('check_cookie_admin.php');
?>

<?php
include_once "connect.php";
$query = "SELECT * FROM course_details";
$result = $conn->query($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/Course1_Details.css" />
    <script src="Includes/jquery-3.6.0.min.js"></script>
    <?php include("Includes/Alerts.php") ?>
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">
        <?php include("Includes/NavBar_Courses.php") ?>

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
                        <div class="numbers"><?php include_once "connect.php";
                $count_rows = "SELECT Course_ID from course_details ORDER BY Course_ID";
                $count_rows_output = $conn->query($count_rows);
                $rows = mysqli_num_rows($count_rows_output);
                echo $rows; 
                ?></div>
                        <div class="cardName">Total Courses</div>
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
                        <h2>Course Details</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Course Code</td>
                                <td>Course Name</td>
                                <td>Credit Hours</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_GET['search']))
                            {
                                $filteredvalues = $_GET['search'];
                                $filter_query = "SELECT * FROM course_details WHERE CONCAT(Course_ID,Course_Name,Credit_Hours) LIKE '%$filteredvalues%'";
                                $filter_output = $conn->query($filter_query);
                                if(mysqli_num_rows($filter_output) > 0) {

                                    foreach($filter_output as $items)
                                    {
                                        ?>
                            <tr id=<?php echo $items["Course_ID"]; ?>>
                                <td><?php echo $items["Course_ID"]; ?></td>
                                <td><?php echo $items["Course_Name"]; ?></td>
                                <td><?php echo $items["Credit_Hours"]; ?></td>
                                <td>

                                    <button onclick="editCourse(this.closest('tr').id)">
                                        <ion-icon name="create-outline">Edit</ion-icon>
                                    </button>
                                    <button onclick="deleteCourse(this.closest('tr').id)">
                                        <ion-icon name="trash-outline">Delete</ion-icon>
                                    </button>
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

    function editCourse(id) {
        row = document.getElementById(id);
        if (editing != -1 && editing != id) {
            revert(editing);
            editCourse(id);
        } else {

            orig = row.cloneNode(true);
            row.childNodes[1].innerHTML = '<input type="text" class="cid" name="cid" value ="' + row.childNodes[1]
                .innerHTML + '">';
            row.childNodes[3].innerHTML = '<input type="text" class="cname" name="cname" value ="' + row.childNodes[3]
                .innerHTML + '">';
            row.childNodes[5].innerHTML = '<input class="credit" name="credit" type="number" value =' + row.childNodes[
                5].innerHTML + '>';
            row.childNodes[7].innerHTML =
                `<button onclick="updateCourse(this.closest('tr').id)"><ion-icon name="checkmark-done-outline">Submit</ion-icon></button>
                                            <button onclick="revert(this.closest('tr').id)"><ion-icon name="close-outline">Cancel</ion-icon></button>`
        }
        editing = id;
    }

    function updateCourse(id) {
        let previd = id;
        row = document.getElementById(id);
        $.ajax({
            type: 'POST',
            url: '/Update/Update_Course.php',
            data: {
                previd: previd,
                cid: row.getElementsByClassName('cid')[0].value,
                cname: row.getElementsByClassName('cname')[0].value,
                credit: row.getElementsByClassName('credit')[0].valueAsNumber
            },
            success: function(response) {
                if (response == '1') {
                    location.reload();
                } else {
                    Warning_Course_Update();
                }
            }
        });
    }

    toggle.onclick = function() {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };

    function deleteCourse(cid) {
        $.ajax({
            type: 'POST',
            url: '/Delete/Delete_Course.php',
            data: {
                id: cid
            },
            success: function(response) {
                if (response == '1') {
                    Success_Delete();
                } else {
                    Error_Course_Delete();
                }
            }
        });
    }

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