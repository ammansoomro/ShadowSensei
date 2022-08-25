<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $Course_Code = $_REQUEST['ccode'];
    $Course_Name = $_REQUEST['cname'];
    $Credit_Hours = $_REQUEST['chours'];
       $submit = "SELECT * from course_details where Course_ID = '".$Course_Code."'"; 
       $submit_result = $conn->query($submit);
       if(mysqli_num_rows($submit_result)>0)
       {
           header("location:../SameData.php");
       }
       else
       {
        $Query = "INSERT INTO course_details VALUES (
            '$Course_Code','$Course_Name','$Credit_Hours')";
            $conn->query($Query);
           header("location:../Successful.php");
       }

}
?>