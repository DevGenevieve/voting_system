<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System - Registration Page</title>

    <!--Boostrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <h1 class="text-info text-center p-3">Voting System</h1>
    <div class="bg-info py-4">
    <h2 class="text-center">Register Account</h2>
        <div class="container text-center">
        <form action="../actions/register.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3 ">
                <input type="text" class="form-control w-50 m-auto" name="username" placeholder="Enter your name">
            </div>

            <div class="mb-3 ">
                <input type="phone" class="form-control w-50 m-auto" name="phone" placeholder="Enter your phone number" maxLength="11" minLength="11">
            </div>

            <div class="mb-3 ">
                <input type="password" class="form-control w-50 m-auto" name="password" placeholder="Enter your password">
            </div>

            <div class="mb-3 ">
                <input type="password" class="form-control w-50 m-auto" name="confirmPassword" placeholder="Confirm Password">
            </div>

            <div class="mb-3 ">
                <input type="file" class="form-control w-50 m-auto" name="photo">
            </div>
            <div class="mb-3">
                <select name="std" class="form-select w-50 m-auto">
                    <option value="group">Group</option>
                    <option value="voter">Voter</option>
                </select>
            </div>

            <button name="register" class="btn btn-dark my-4">Register</button>
            <p>Already have an account? <a href="../" class="text-white">Login</a></p>
        </form>
        </div>
    </div>

</body>
</html>

<?php
    require_once("../utlis/sweet-alert.php");
?>