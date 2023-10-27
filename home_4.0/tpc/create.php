<?php
    include("../config.php");
    //read all row from db table
    // $sql = "SELECT * FROM jd_portal___2023";
    // $result = $conn->query($sql);

    $Name = "";
    $Eligibility = "";
    $Required_Profile = "";
    $Offered_Positions = "";
    $Job_Description = "";
    $Placed = "";

    $errorMessage = "";
    $successMessage = "";

    //check whether data is transmitted 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Name = $_POST['Name'];
        $Eligibility = $_POST['Eligibility'];
        $Required_Profile = $_POST['Required_Profile'];
        $Offered_Positions = $_POST['Offered_Positions'];
        $Job_Description = $_POST['Job_Description'];
        $Placed = $_POST['Placed'];

     
        //check whether any feild is empty
        do {
            if(empty($Name)){
                $errorMessage = "Company Name is required";
                break;
            }

            //add new data to database
            $sql = "INSERT INTO jd_portal___2023 (Name, Eligibility, Required_Profile, Offered_Positions, Job_Description, Placed)" .
                    "VALUES ('$Name', '$Eligibility', '$Required_Profile','$Offered_Positions', ' $Job_Description' ,'$Placed')";
            $result = $conn->query($sql);

            if(!$result){
                $errorMessage = "Invalid query: " .  $conn->error;
                break;
            }

            //create new data if no empty feild
            //initialize variables 
            $Name = "";
            $Eligibility = "";
            $Required_Profile = "";
            $Offered_Positions = "";
            $Job_Description = "";
            $Placed = "";

            $successMessage = "New data added succesfully.";

            //redirect user to a list of clients
            header("location: index.php");
            exit;

        } while (FALSE);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Entry</title>
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
                    <a href="index.php" class="btn btn-outline-primary" role="buuton">Cancel</a>   
                </div>
            </div>

        </form>
    </div>
    
</body>
</html>