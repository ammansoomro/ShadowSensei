<?php
include_once('check_cookie_faculty.php');
?>

<?php
include_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/Teacher_Attendance2.css" />
    <?php include("Includes/Alerts.php") ?>

    <script src="Includes/jquery-3.6.0.min.js"></script>
    <title>Teacher Panel</title>
</head>

<body>
    <div class="container">
        <?php include("Includes/NavBar_Teacher_Panel.php") ?>
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
                        <h2>Attendance</h2>
                    </div>
                    <div class="flex-container">
                        <label for="student">Choose a section: </label>
                        <select class="SectionSelect" name="section" id="section" onchange="populateLectures(this.value);"
                            style="margin-right:40px; margin-left:10px"></select>
                        <label for="student">Choose a lecture: </label>
                        <select class="LectureSelect" name="lecture" id="lecture" onchange="populateStudentsAttendance();"
                            style="margin-right:40px; margin-left:10px"></select>
                    </div>
                    <form>
                        <label for="ass">Add a new lecture:</label>
                        <div class="inp">
                            <input class = "LectureDate" type="date" id="datee" name="datee">
                            <input class ="button" type="submit" value="Add">
                        </div>
                    </form>
                    <table id="attendance">


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


    function addLecture() {
        if ($("#section").val() == -1) {
            Warning_Faculty_Lecture();
            return;
        }
        $.post("add_lecture.php", {
                secid: $("#section").val(),
                datee: $("#datee").val()
            },
            function(data, status) {
                if (data == '1') {
                    Success_Faculty_Lecture();
                    populateLectures($("#section").val());
                } else {
                    console.log(data);
                    Error_Faculty_Lecture();
                }
            });
    }


    function populateStudentsAttendance() {
        if ($("#section").val() == -1 || $("#lecture").val() == -1) {
            $("#attendance").html('');
            return;
        }


        $.post("get_student_in_section.php", {
                secid: $("#section").val()
            },
            function(data, status) {
                console.log(data);
                var obj = JSON.parse(data);
                let table = `<tr>
                            <th>Roll No.</th>
                            <th>Name</th>
                            <th>Attendance</th>
                        </tr>`;
                for (var i = 0; i < obj.length; i++) {
                    if (obj[i].length == 0) {
                        continue;
                    }
                    table += `<tr>
                                    <td>` + obj[i][0] + `</td>
                                    <td>` + obj[i][1] + `</td>
                                    <td>
                                        <select class="attendanceselect" id="` + obj[i][0] + `" onchange="markAttendance(this);">
                                            <option value="p">Present</option>
                                            <option value="a">Absent</option>
                                        </select>
                                    </td>`

                }
                $("#attendance").html(table);
                for (var i = 0; i < obj.length; i++) {
                    if (obj[i].length == 0) {
                        continue;
                    }
                    $.post("get_attendance.php", {
                            secid: $("#section").val(),
                            lid: $("#lecture").val(),
                            studid: obj[i][0]
                        },
                        function(data, status) {
                            let dec = JSON.parse(data);
                            $('#' + dec['sid']).val(dec['val']);
                        });
                }
            });
    }

    function markAttendance(el) {
        $.post("mark_attendance.php", {
                secid: $("#section").val(),
                lid: $("#lecture").val(),
                studid: el.id,
                val: el.value
            },
            function(data, status) {
                console.log(data);
            });
    }


    function populateLectures(secid) {
        if (secid == "-1") {
            $("#lecture").html('');
            return;
        }
        $.post("get_lectures_of_section.php", {
                secid: secid
            },
            function(data, status) {
                console.log(data);
                var obj = JSON.parse(data);
                var option = '<option value="-1">--</option>';
                for (var i = 0; i < obj.length; i++) {
                    if (obj[i].length == 0) {
                        continue;
                    }
                    option += '<option value="' + obj[i][0] + '">' + obj[i][0] + '    --    ' + obj[i][1] +
                        '</option>'

                }
                $("#lecture").html(option);
            });
    }

    function populateSections() {
        $.post("get_secid_coursename_teacher.php", {
                tid: '<?php echo $_COOKIE["faculty"] ?>'
            },
            function(data, status) {
                var obj = JSON.parse(data);
                var Option = '<option value="-1">--</option>';
                for (var i = 0; i < obj.length; i++) {
                    if (obj[i].length == 0) {
                        continue;
                    }
                    Option += '<option value="' + obj[i][0] + '">' + obj[i][0] + ' -- ' + obj[i][1] + '</option>'

                }
                $("#section").html(Option);
            });
    }

    populateSections();

    $("form").submit(function(e) {
        e.preventDefault();
        addLecture();
    });

    toggle.onclick = function() {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };

    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0, 10);
    });

    $('#datee').val(new Date().toDateInputValue());
    // <!-- Adding Hovered Class in Selected list -->
    let list = document.querySelectorAll(".navigation li");
    </script>
</body>

</html>