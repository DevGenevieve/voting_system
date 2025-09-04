<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Voting System </title>

<!--Boostrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <h1 class="text-info text-center p-3">Voting System</h1>
    <div class="bg-info py-4">
        <h2 class="text-center">Login</h2>
        <div class="container text-center" >
            <form action="./actions/login.php" method="POST">
                <div class="mb-3">
                <input type="text" class="form-control w-50 m-auto" name="username" placeholder="Enter your Username" required="required">
                </div>
                
                <div class="mb-3">
                <input type="password" class="form-control w-50 m-auto" name="password" placeholder="Enter your password" required="required">
                </div>

               

                <button type="submit" class="btn btn-dark my-4" >Log in </button>
                <p>Don't have an account?  <a href="./partials/registration.php" class="text-white"> Register here</a></p>
               
            </form>
        </div>
    </div>
    
</body>
</html>

<?php
require_once('../utlis/sweet-alert.php');
?>