<?php
include_once('check_cookie_admin.php');
?>

<?php
include_once('connect.php');
$query = "SELECT * FROM course_details";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/New_Section.css" />
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">
        <?php include("Includes/NavBar_Sections.php") ?>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

        swal({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success",
            button: "Aww yiss!",
        });
    </script>
    <div class="Details_Form">
        <a href="#">
            <div class="image">
                <img src="Pictures/Ninja_Logo.png">
            </div>
        </a>
        <div class="myform">
            <form method="POST" action="/Insert/Insert_Section_Details.php">
                <h2>New Section</h2>
                <option value="">Select Course</option>
                <select name="cid" id="cid">
                    <?php while ($rows = $result->fetch_assoc()) { ?>

                        <option value="<?php echo $rows["Course_ID"] ?>" name="cid" id="cid">
                            <?php echo $rows["Course_Name"]. "(" .$rows["Course_ID"].")" ?></option>
                    <?php
                    }
                    ?>
                </select>
                <?php
                    $query = "SELECT * FROM teacher_details";
                    $result = $conn->query($query);
                ?>
                <option value="">Select Teacher</option>
                <select name="tid" id="tid">
                    <?php while ($rows = $result->fetch_assoc()) { ?>

                        <option value="<?php echo $rows["Teacher_ID"] ?>" name="tid" id="tid">
                            <?php echo $rows["Name"]. "(" .$rows["Teacher_ID"].")" ?></option>
                    <?php
                    }
                    ?>
                </select>
                <input id="sid" name="sid" type="text" placeholder="Section ID">
                <button type="submit">Add Section</button>
            </form>
        </div>
    </div>
</body>

</html>