<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $queryString = "SELECT Department_ID FROM department_details";
    $res = mysqli_query($conn, $queryString);
    while ($row = mysqli_fetch_assoc($res)){
        $response[] = $row['Department_ID'];
    }
    echo json_encode($response);

}
?>