<?php
include_once('connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ass = $_POST['ass'];
    $quiz = $_POST['quiz'];
    $mid1 = $_POST['mid1'];
    $mid2 = $_POST['mid2'];
    $finall = $_POST['finall'];
    $secid = $_POST['secid'];
    $studid = $_POST['studid'];

    $queryString = "UPDATE section_enrollment 
                    SET as_marks = $ass,
                        quiz_marks = $quiz,
                        mid1_marks = $mid1,
                        mid2_marks = $mid2,
                        final_marks = $finall 
                    WHERE Section_ID = '$secid' and Student_ID = '$studid'";

    $res = mysqli_query($conn, $queryString);
    if ($res == TRUE && $conn->affected_rows > 0) {
        echo 1;
    } else {
        echo 0;
    }
}
