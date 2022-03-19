<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $Username = $_REQUEST['uname'];
    $Password = $_REQUEST['pass'];
    $submit = "SELECT * from student_details where Student_ID = '".$Username."' AND Password = '".$Password."'";
    $submit_result = $conn-> query($submit);
    if(mysqli_num_rows($submit_result) > 0)
    {
        $cookie_name = "student";
        setcookie($cookie_name, $Username, time() + (86400 * 30), "/");
        header("location:http://localhost:8232/Student_Panel.php");
    }
    else
    {
        header("location:http://localhost:8232/Login_Failed.php");   
    }
}
?>