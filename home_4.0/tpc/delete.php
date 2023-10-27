<?php
    include("../config.php");

    if(isset($_GET['id']))
        $id=$_GET['id'];

    $sql="DELETE FROM jd_portal___2023 WHERE id='$id'";

    $result = $conn->query($sql);

    if($result==TRUE){
        echo "<script>alert('Record deleted successfully')
        window.location = 'index.php';
        </script>";
        exit();
        // header("location: index.php");
    }
    else
        echo "Error".$sql."<br>".conn->error;
?>