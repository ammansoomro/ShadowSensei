<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = $_POST['previd'];
    $did = $_POST['did'];
    $dname = $_POST['dname'];
    $queryString = "UPDATE department_details 
                    SET Department_ID='" .$did. "',
                        Department_Name='" .$dname. "'
                    WHERE Department_ID='" .$id. "'"
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