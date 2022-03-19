<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $Student_Code = $_REQUEST['Student_ID'];
    $Course_Code1 = $_REQUEST['Course_ID1'];
    $Course_Code2 = $_REQUEST['Course_ID2'];
    $Course_Code3 = $_REQUEST['Course_ID3'];
    $Course_Code4 = $_REQUEST['Course_ID4'];
    $Course_Code5 = $_REQUEST['Course_ID5'];
    $Course_Code6 = $_REQUEST['Course_ID6'];
    $Course_Code7 = $_REQUEST['Course_ID7'];
    $submit = "SELECT * from student_courses where Student_ID = '".$Student_Code."'"; 
    $submit_result = $conn->query($submit);
    if(mysqli_num_rows($submit_result)>0)
    {
        header("location:http://localhost:8232/SameData.php");
    }
    else
    {
        $Query = "INSERT INTO student_courses VALUES ('$Student_Code','$Course_Code1','$Course_Code2','$Course_Code3','$Course_Code4','$Course_Code5','$Course_Code6','$Course_Code7')";    
        $conn->query($Query);
        header("location:http://localhost:8232/Successful.php");
    }


}
?>