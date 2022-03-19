<?php
include_once('connect.php');
if(!isset($_COOKIE["faculty"])) {
    header("location:http://localhost:8232/Teacher_Login.php");
} else {
    $cookiequery = "SELECT * from teacher_details where Teacher_ID = '".$_COOKIE["faculty"]."'";
    $cookiequeryresult = $conn-> query($cookiequery);
    if(!mysqli_num_rows($cookiequeryresult) > 0){
        header("location:http://localhost:8232/Teacher_Login.php");
    }
}
?>