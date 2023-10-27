<?php
    include("../config.php");

    $id="";
    $Name = "";
    $Eligibility = "";
    $Required_Profile = "";
    $Offered_Positions = "";
    $Job_Description = "";
    $Placed = "";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){ //GET : show the data of the client
        //if id of the client does not exit then redirect the user and exit the execution
        if( !isset($_GET["id"])){
            header("location: index.php");
            exit;
        }

        $id = $_GET['id'];//read data from the database

        //read the row of the selected client from the database table
        $sql ="SELECT * FROM jd_portal___2023 WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        //if there is no data in that row of the database the redirect 
        if(!$row){
            header("location: index.php");
            exit;
        }

        $Name = $row['Name'];
        $Eligibility = $row['Eligibility'];
        $Required_Profile = $row['Required_Profile'];
        $Offered_Positions = $row['Offered_Positions'];
        $Job_Description = $row['Job_Description'];
        $Placed = $row['Placed'];



    }
    else{  //POST : update the data of the client
        $id=$_GET['id'];
        $Name = $_POST['Name'];
        $Eligibility = $_POST['Eligibility'];
        $Required_Profile = $_POST['Required_Profile'];
        $Offered_Positions = $_POST['Offered_Positions'];
        $Job_Description = $_POST['Job_Description'];
        $Placed = $_POST['Placed'];

        do {
            if(empty($Name)){
                $errorMessage = "Company Name is required";
                break;
            }

            // following sql updates the data 
            $sql = "UPDATE jd_portal___2023 SET Name = '$Name', Eligibility = '$Eligibility', Required_Profile ='$Required_Profile', Offered_Positions='$Offered_Positions', Job_Description='$Job_Description', Placed='$Placed' WHERE id='$id'";
            // echo $Name;
            // $sql = "UPDATE jd_portal___2023 SET Name = '$Name' WHERE id='$id'";

            $result=$conn->query($sql);

            if(!$result) {
                $errorMessage="Invalid query: ".$conn->error;
                break;
            }

            $successMessage="Client updated successfully";

            header("location: index.php");
            exit;
        } while(false);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entry</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Company</h2>

        <?php //if errorMessage is not empty, then display the error message
            if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong> $errorMessage</strong>
                <button type= 'button' class='btn-close' data-bs-dismiss='alert' aria label-'Close'></button>            
            </div> ";
            }
        ?>


        <form method="post">
            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">id</label>
                <div class="col-sm-6">
                    <input type="text" readonly class="form-control" name="Name" value="<?php echo $id; ?>">
                </div>
            </div>
            <!-- <input value="<?php echo $id; ?>"> -->
            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Name*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Name" value="<?php echo $Name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Eligibility</label>
                <div class="col-sm-6">
                    <textarea rows=4 class="form-control" name="Eligibility"><?php echo $Eligibility; ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Required Profile</label>
                <div class="col-sm-6">
                    <textarea rows=2 class="form-control" name="Required_Profile"><?php echo $Required_Profile; ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Offerd Positions</label>
                <div class="col-sm-6">
                    <textarea rows=4 class="form-control" name="Offered_Positions"><?php echo $Offered_Positions; ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Job Description</label>
                <div class="col-sm-6">
                    <textarea rows=4 class="form-control" name="Job_Description"><?php echo $Job_Description; ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Placed</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Placed" value="<?php echo $Placed; ?>">
                </div>
            </div>

            
            <?php //if successMessage is not empty, then display the error message
            if(!empty($successMessage)){
                echo "
                <div class='row mb-5'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong> $successMessage</strong>
                            <button type= 'button' class='btn close' data-bs-dismiss='alert' aria label-'Close'></button>            
                        </div>
                    </div>
                </div>";
            }
        ?>

            <!-- <div class="row mb-5">
                <div class="offset-sm-3 col-sm-6">
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong> $errorMessage</strong>
                        <button type= 'button' class='btn close' data-bs-dismiss='alert' aria label-'Close'></button>            
                    </div>
                </div>
            </div> -->
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="index.php" class="btn btn-outline-primary" role="button">Cancel</a>   
                </div>
            </div>

        </form>
    </div>
    
</body>
</html>