<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $First_Name = $_REQUEST['fname'];
    $Last_Name = $_REQUEST['lname'];
    $Email = $_REQUEST['email'];
    $Username = $_REQUEST['username'];
    $Password = $_REQUEST['password'];
    $submit = "SELECT * from admin_details where Username = '".$Username."'"; 
    $submit_result = $conn->query($submit);
    if(mysqli_num_rows($submit_result)>0)
    {
        header("location:../SameData.php");
    }
    else
    {
        $Query = "INSERT INTO admin_details VALUES (
            '$First_Name','$Last_Name','$Email','$Username','$Password')";
        $conn->query($Query);
        header("location:../Successful.php");
    }

}
?>