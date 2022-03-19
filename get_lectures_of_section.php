<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $secid = $_POST['secid'];
    $queryString = "SELECT Lecture_num, datee FROM lectures
                    WHERE Section_ID = '$secid' order by Lecture_num";
    $res = mysqli_query($conn, $queryString);
    $response[] = [];
    while ($row = mysqli_fetch_assoc($res)){
        $response[] = [$row['Lecture_num'], $row['datee']];
    }

    echo json_encode($response);

}
?>