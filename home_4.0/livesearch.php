<?php
    // echo "HELLO WORLD!";

    include("config.php");
    if(isset($_POST['input'])){
        $input=$_POST['input'];
        $query="SELECT * FROM jd_portal___2023 WHERE name LIKE '{$input}%'";
        $result=mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <title>Search</title> -->
        <meta charset="utf-8">
        <link rel="icon" href="JD (crop).jpg">
        <link rel="stylesheet" href="home 3.0.css">
    </head>
    <body>
    <?php
    if(mysqli_num_rows($result)>0){
        // echo "hello world!";
        while($row=mysqli_fetch_assoc($result)){
            // echo $row['Name'];
        ?>
            <div class="main">
                <div class="company_block">
                    <h1 class=card_heading><?=$row['Name']?></h1>
                    <img class=logo src="Reliance_Jio.png"/>
                    <!-- <h2></h2> -->
                    <button class="year_toggle"><h3 class="batch">2023</h3></button>
                    <div class="batch_content">
                        <div class="left_content">
                        <?php if($row['Eligibility']!=NULL){?>
                            <h3 class="content_heading">Eligibility Criteria</h3><hr>
                                <?=nl2br($row['Eligibility'])?>
                        <?php }?>
                        <h3 class="content_heading">Required Profile</h3><hr>
                            <?=nl2br($row['Required_Profile'])?>
                        <?php if($row['Job_Description']!=NULL){?>
                            <?=nl2br($row['Job_Description'])?>
                        <?php }?>
                        </div>
                        <div class="right_content">
                            <h3 class="content_heading">Offered Posts</h3><hr>
                            <?=nl2br($row['Offered_Positions'])?>
                            <h3 class="content_heading">Students Placed</h3><hr>
                            <?=$row['Placed']?>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        }
    }else{
        echo "<body><div class='main'><h3 align=center>No such records found.</h3></div>";
    }
    ?>
    </body>
<?php
}
?>
