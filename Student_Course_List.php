<?php
include_once('check_cookie_admin.php');
?>

<?php
include_once "connect.php";
$query = "SELECT * FROM student_courses";
$result = $conn->query($query);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/Student_Course_List.css" />
    <script src="Includes/Sortable.min.js"></script>
    <script src="Includes/jquery-3.6.0.min.js"></script>
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
                <!-- User Image Box -->
                <div class="user">
                    <span class="icon"><img src="Pictures/UserIcon.jpg" width="80px" position="relative" /></span>
                </div>
            </div>

            <!-- Details List -->
            <div class="details">
                <div class="recentOrders row">
                    <div class="cardHeader">
                        <h2>Student Enrollment</h2>
                    </div>
                    <label for="student">Choose a student:</label>
                    <select name="student" id="student" onchange="populateSections(this.value);"></select>
                    <div class="flex-container">
                        <div class="header">
                            <h2>Assigned</h2>
                        </div>
                        <div class="header">
                            <h2>All Sections(Courses)</h2>
                        </div>
                    </div>
                    <div class="flex-container">
                        <div id="assigned" class="list-group col">

                        </div>
                        <div id="allSections" class="list-group col">

                        </div>
                    </div>

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

        new Sortable(document.getElementById("assigned"), {
            group: 'shared', // set both lists to same group
            animation: 150,
            dataIdAttr: 'data-id',
            sort: false,
            onAdd: function (evt) {
                var El = evt.item;
                let secid = El.id;
                $.post("assign_student_to_section.php", {
                    secid: secid,
                    stud: document.getElementById('student').value
                },
                function(data, status) {
                    console.log(data);
                });
            },
            onRemove: function(evt) {
                var El = evt.item;
                let secid = El.id;
                $.post("Delete/delete_student_assignment.php", {
                    secid: secid,
                    stud: document.getElementById('student').value
                },
                function(data, status) {
                    console.log(data);
                });
            }
        });

        new Sortable(document.getElementById("allSections"), {
            group: 'shared',
            animation: 150,
            dataIdAttr: 'data-id',
            sort: false,
        });

        function populateSections(studid) {
            if(studid == "-1") {
                $("#allSections").html('');
                $("#assigned").html('');
                return;
            }
            $.post("get_secid_course_teacher_noStudent.php", {
                    stud: studid
                },
                function(data, status) {
                    var obj = JSON.parse(data);
                    var sections = "";
                    for (var i = 0; i < obj.length; i++) {
                        if (obj[i].length == 0) {
                            continue;
                        }
                        sections += '<div class="list-group-item" id="' + obj[i][0] + '">' + obj[i][1] + ' -- ' + obj[i][2] + '(' + obj[i][0] + ')</div>'

                    }
                    $("#allSections").html(sections);
                });
            $.post("get_secid_course_teacher_assigned.php", {
                stud: studid
            },
            function(data, status) {
                    console.log(data);
                    var obj = JSON.parse(data);
                    var sections = "";
                    for (var i = 0; i < obj.length; i++) {
                        if (obj[i].length == 0) {
                            continue;
                        }
                        sections += '<div class="list-group-item" id="' + obj[i][0] + '">' + obj[i][1] + ' -- ' + obj[i][2] + '(' + obj[i][0] + ')</div>'

                    }
                    $("#assigned").html(sections);
                });
        }
        
        function populateStudents() {
            $.get("get_studid_name.php", function(data, status){
                var obj = JSON.parse(data);
                var Option = '<option value="-1">--</option>';
                for (var i = 0; i < obj.length; i++) {
                    Option += '<option value="' + obj[i][0] + '">' + obj[i][0] + ' -- ' + obj[i][1] + '</option>'
                    
                }
                $("#student").html(Option);
            });
        }

        populateStudents();

        toggle.onclick = function() {
            navigation.classList.toggle("active");
            main.classList.toggle("active");
        };

        // <!-- Adding Hovered Class in Selected list -->
        let list = document.querySelectorAll(".navigation li");
    </script>
</body>

</html>