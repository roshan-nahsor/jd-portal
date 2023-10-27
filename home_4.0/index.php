<?php
    $db=mysqli_connect("localhost","root","","jd_portal");
    $query="SELECT * FROM jd_portal___2023";
    $run=mysqli_query($db,$query);  
    $data=mysqli_fetch_all($run,MYSQLI_ASSOC);
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <title>JD Portal</title>
        <meta charset="utf-8">
        <link rel="icon" href="JD (crop).jpg">
        <link rel="stylesheet" href="home 4.0.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                // $(".left_content").toggle();
                // $(".right_content").toggle();
            
                // $("button").click(function(){
                //   $(".left_content").toggle();
                //   $(".right_content").toggle();
                $(".batch_content").hide();
                $("button").click(function(){
                    $(this).next(".batch_content").toggle();
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#search").keyup(function(){
                    var input=$(this).val();
                    // alert(input);

                      
                        if(input!=""){
                            $("#results").css("display","inline");
                            $.ajax({
                                url:"livesearch.php",
                                method:"POST",
                                data:{input:input},

                                success:function(data){
                                    $("#results").html(data);
                                }
                            });
                        }else{
                            $("#results").css("display","none");
                        }
                });
            });
        </script>
    </head>
    <body>
        <div class="navbar">
            <div></div>
            <input type="text" id="search" placeholder="Search">
            <!-- <select name="filter" id="filter">
                <option value="company">Company</option>
                <option value="year">Year</option>
                <option value="profile">Profile</option>
            </select> -->
            <button id=login onclick="document.location='login/index.html'">Login</button>
        </div>
            </script>
            <!-- <h1>JD Portal</h1> -->
            <!-- <input type="text" id="search" placeholder="Search..."> -->
            <div id="results"></div>

            <div class="main">
                <?php
                foreach($data as $sub){
                ?>
                    <div class="company_block">
                        <h1 class=card_heading><?=$sub['Name']?></h1>
                        <img class=logo src="Reliance_Jio.png"/>
                        <!-- <h2></h2> -->
                        <button class="year_toggle"><h3 class="batch">2023</h3></button>
                        <div class="batch_content">
                            <div class="left_content">
                            <?php if($sub['Eligibility']!=NULL){?>
                            <h3 class="content_heading">Eligibility Criteria</h3><hr>
                                <?=nl2br($sub['Eligibility'])?>
                            <?php }?>
                            <h3 class="content_heading">Required Profile</h3><hr>
                                <?=nl2br($sub['Required_Profile'])?>
                            <?php if($sub['Job_Description']!=NULL){?>
                                <?=nl2br($sub['Job_Description'])?>
                            <?php }?>
                            </div>
                            <div class="right_content">
                                <h3 class="content_heading">Offered Posts</h3><hr>
                                <?=nl2br($sub['Offered_Positions'])?>
                                <h3 class="content_heading">Students Placed</h3><hr>
                                <?=$sub['Placed']?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
    </body>
</HTML>