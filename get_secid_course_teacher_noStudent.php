<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $stud = $_POST['stud'];
    $queryString = "SELECT Section_ID, Course_Name, Name FROM section_details natural join course_details natural join teacher_details 
                    WHERE Section_ID not in (SELECT Section_ID FROM section_enrollment WHERE Student_ID = '$stud')";
    $res = mysqli_query($conn, $queryString);
    $response[] = [];
    while ($row = mysqli_fetch_assoc($res)){
        $response[] = [$row['Section_ID'], $row['Course_Name'], $row['Name']];
    }
    echo json_encode($response);

}
?>