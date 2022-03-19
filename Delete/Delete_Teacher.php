<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $tid = $_POST['id'];
    $queryString = "DELETE FROM teacher_details WHERE Teacher_ID = '".$tid."'"; 
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