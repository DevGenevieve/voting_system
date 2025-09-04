<?php
session_start();
include("./connection.php");

$username=$_POST['username'];
$password=$_POST['password'];


$query = "SELECT id, password FROM user_data WHERE username = '$username'";

$result = mysqli_query($conn, $query);

// $row = mysqli_fetch_assoc($result);
// print_r($row);
// die();

if(mysqli_num_rows($result) > 0){
    $data = mysqli_fetch_assoc($result);
   
    $stored_password = $data['password'];
    $user_id = $data['id'];

    // Step 2: Verify password
    if(password_verify($password,  $stored_password)){
        
    // Step 3: Fetch groups (standard = 'group')
        $queryGroup = "SELECT username, photo, votes, id 
                       FROM user_data 
                       WHERE standard='group'";
        $resultGroup = mysqli_query($conn, $queryGroup);

        if(mysqli_num_rows($resultGroup) > 0){
            $groups = mysqli_fetch_assoc($resultGroup);
            $_SESSION['groups'] = $groups;
        }
     
        $_SESSION['userId'] = $user_id;

        $_SESSION['success'] = "Login successfully";
        header("location:../partials/dashboard.php");
        exit();

    } else {
        $_SESSION['error'] = "Invalid credentials";
        header("location:../index.php");
        exit();
    }

} else {
    $_SESSION['error'] = "Invalid credentials";
    header("location:../partials/registration.php");
    exit();
}
?>
<?php
// $query ="SELECT * FROM `user_data` WHERE username='$username' and phone='$phone' and password='$password' and standard ='$std'";

// $result= mysqli_query($conn, $query);
// if(mysqli_num_rows($result)>0){
//     $query = "SELECT username,photo,votes,id FROM `user_data` WHERE standard='group'";
//     $resultgroup = mysqli_query($conn, $query);
//     if(mysqli_num_rows($resultgroup)>0){
//         $groups=mysqli_fetch_all($resultgroup, MYSQLI_ASSOC);
//         $_SESSION['groups']=$groups;
//     }
//     $data = mysqli_fetch_array($result);
//     $_SESSION['id']=$data['id'];
//     $_SESSION['status']=$data['status'];
//     $_SESSION['data']=$data;

//     $_SESSION['success'] = "Login successfully";
//     header("location:../partials/dashboard.php");
      
// }else{
//     $_SESSION['error'] = "Invalid credentials";
//     header("location:../partials/registration.php");
   
// }
?>