<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $Section_ID = $_REQUEST['sid'];
    $Course_ID = $_REQUEST['cid'];
    $Teacher_ID = $_REQUEST['tid'];

    $submit = "SELECT * from section_details where Section_ID = '".$Section_ID."'"; 
    $submit_result = $conn->query($submit);
    if(mysqli_num_rows($submit_result)>0)
    {
        header("location:../SameData.php");
    }
    else
    {
        $Query = "INSERT INTO section_details VALUES ('$Section_ID','$Teacher_ID','$Course_ID')";
        $conn->query($Query);
        header("location:../Successful.php");
    }

}
?>