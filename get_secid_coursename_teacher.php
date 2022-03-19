<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $tid = $_POST['tid'];
    $queryString = "SELECT Section_ID, Course_Name FROM section_details natural join course_details
                    WHERE Teacher_ID = '$tid'";
    $res = mysqli_query($conn, $queryString);
    $respone[] = [];
    while ($row = mysqli_fetch_assoc($res)){
        $response[] = [$row['Section_ID'], $row['Course_Name']];
    }

    echo json_encode($response);

}
?>