<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $stud = $_POST['studid'];
    $lid = $_POST['lid'];
    $secid = $_POST['secid'];
    $queryString = "SELECT val FROM attendance
                    WHERE Lecture_num = $lid and Student_ID = '$stud' and Section_ID = '$secid'";
    $res = mysqli_query($conn, $queryString);
    if (mysqli_num_rows($res) != 1) {
        $queryString = "INSERT INTO attendance
                        VALUES($lid, '$stud', '$secid', 'p')";
        mysqli_query($conn, $queryString);
        $data = array(
            'sid' => $stud,
            'val' => 'p'
        );
        echo json_encode($data);
    } else {
        $data = array(
            'sid' => $stud,
            'val' =>  mysqli_fetch_assoc($res)['val']
        );
        echo json_encode($data);
    }

}
?>