<?php
session_start();
include("./connection.php");

if(isset($_POST['register'])){
    $username=$_POST['username'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $conPassword=$_POST['confirmPassword'];
    $image=$_FILES['photo']['name'];
    $tmp_name=$_FILES['photo']['tmp_name'];
    $std=$_POST['std'];

    
    $hash_password = password_hash($password, PASSWORD_BCRYPT);
    
    $duplicate_query = "SELECT * FROM user_data WHERE username ='$username'";
    $duplicate_result =mysqli_query($conn, $duplicate_query);
    
        if(empty($username) || empty($phone) || empty($password) || empty($conPassword) || empty($std)){
            $_SESSION['error'] = "All fields are required";
            header("Location:../partials/registration.php");
            exit();
        }elseif($password !== $conPassword){
            $_SESSION['error']="Password mismatch";
            header("Location:../partials/registration.php");
        }elseif(strlen($password)<8){
              $_SESSION['error']="Password must be at least 8 characters";
            header("Location:../partials/registration.php");
        }elseif(mysqli_num_rows($duplicate_result) > 0){
            $_SESSION['error']="Username already exists";
            header("Location:../partials/registration.php");
            die();
        }else{
            move_uploaded_file($tmp_name,"../uploads/$image");
            $query = "INSERT INTO user_data(username, phone, password, photo, standard, votes) VALUES ('$username','$phone','$hash_password','$image','$std',0)";
    
            $result = mysqli_query($conn, $query);
            if($result){
                $_SESSION['success']="Registration successful";
                header("Location:../index.php");
             }else {
                $_SESSION['error']= "Registration failed";
                mysqli_error($conn);
                header("Location:../partials/registration.php");
                }
            }
}

?>