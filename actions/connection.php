<?php
$hostName = 'localhost';
$userName = 'root';
$password = '';
$dbName ='voting_system';

$conn=mysqli_connect($hostName, $userName, $password, $dbName);

if(!$conn){
    die(mysqli_error($conn));
}
?>