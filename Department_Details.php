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
    <link rel="stylesheet" href="CSS/Department1_Details.css" />
    <script src="Includes/jquery-3.6.0.min.js"></script>
    <?php include("Includes/Alerts.php") ?>
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">

        <?php include("Includes/NavBar_Departments.php") ?>

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
                        <div class="numbers"><?php include_once "connect.php";
                $count_rows = "SELECT Department_ID from department_details ORDER BY Department_ID";
                $count_rows_output = $conn->query($count_rows);
                $rows = mysqli_num_rows($count_rows_output);
                echo $rows; 
                ?></div>
                        <div class="cardName">Total Departments</div>
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
                        <h2>Department Details</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Department Code</td>
                                <td>Department Name</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($rows = $result->fetch_assoc()) { ?>
                            <tr id=<?php echo $rows["Department_ID"]; ?>>
                                <td><?php echo $rows["Department_ID"]; ?></td>
                                <td><?php echo $rows["Department_Name"]; ?></td>
                                <td>
                                    <button onclick="editDepartment(this.closest('tr').id)">
                                        <ion-icon name="create-outline">Edit</ion-icon>
                                    </button>
                                    <button onclick="deleteDepartment(this.closest('tr').id)">
                                        <ion-icon name="trash-outline">Delete</ion-icon>
                                    </button>
                                </td>
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
    let editing = -1;
    let orig = 0;

    function revert(id) {
        row = document.getElementById(id);
        row.replaceWith(orig);
        editing = -1;
    }

    function editDepartment(id) {
        row = document.getElementById(id);
        if (editing != -1 && editing != id) {
            revert(editing);
            editDepartment(id);
        } else {
            orig = row.cloneNode(true);
            row.childNodes[1].innerHTML = '<input type="text" class="did" name="did" value ="' + row.childNodes[1]
                .innerHTML + '">';
            row.childNodes[3].innerHTML = '<input type="text" class="dname" name="dname" value ="' + row.childNodes[3]
                .innerHTML + '">';
            row.childNodes[5].innerHTML =  `<button onclick="updateDepartment(this.closest('tr').id)"><ion-icon name="checkmark-done-outline">Submit</ion-icon></button>
                                            <button onclick="revert(this.closest('tr').id)"><ion-icon name="close-outline">Cancel</ion-icon></button>`
        }
        editing = id;
    }

    function updateDepartment(id) {
        let previd = id;
        row = document.getElementById(id);
        $.ajax({
            type: 'POST',
            url: '/Update/Update_Department.php',
            data: {
                previd: previd,
                did: row.getElementsByClassName('did')[0].value,
                dname: row.getElementsByClassName('dname')[0].value
            },
            success: function(response) {
                if (response == '1') {
                    location.reload();
                } else {
                    Warning_Department_Update();
                }
            }
        });
    }

    function deleteDepartment(did) {
        $.ajax({
            type: 'POST',
            url: '/Delete/Delete_Department.php',
            data: {
                id: did
            },
            success: function(response) {
                if (response == '1') {
                    Success_Delete();
                } else {
                    Error_Department_Delete();
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