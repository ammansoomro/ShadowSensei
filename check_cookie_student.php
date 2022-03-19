<?php
include_once('connect.php');
if(!isset($_COOKIE["student"])) {
    header("location:http://localhost:8232/Student_Login.php");
} else {
    $cookiequery = "SELECT * from student_details where Student_ID = '".$_COOKIE["student"]."'";
    $cookiequeryresult = $conn-> query($cookiequery);
    if(!mysqli_num_rows($cookiequeryresult) > 0){
        header("location:http://localhost:8232/Student_Login.php");
    }
}
?>