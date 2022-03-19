<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $queryString = "SELECT Teacher_ID, Name FROM teacher_details";
    $res = mysqli_query($conn, $queryString);
    while ($row = mysqli_fetch_assoc($res)){
        $response[] = [$row['Teacher_ID'], $row['Name']];
    }
    echo json_encode($response);

}
?>