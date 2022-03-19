<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $studid = $_POST['studid'];
    $secid = $_POST['secid'];
    $queryString = "SELECT * FROM section_enrollment natural join section_details natural join course_details natural join lectures natural join attendance
                    WHERE Student_ID = '$studid' and Section_ID = '$secid'";
    $res = mysqli_query($conn, $queryString);
    $response[] = [];
    while ($row = mysqli_fetch_assoc($res)){
        $response[] = [$row['Lecture_num'], $row['datee'], $row['val']];
    }
    echo json_encode($response);

}
?>