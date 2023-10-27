<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="jd_portal";

    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if($conn->connect_error)
        die("Connection Failed" . $conn->connect_error);
    else
        // echo("<h2>Connection Successful</h2>");
?>