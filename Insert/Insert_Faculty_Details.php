<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $Name = $_REQUEST['fname'];
    $Gender = $_REQUEST['gender'];
    $Address = $_REQUEST['address'];
    $Salary = $_REQUEST['salary'];
    $T_ID = $_REQUEST['tid'];
    $D_ID = $_REQUEST['did'];
    $Password = $_REQUEST['password'];
    $submit = "SELECT * from teacher_details where Teacher_ID = '".$T_ID."'"; 
    $submit_result = $conn->query($submit);
    if(mysqli_num_rows($submit_result)>0)
    {
        header("location:../SameData.php");
    }
    else
    {
        $Query = "INSERT INTO teacher_details VALUES (
            '$Name','$Gender','$Address','$Salary','$T_ID', '$D_ID','$Password')";
        $conn->query($Query);
        header("location:../Successful.php");
    }
}
?>