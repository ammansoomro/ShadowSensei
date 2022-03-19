<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $Username = $_REQUEST['uname'];
    $Password = $_REQUEST['pass'];
    $submit = "SELECT * from teacher_details where Teacher_ID = '".$Username."' AND Password = '".$Password."'";
    $submit_result = $conn-> query($submit);
    if(mysqli_num_rows($submit_result) > 0)
    {
        $cookie_name = "faculty";
        setcookie($cookie_name, $Username, time() + (86400 * 30), "/");
        header("location:http://localhost:8232/Teacher_Panel.php");
    }
    else
    {
        header("location:http://localhost:8232/Login_Failed.php");   
    }
}
?>