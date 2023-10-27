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

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $email=$_POST['email'];
        $password=md5($_POST['password']);
    }

    // validate login authenticatoin
    $sql="SELECT * FROM tpc WHERE email='$email' AND password='$password'";

    $result=$conn->query($sql);

    if($result->num_rows==1) {
        // login successful
        header("location: ../tpc/index.php");
        exit();
    }else{
        // login failed
        echo "<script>
                alert('Login Failed')
                window.location = 'index.html';
            </script>";
        exit();
    }
?>