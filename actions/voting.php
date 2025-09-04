<?php
session_start();
include('./connection.php');


$groupid = $_POST['groupid'];
$userid = $_SESSION['userId'];

//check if a user has voted already


$check_vote_res = mysqli_query($conn, "SELECT * FROM vote_res WHERE user_id = '$userid'");

if(mysqli_num_rows($check_vote_res) > 0){
    $_SESSION['error'] = "You can not vote more than once";

     header("location:../partials/dashboard.php");
    exit();
}else{

    // insert the details innto the vote_res table
    
    $vote_res = mysqli_query($conn, "INSERT INTO vote_res(user_id, group_id, vote_count)VALUE('$userid', '$groupid', 1)");

    if($vote_res){
        // update the vote status of the user to 1 which is voted
        $update_res = mysqli_query($conn, "UPDATE user_data SET status = 1 WHERE id = '$userid'");

        if($update_res){
            $_SESSION['success'] = "Voted successfully";
        header("location:../partials/dashboard.php");
        exit();
        }
    }else{
        $_SESSION['error'] = "Technical error !! Vote after sometime";
        header("location:../partials/dashboard.php");
        exit();
    }
}




?>