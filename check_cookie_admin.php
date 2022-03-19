<?php
include_once('check_cookie_admin.php');
?>

<?php
include_once('connect.php');
if(!isset($_COOKIE["user"])) {
    header("location:http://localhost:8232/Admin_Login.php");
} else {
    $cookiequery = "SELECT * from admin_details where username = '".$_COOKIE["user"]."'";
    $cookiequeryresult = $conn-> query($cookiequery);
    if(!mysqli_num_rows($cookiequeryresult) > 0){
        header("location:http://localhost:8232/Admin_Login.php");
    }
}
?>