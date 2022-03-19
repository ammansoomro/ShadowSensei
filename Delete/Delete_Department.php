<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $did = $_POST['id'];
    $queryString = "DELETE FROM department_details WHERE Department_ID = '".$did."'"; 
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