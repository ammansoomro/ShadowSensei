<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $queryString = "SELECT Student_ID, Name FROM student_details ORDER BY Student_ID";
    $res = mysqli_query($conn, $queryString);
    while ($row = mysqli_fetch_assoc($res)){
        $response[] = [$row['Student_ID'], $row['Name']];
    }
    echo json_encode($response);

}
?>