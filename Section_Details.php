
<?php
include_once('check_cookie_admin.php');
?>
<?php
include_once "connect.php";
$query = "SELECT * FROM section_details natural join teacher_details natural join course_details";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/Section1_Details.css" />
    <script src="Includes/jquery-3.6.0.min.js"></script>
    <?php include("Includes/Alerts.php") ?>
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">

        <?php include("Includes/NavBar_Sections.php") ?>

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
                $count_rows = "SELECT Section_ID from section_details ORDER BY Section_ID";
                $count_rows_output = $conn->query($count_rows);
                $rows = mysqli_num_rows($count_rows_output);
                echo $rows; 
                ?></div>
                        <div class="cardName">Total Sections</div>
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
                        <h2>Section Details</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Section Code</td>
                                <td>Teacher Name(ID)</td>
                                <td>Course_Name(ID)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($rows = $result->fetch_assoc()) { ?>
                            <tr id = <?php echo $rows["Section_ID"]; ?>>
                                <td><?php echo $rows["Section_ID"]; ?></td>
                                <td><?php echo $rows["Name"]. "(" .$rows["Teacher_ID"].")"; ?></td>
                                <td><?php echo $rows["Course_Name"]. "(" .$rows["Course_ID"].")"; ?></td>
                                <td>
                                    <button onclick="editSection(this.closest('tr').id)"><ion-icon name="create-outline">Edit</ion-icon></button>
                                    <button  onclick="deleteSection(this.closest('tr').id)"><ion-icon name="trash-outline">Delete</ion-icon></button>
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
    function editSection(id) {
        row = document.getElementById(id);
        if (editing != -1 && editing != id) {
            revert(editing);
            editSection(id);
        } else {
            let tidname = row.childNodes[3].innerHTML;
            let cidname = row.childNodes[5].innerHTML;
            console.log(tidname.split(/[()]+/));
            orig = row.cloneNode(true);
            $.get("get_tid_name.php", function(data, status){
                var obj = JSON.parse(data);
                var Option = "";
                for (var i = 0; i < obj.length; i++) {
                    if(obj[i][0] == tidname.split(/[()]+/)[1]) {
                        Option += '<option value="' + obj[i][0] + '" selected>' + obj[i][1] + '(' + obj[i][0]  +  ')</option>'
                    } else {
                        Option += '<option value="' + obj[i][0] + '">' + obj[i][1] + '(' + obj[i][0]  +  ')</option>'
                    }
                    
                }
                $("#tid").html(Option);
            });

            $.get("get_cid_name.php", function(data, status){
                console.log(cid);
                var obj = JSON.parse(data);
                var Option = "";
                for (var i = 0; i < obj.length; i++) {
                    if(obj[i][0] == cidname.split(/[()]+/)[1]) {
                        Option += '<option value="' + obj[i][0] + '" selected>' + obj[i][1] + '(' + obj[i][0]  +  ')</option>'
                    } else {
                        Option += '<option value="' + obj[i][0] + '">' + obj[i][1] + '(' + obj[i][0]  +  ')</option>'
                    }
                    
                }
                $("#cid").html(Option);
            });

            row.childNodes[1].innerHTML = '<input type="text" class="secid" name="secid" value ="'+ row.childNodes[1].innerHTML +'">';
            row.childNodes[3].innerHTML = '<select name="tid" class="tid" id="tid"></select>';
            row.childNodes[5].innerHTML = '<select name="cid" class="cid" id="cid"></select>';
            row.childNodes[7].innerHTML =  `<button onclick="updateSection(this.closest('tr').id)"><ion-icon name="checkmark-done-outline">Submit</ion-icon></button>
                                            <button onclick="revert(this.closest('tr').id)"><ion-icon name="close-outline">Cancel</ion-icon></button>`
        editing = id;
        }
    }

    function updateSection(id) {
        let previd = id;
        row = document.getElementById(id);
        $.ajax({  
            type: 'POST',  
            url: '/Update/Update_Section.php', 
            data: 
            { 
                previd: previd,
                secid: row.getElementsByClassName('secid')[0].value,
                cid: row.getElementsByClassName('cid')[0].value,
                tid: row.getElementsByClassName('tid')[0].value,
            },
            success: function(response) {
                if(response == '1') {
                    location.reload();
                } else {
                    console.log(response);
                    Warning_Section_Update();
                }
            }
        });
    }

    function deleteSection(secid) {
        console.log(secid)
        $.ajax({  
            type: 'POST',  
            url: '/Delete/Delete_Section.php', 
            data: { secid: secid },
            success: function(response) {
                if(response == '1') {
                    Success_Delete();
                } else {
                    console.log(response);
                    Error_Section_Delete();
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