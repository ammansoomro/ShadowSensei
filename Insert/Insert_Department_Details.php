<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $Department_ID = $_REQUEST['did'];
    $Department_Name = $_REQUEST['dname'];
    $submit = "SELECT * from department_details where Department_ID = '".$Department_ID."'"; 
    $submit_result = $conn->query($submit);
    if(mysqli_num_rows($submit_result)>0)
    {
        header("location:http://localhost:8232/SameData.php");
    }
    else
    {
        $Query = "INSERT INTO department_details VALUES (
            '$Department_ID','$Department_Name')";
        $conn->query($Query);
        header("location:http://localhost:8232/Successful.php");
    }

}
?>