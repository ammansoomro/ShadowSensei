<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $Username = $_REQUEST['uname'];
    $Password = $_REQUEST['pass'];
    $submit = "SELECT * from admin_details where username = '".$Username."' AND password = '".$Password."'";
    $submit_result = $conn-> query($submit);
    if(mysqli_num_rows($submit_result) > 0)
    {
        $cookie_name = "user";
        setcookie($cookie_name, $Username, time() + (86400 * 30), "/"); // 86400 = 1 day
        header("location:../Admin_Panel.php");
    }
    else
    {
        header("location:../Login_Failed.php");   
    }
}
?>