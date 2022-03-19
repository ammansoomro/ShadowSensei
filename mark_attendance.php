<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $stud = $_POST['studid'];
    $lid = $_POST['lid'];
    $secid = $_POST['secid'];
    $val = $_POST['val'];
    $queryString = "UPDATE attendance
                    SET val = '$val'
                    WHERE Lecture_num = $lid and Student_ID = '$stud' and Section_ID = '$secid'";
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