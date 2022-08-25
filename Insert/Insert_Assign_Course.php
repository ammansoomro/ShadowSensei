<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $Teacher_Code = $_REQUEST['Teacher_ID'];
    $Course_Code = $_REQUEST['Course_ID'];
   $submit = "SELECT * from teacher_course_details where Teacher_ID = '".$Teacher_Code."'"; 
   $submit_result = $conn->query($submit);
   if(mysqli_num_rows($submit_result)>0)
   {
       header("location:../SameData.php");
   }
   else
   {
    $Query = "INSERT INTO teacher_course_details VALUES (
        '$Teacher_Code','$Course_Code')";
         $conn->query($Query);
       header("location:../Successful.php");
   }

}
?>