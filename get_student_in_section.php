<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $secid = $_POST['secid'];
    $queryString = "SELECT Student_ID, Name FROM section_enrollment natural join student_details
                    WHERE Section_ID = '$secid'";
    $res = mysqli_query($conn, $queryString);
    $response[] = [];
    while ($row = mysqli_fetch_assoc($res)){
        $response[] = [$row['Student_ID'], $row['Name']];
    }

    echo json_encode($response);

}
?>