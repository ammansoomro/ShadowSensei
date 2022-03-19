<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $secid = $_POST['secid'];
    $stud = $_POST['stud'];
    $queryString = "INSERT INTO section_enrollment
                    VALUES('$secid', '$stud', 0, 0, 0, 0, 0)";
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