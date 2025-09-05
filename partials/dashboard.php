<?php
include("../actions/connection.php");
require_once('../session-check.php');

$user_id = $_SESSION['userId'];

// get the details of the login user

$user_result = mysqli_query($conn, "SELECT * FROM user_data WHERE id = '$user_id'");


$user_row = mysqli_fetch_assoc($user_result);

$status = $user_row['status'];
$standard = "groups";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System -Dashboard</title>

<!--Boostrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<!-- link Css file -->
 <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-secondary text-light">
    <div class="container my-5">
    <a href="../index.php"><button class="btn btn-dark text-light px-3">Back</button></a>
    <a href="../actions/logout.php"><button class="btn btn-dark text-light px-3">Logout</button></a>
    <h1 class="my-3">Voting System</h1>
    <div class="row my-5">
        <div class="col-md-6">
             <div class="row">
                
                <?php

    
                $group_result = mysqli_query($conn, "SELECT * FROM user_data WHERE `standard` = 'group' AND id != $user_id");
                

                if(mysqli_num_rows($group_result)> 0){
                    while($row = mysqli_fetch_assoc($group_result)){                    
                        $photo = $row['photo'];
                        $username = $row['username'];
                        $votes = $row['votes'];
                        $status= $row['status'];
                        $group_id = $row['id'];


                        $count_vote_res = mysqli_query($conn, "SELECT COUNT(*) AS vote_count FROM vote_res WHERE group_id = '$group_id'ORDER BY vote_count DESC");

                    
                        if(mysqli_num_rows($count_vote_res) > 0){
                            $count_vote_row = mysqli_fetch_assoc($count_vote_res);
                            $vote_count = $count_vote_row['vote_count'];

                        }else{
                            $vote_count = 0;
                        }

                        ?>                        
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <img src="<?=$photo?>" alt="groupImage">
                            </div>
                                <div class="col-lg-6">
                                    <strong class="text-dark h5">Group Name:</strong><?=$username?><br>
                                <strong class="text-dark h5">Votes:</strong><?= $vote_count?><br>

                              
                        <form action="../actions/voting.php" method="post">
                            <input type="hidden" name="groupid" value="<?=$group_id?>">
                            <input type="hidden" name="userid" value="<?=$user_id?>">
                
                                <?php 
                                   if($status == 1){
                                      ?>
                                         <button class="btn btn-success btn-sm shadow">Voted</button>
                                      <?php
                                   }else{
                                         ?>
                                         <button class="btn btn-danger btn-sm shadow" type="submit">Vote</button>
                                      <?php
                                   }
                                ?>
                        </form>

                                </div>
                        </div>
                        <?php
                    }
                }else{

                }
                
                ?>
             </div>
        </div>
        <div class="col-md-6">
        <!-- user profile -->
         <img src="<?=$user_row['photo']?>" alt="userImage">
         <br>
         <br>
         <strong class="text-dark h5">Name:</strong><?=$user_row['username'];?><br><br>
         <strong class="text-dark h5">Phone:</strong><?=$user_row['phone'];?><br><br>

         <?php 
           
                $status = $user_row['status'];
            if($status == 1){
                ?>
                    <button class="btn btn-sm btn-success">Voted</button>
                
                <?php
            }else{
                 ?>
                    <button class="btn btn-sm btn-danger">Not Voted</button>
                
                <?php
            }
         ?>
    
        </div>
    </div>
    </div>
       
    <?php 
       require_once('../utlis/sweet-alert.php');
    ?>
</body>
</html>