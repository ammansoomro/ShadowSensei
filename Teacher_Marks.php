<?php
include_once('check_cookie_faculty.php');
?>

<?php
include_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/Teacher_Marks_Test.css" />
    <script src="Includes/jquery-3.6.0.min.js"></script>
    <?php include("Includes/Alerts.php") ?>
    <title>Teacher Panel</title>
</head>

<body>
    <div class="container">
        <?php include("Includes/NavBar_Teacher_Panel.php") ?>
        <!-- Dashboard Main -->
    </div>
    <div class="Details_Form">
        <a href="#">
            <div class="image">
                <img src="Pictures/Ninja_Logo.png">
            </div>
        </a>
        <div class="myform">
            <form method="POST" action="/Insert/Insert_Student_Details.php">
                <h2>Assign Marks</h2>
                <div class="flexcontainer">
                    <label for="student">Choose a Section</label>
                    <select name="section" id="section" onchange="populateStudents(this.value);"
                        style="margin-right:40px; margin-left:10px"></select>
                    <label for="student">Choose a Student</label>
                    <select name="student" id="student" onchange="populateMarks();"
                        style="margin-right:40px; margin-left:10px"></select>
                </div>
                <option for="ass" value="">Assignments</option>
                <div class="inp">
                    <input type="number" id="ass" name="ass" min="0" max="10">
                    <a>/10</a>
                </div><br>
                <!-- <div class="line-break"></div> -->
                <option for="quiz">Quizzes</option>
                <div class="inp">
                    <input type="number" id="quiz" name="quiz" min="0" max="10"> <a>/10</a>
                </div><br>
                <!-- <div class="line-break"></div> -->
                <option for="mid1">Mid 1</option>
                <div class="inp">
                    <input type="number" id="mid1" name="mid1" min="0" max="15"> <a>/15</a>
                </div><br>
                <!-- <div class="line-break"></div> -->
                <option for="mid2">Mid 2</option>
                <div class="inp">
                    <input type="number" id="mid2" name="mid2" min="0" max="15"> <a>/15</a>
                </div><br>
                <!-- <div class="line-break"></div> -->
                <option for="final">Finals</option>
                <div class="inp">
                    <input type="number" id="final" name="final" min="0" max="50"> <a>/50</a>
                </div><br>
                <!-- <div class="line-break"></div> -->
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
    //Menu Toggle

    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");



    function updateMarks() {
        $.post("Update/Update_Marks.php", {
                ass: $("#ass").val(),
                quiz: $("#quiz").val(),
                mid1: $("#mid1").val(),
                mid2: $("#mid2").val(),
                finall: $("#final").val(),
                secid: $("#section").val(),
                studid: $("#student").val()
            },
            function(data, status) {
                if (data == "1") {
                    Success_Marks_Update();
                } else {
                    console.log(data);
                    Warning_Marks_Update();
                }

            });
    }
    $("form").submit(function(e) {
        e.preventDefault();
        updateMarks();
    });

    function populateMarks() {
        $.post("get_marks.php", {
                secid: $("#section").val(),
                studid: $("#student").val()
            },
            function(data, status) {
                let parsed = JSON.parse(data);
                $("#ass").val(parsed["ass"]);
                $("#quiz").val(parsed["quiz"]);
                $("#mid1").val(parsed["mid1"]);
                $("#mid2").val(parsed["mid2"]);
                $("#final").val(parsed["finall"]);
            });
    }


    function populateStudents(secid) {
        if (secid == "-1") {
            $("#student").html('');
            return;
        }
        $.post("get_student_in_section.php", {
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
                    option += '<option value="' + obj[i][0] + '">' + obj[i][0] + ' -- ' + obj[i][1] + '</option>'

                }
                $("#student").html(option);
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

    toggle.onclick = function() {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };

    // <!-- Adding Hovered Class in Selected list -->
    let list = document.querySelectorAll(".navigation li");
    </script>
</body>

</html>