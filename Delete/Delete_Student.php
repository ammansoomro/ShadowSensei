<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $sid = $_POST['id'];
    $queryString = "DELETE FROM student_details WHERE Student_ID = '".$sid."'"; 
    $res = mysqli_query($conn, $queryString);
    if($res == TRUE && $conn->affected_rows > 0)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }

}
?>