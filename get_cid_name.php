<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $queryString = "SELECT Course_ID, Course_Name FROM course_details";
    $res = mysqli_query($conn, $queryString);
    while ($row = mysqli_fetch_assoc($res)){
        $response[] = [$row['Course_ID'], $row['Course_Name']];
    }
    echo json_encode($response);

}
?>