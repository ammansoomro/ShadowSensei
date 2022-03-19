<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $datee = $_POST['datee'];
    $secid = $_POST['secid'];
    $queryString = "SELECT Lecture_num FROM lectures
                    WHERE Section_ID = '$secid'";
    $res = mysqli_query($conn, $queryString);
    $id = mysqli_num_rows($res) + 1;
    
    $queryString = "INSERT INTO lectures
                    VALUES($id, '$secid', '$datee')";
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