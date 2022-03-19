<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $secid = $_POST['secid'];
    $queryString = "DELETE FROM section_details WHERE Section_ID = '".$secid."'"; 
    $res = mysqli_query($conn, $queryString);
    if($res == TRUE && $conn->affected_rows > 0)
    {
        echo 1;
    }
    else
    {
        echo $queryString;
        echo 0;
    }

}
?>