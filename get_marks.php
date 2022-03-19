<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $secid = $_POST['secid'];
    $studid = $_POST['studid'];
    $queryString = "SELECT * FROM section_enrollment 
                    WHERE Section_ID = '$secid' and Student_ID = '$studid'";
    $res = mysqli_query($conn, $queryString);
    $row = mysqli_fetch_assoc($res);
    $data = array(
        'ass' => $row['as_marks'],
        'quiz' => $row['quiz_marks'],
        'mid1' => $row['mid1_marks'],
        'mid2' => $row['mid2_marks'],
        'finall' => $row['final_marks']
    );

    echo json_encode($data);

}
?>