<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $secid = $_POST['secid'];
    $stud = $_POST['stud'];
    $queryString = "DELETE FROM section_enrollment 
                    WHERE Section_ID = '$secid' AND Student_ID = '$stud'";
    $res = mysqli_query($conn, $queryString);
    if($res == TRUE && $conn->affected_rows > 0)
    {
        echo 1;
    }
    else
    {
        echo $queryString;
        echo 0;
    }

}
?>