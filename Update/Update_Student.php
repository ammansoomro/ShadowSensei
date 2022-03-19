<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = $_POST['previd'];
    $sid = $_POST['sid'];
    $sname = $_POST['sname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $queryString = "UPDATE student_details 
                    SET Student_ID='" .$sid. "',
                        Name='" .$sname. "',
                        Gender = '".$gender."',
                        Address = '".$address."',
                        Password = '".$password."'
                    WHERE Student_ID='" .$id. "'"
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