<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = $_POST['previd'];
    $tid = $_POST['tid'];
    $tname = $_POST['tname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $salary = $_POST['salary'];
    $did = $_POST['did'];
    $queryString = "UPDATE teacher_details 
                    SET Teacher_ID='" .$tid. "',
                        Name='" .$tname. "',
                        Gender = '".$gender."',
                        Address = '".$address."',
                        Password = '".$password."',
                        Salary = ".$salary.",
                        Department_ID = '".$did."' 
                    WHERE Teacher_ID='" .$id. "'"
                    ;
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