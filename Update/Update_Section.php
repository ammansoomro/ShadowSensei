<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = $_POST['previd'];
    $secid = $_POST['secid'];
    $cid = $_POST['cid'];
    $tid = $_POST['tid'];
    $queryString = "UPDATE section_details 
                    SET Section_ID='$secid',
                        Course_ID='$cid',
                        Teacher_ID='$tid'
                    WHERE Section_ID='$id'"
                    ;
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