<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $Name = $_REQUEST['fname'];
    $Gender = $_REQUEST['gender'];
    $Address = $_REQUEST['address'];
    $S_ID = $_REQUEST['sid'];
    $Password = $_REQUEST['password'];
    $submit = "SELECT * from student_details where Student_ID = '".$S_ID."'"; 
    $submit_result = $conn->query($submit);
    if(mysqli_num_rows($submit_result)>0)
    {
        header("location:../SameData.php");
    }
    else
    {
        $Query = "INSERT INTO student_details VALUES (
            '$Name','$Gender','$Address','$S_ID','$Password')";
        $conn->query($Query);
        header("location:../Successful.php");
    }
}
?>