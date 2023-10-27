<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5"><!--my-5 sets the margin of the container-->
        <h2>Placement Data</h2>
        <a href="create.php" class="btn btn-primary" role="button">Add Data</a><br><br>
        <table class="table table-bordered">
            <thead>
                <tr class='align-middle'>
                    <th>id</th>
                    <th>Company Name</th>
                    <th>Eligibility</th>
                    <th>Required Profile</th>
                    <th>Offered Positions</th>
                    <th>Job Description</th>
                    <th>Placed</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                    // $servername= "localhost";
                    // $username= "root";
                    // $password= "";
                    // $database= "mydb";

                    // //create connection
                    // $conn = new mysqli($servername, $username, $password, $database);

                    // //check connection
                    // if($conn->connect_error){
                    //     die("Connection failed: ". $conn->connect_error);
                    // }
                    include("../config.php");
                    //read all row from db table
                    $sql = "SELECT * FROM jd_portal___2023";
                    $result = $conn->query($sql);

                    // if($result){
                    //     die("Invalid query: " . $conn->connect_error);
                    // }

                    //read data of each row
                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr class='align-middle'>
                            <td>$row[id]</td>
                            <td>$row[Name]</td>
                            <td>$row[Eligibility]</td>
                            <td>$row[Required_Profile]</td>
                            <td>$row[Offered_Positions]</td>
                            <td>$row[Job_Description]</td>
                            <td class='text-center'>$row[Placed]</td>
                            <td class='text-center'>
                                <a href='edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a><br><br>
                                <a href='delete.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>
            
        </table>
    </div>
</body>
</html>