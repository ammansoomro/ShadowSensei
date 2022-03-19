<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = $_POST['previd'];
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    $credit = $_POST['credit'];
    $queryString = "UPDATE course_details 
                    SET Course_ID='" .$cid. "',
                        Course_Name='" .$cname. "',
                        Credit_hours=" .$credit. "
                    WHERE Course_ID='" .$id. "'"
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